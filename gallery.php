<?php require_once('Views/header.php') ?>
<!-- The id for each image will be 'gal-{id}' where id is the one in the DB, that way we can know which img has been liked/commentted and update it -->
<div class="gallery">
    <div class="wrapper">
        <section>
            <img id='gal-1' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
        <section>
            <img id='gal-2' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
        <section>
            <img id='gal-3' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
        <section>
            <img id='gal-4' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
        <section>
            <img id='gal-5' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
        <section>
            <img id='gal-6' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
        <section>
            <img id='gal-7' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
        <section>
            <img id='gal-8' src="assets/pics/test.png" alt="">
            <div class="btn">
                <button class="like-btn">Like</button>
                <button>Comment</button>
            </div>
        </section>
    </div>
</div>

<script src="assets/js/ajax/pics.js"></script>
<script src="assets/js/gallery/gallery.js"></script>
<?php require_once('Views/footer.php') ?>