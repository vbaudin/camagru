<?php require_once(__DIR__.'/Views/header.php'); ?>
<div class="fake-row"></div>
<div class="row flex-wrap">
    <aside class="take-pics">
        <h3>Take your pics</h3>
        <div class="flex-center">
          <video class="video" id="video"></video>
          <button class="btn-take-pic" id="startbutton">Prendre une photo</button>
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

<div class="fake-row"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>
<?php require_once(__DIR__.'/Views/footer.php'); ?>

<script>
(function() {

  var streaming = false,
      video        = document.querySelector('#video'),
      cover        = document.querySelector('#cover'),
      // canvas       = document.querySelector('#canvas'),
      photo        = document.querySelector('#photo'),
      startbutton  = document.querySelector('#startbutton'),
      lastpics     = document.querySelector('#lastpics'),
      width = 320,
      height = 0

  navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia)

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

    const canvas        = document.createElement("canvas");
    // const canvasContent = document.createTextNode("Salutations !")
    canvas.width = width
    canvas.height = height
    canvas.getContext('2d').drawImage(video, 0, 0, width, height)
    const data = canvas.toDataURL('image/png')
    lastpics.appendChild(canvas)

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