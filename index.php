<?php require_once(__DIR__.'/Views/header.php'); ?>
<div class="fake-row"></div>
<div class="row flex-wrap">
  <aside class="take-pics">
    <div class="webcam">
      <h3>Take your pics</h3>
      <div class="video flex-center" id="video-render">
        <video class="video-stream" id="video"></video>
        <!-- <img class="video-stream" src="assets/pics/frames/boat.png" alt="boat frame"> -->
      </div>
      <button class="btn-take-pic" id="startbutton">Prendre une photo</button>
    </div>
    <div class="frame flex-center">
      <div class="flex-center">
        <img src="assets/pics/frames/boat.png" alt="boat frame">
        <input type="checkbox" id="frame-boat" data-src="assets/pics/frames/boat.png">
      </div>
      <div class="flex-center">
        <img src="assets/pics/frames/flower.png" alt="flower frame">
        <input type="checkbox" id="frame-flower" data-src="assets/pics/frames/flower.png">
      </div>
      <div class="flex-center">
        <img src="assets/pics/frames/river.png" alt="river frame">
        <input type="checkbox" id="frame-river" data-src="assets/pics/frames/river.png">
      </div>
    </div>
    <!-- <canvas id="canvas"></canvas> -->
    <!-- <img src="http://placekitten.com/g/320/261" id="photo" alt="photo"> -->
  </aside>
  <aside class="last-pics">
      <h3>Last pics</h3>
      <div class="disp-last-pics" id="lastpics">
        <!-- <canvas id="canvas"></canvas> -->
      <!-- <img src="http://placekitten.com/g/320/261" id="photo" alt="photo"> -->
      </div>
  </aside>
</div>

<div class="fake-row" id="test"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>
<?php require_once(__DIR__.'/Views/footer.php'); ?>

<script>

const video        = document.querySelector('#video')
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
      var video = document.querySelector('video')
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
    }
    else{
      e.srcElement.checked = false
      frameImg.src = ''
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
  // const test            = document.querySelector('#test')
  // canvas_buttons.innerHTML = "sample text"
  // const canvasContent = document.createTextNode("Salutations !")
  canvas.width = width
  canvas.height = height
  canvas.getContext('2d').drawImage(video, 0, 0, width, height)
  canvas.getContext('2d').drawImage(frameImg, 0, 0, width, height)
  const data = canvas.toDataURL('image/png')
  // canvas_buttons.style.width = "20px"
  // canvas_buttons.style.height = "20px"
  // canvas_buttons.style.backgroundColor = "blue"
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

startbutton.addEventListener('click', function(ev){
  takepicture()
  ev.preventDefault()
}, false)
</script>