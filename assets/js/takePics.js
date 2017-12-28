// const video        = document.querySelector('#video')
const cover        = document.querySelector('#cover')
const photo        = document.querySelector('#photo')
const startbutton  = document.querySelector('#startbutton')
const lastpics     = document.querySelector('#lastpics')
const frames       = Array.from(document.querySelectorAll('*[id^="frame"]'))
const width        = 320
const frameImg     = new Image()
let streaming    = false
let height       = 0

navigator.getUserMedia =  navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia

if (navigator.getUserMedia) {
navigator.getUserMedia({ audio: false, video: { width: width, height: 240 } },
    stream => {
      let video = document.querySelector('#video')
      video.src = window.URL.createObjectURL(stream)
      video.onloadedmetadata = e => {
        video.play()
      }
    },
    err => {
      console.log("The following error occurred: " + err.name)
    }
)
} else {
  console.log("getUserMedia not supported")
}

const addFrame = (dataSrc) => {
  const img = document.createElement("img")
  const videoRender = document.querySelector('#video-render')
  img.classList.add('video-stream')
  img.setAttribute('src', dataSrc)
  img.setAttribute('id', 'img-frame')
  videoRender.appendChild(img)
}

const frameHandler = e => {
    const frames = Array.from(document.querySelectorAll('*[id^="frame"]'))
    const dataSrc = e.srcElement.getAttribute('data-src')
    const imgFrame = document.querySelector('#img-frame')
    if (imgFrame){
      imgFrame.remove()
    }
    if (e.srcElement.checked === true){
      frameImg.src = dataSrc
      frames.forEach(frame => frame.checked = false)
      e.srcElement.checked = true
      addFrame(dataSrc)
      startbutton.disabled = false
    }
    else{
      e.srcElement.checked = false
      frameImg.src = ''
      startbutton.disabled = true
    }
  }

frames.forEach(frame => frame.addEventListener('change', frameHandler))
// console.log(frames)

video.addEventListener('canplay', e => {
  if (!streaming) {
    height = video.videoHeight / (video.videoWidth/width)
    video.setAttribute('width', width)
    video.setAttribute('height', height)
    streaming = true
  }
}, false)

function takepicture() {
  const canvas          = document.createElement("canvas")
  const canvas_buttons  = document.createElement("div")
  canvas.width = width
  canvas.height = height
  canvas.getContext('2d').drawImage(video, 0, 0, width, height)
  canvas.getContext('2d').drawImage(frameImg, 0, 0, width, height)
  const data = canvas.toDataURL('image/png')
  lastpics.appendChild(canvas)
  // test.appendChild(canvas_buttons)

  // const xhr = new XMLHttpRequest()
  // xhr.open("POST", 'index.php', true)
  // //Send the proper header information along with the request
  // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  // xhr.onreadystatechange = function() {//Call a function when the state changes.
  //     if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
  //         // Request finished. Do processing here.
  //     }
  // }
  // xhr.send("foo=bar&lorem=ipsum") 
  // photo.setAttribute('src', data)
}

startbutton.addEventListener('click', function(e){
  takepicture()
  e.preventDefault()
}, false)