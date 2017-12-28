<?php require_once(__DIR__.'/Views/header.php'); ?>
<div class="fake-row"></div>
<div class="row flex-wrap">
  <aside class="take-pics">
    <div class="webcam">
      <h3>Take your pics</h3>
      <div class="video flex-center" id="video-render">
        <video class="video-stream" id="video"></video>
      </div>
      <button class="btn-take-pic" id="startbutton" disabled>Prendre une photo</button>
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
  </aside>
  <aside class="last-pics">
      <h3>Last pics</h3>
      <div class="disp-last-pics" id="lastpics"></div>
  </aside>
</div>

<div class="fake-row" id="test"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>

<script src="assets/js/takePics.js"></script>
<?php require_once(__DIR__.'/Views/footer.php'); ?>