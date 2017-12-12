<?php
ini_set('display_errors', 1);
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/Views/header.php') 
?>
<div class="fake-row"></div>
<div class="row flex-wrap">
    <aside class="take-pics">
        <h3>Take your pics</h3>
    </aside>
    <aside class="last-pics">
        <h3>Last pics</h3>
    </aside>
</div>

<div class="fake-row"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>
<div class="fake-row"></div>
<?php require_once(ROOT.'/Views/footer.php') ?>