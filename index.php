<?php require_once(__DIR__.'/Views/header.php'); ?>
<div class="fake-row"></div>
<div class="row flex-wrap">
    <aside class="take-pics">
      <div class="toto">
        <h3>Take your pics</h3>
        <div class="flex-center">
          <video class="video" id="video"></video>
          <button class="btn-take-pic" id="startbutton">Prendre une photo</button>
        </div>
      </div>
      <div class="frame flex-center">
        <div class="flex-center">
          <img src="assets/pics/frames/boat.png" alt="boat frame">
          <input type="checkbox" id="frame-boat">
        </div>
        <div class="flex-center">
          <img src="assets/pics/frames/flower.png" alt="flower frame">
          <input type="checkbox" id="frame-flower">
        </div>
        <div class="flex-center">
          <img src="assets/pics/frames/river.png" alt="river frame">
          <input type="checkbox" id="frame-river">
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
(function() {

  var streaming = false,
      video        = document.querySelector('#video'),
      cover        = document.querySelector('#cover'),
      photo        = document.querySelector('#photo'),
      startbutton  = document.querySelector('#startbutton'),
      lastpics     = document.querySelector('#lastpics'),
      frames       = Array.from(document.querySelectorAll('*[id^="frame"]'))
      width = 320,
      height = 0
  navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia)

  const frameHandler = (e) => {
    // console.log(e)
    const frames = Array.from(document.querySelectorAll('*[id^="frame"]'))
    if (e.srcElement.checked === true){
      frames.forEach(frame => frame.checked = false)
      e.srcElement.checked = true
    }
    else{
      e.srcElement.checked = false
    }
  }
  frames.forEach(frame => frame.addEventListener('change', frameHandler));
// console.log(frames)
  navigator.getMedia(
    {
      video: true,
      audio: false
    },
    function(stream) {
      if (navigator.mozGetUserMedia) {
        video.mozSrcObject = stream
      } else {
        const vendorURL = window.URL || window.webkitURL
        video.src = vendorURL.createObjectURL(stream)
      }
      video.play()
    },
    function(err) {
      console.log("An error occured! " + err)
    }
  )

  video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width)
      video.setAttribute('width', width)
      video.setAttribute('height', height)
      // canvas.setAttribute('width', width)
      // canvas.setAttribute('height', height)
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

})()
</script>