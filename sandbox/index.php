<?php
$dirname = "png/";
$images = glob($dirname."*.png");
foreach($images as $image) {
    $imgPath = $image;
    echo '<br>';
    echo "<img class='iconContainer' src='".$image."' onclick='test('".$imgPath."')'/>";
}
?>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<style>
    .iconContainer{
        width: 150px;
        height: 150px;
        display: inline-block;
        float: left;
    }
</style>
