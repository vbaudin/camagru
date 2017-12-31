const cover        = document.querySelector('#cover')
const photo        = document.querySelector('#photo')
const takePicBtn   = document.querySelector('#takePicBtn')
const lastPics     = document.querySelector('#lastPics')
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

video.addEventListener('canplay', e => {
  if (!streaming) {
    height = video.videoHeight / (video.videoWidth/width)
    video.setAttribute('width', width)
    video.setAttribute('height', height)
    streaming = true
  }
}, false)

const picDisplay = (canvas) => {
  const canvasBox    = document.createElement("div")
  const btnBox    = document.createElement("div")
  const pushToGalBtn = document.createElement("button")
  const deleteBtn    = document.createElement("button")

  pushToGalBtn.innerHTML = 'Push to gallery'
  deleteBtn.innerHTML = 'Delete'
  deleteBtn.setAttribute("id", "delete");
  pushToGalBtn.setAttribute("id", "pushToGalBtn");
  lastPics.appendChild(canvasBox)
  canvasBox.appendChild(canvas)
  canvasBox.appendChild(btnBox)
  btnBox.appendChild(pushToGalBtn)
  btnBox.appendChild(deleteBtn)
}

const takepicture = () => {
  const canvas       = document.createElement("canvas")

  canvas.width = width
  canvas.height = height
  canvas.getContext('2d').drawImage(video, 0, 0, width, height)
  canvas.getContext('2d').drawImage(frameImg, 0, 0, width, height)
  
  picDisplay(canvas)
  picHandler()
}

takePicBtn.addEventListener('click', e => {
  takepicture()
  // e.preventDefault()
}, false)