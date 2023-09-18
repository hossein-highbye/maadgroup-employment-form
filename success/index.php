<?php
error_reporting(1);
// Load wordpress files
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
?>

<!-- get header -->
<?php
function title_tag_filtering($title)
{
    if ($_SERVER['REQUEST_URI'] == '/employment/') {
        $title = "هلدینگ صنعتی ماد | فرم پرسشنامه استخدامی";
    }
    return $title;
}

add_filter('document_title', 'title_tag_filtering');

get_header();
?>
<?php

?>
<!-- get header -->
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/employment/assets/css/styles.css">
<!-- main -->
<div class="col-12" id="main-section"></div>
<div class="last-card">
    <!--  start section  -->
    <div class="boxes active" id="start-section">
        <div class="logo-box"></div>
        <div class="text-box">
            <h1>اطلاعات شما با موفقیت ثبت شد!</h1>
            <p style="text-align: center">از وقتی که برای ثبت اطلاعات گذاشتید، سپاس گذاریم.</p>
        </div>
    </div>
</div>
<!-- main -->

<!-- get footer -->
<?php get_footer() ?>
<!-- get footer -->
<script type="text/javascript" src="/employment/assets/js/scripts.js"></script>
</body>
</html>