<?php
include "twitter.php";
$t = new twitter();
$res = $t->userTimeline($_GET["user"], 1);
if($res===false){
    echo "<pre>";
    echo "</pre>";
} else {
    echo "<pre>";
    print_r($res);
    echo "</pre>";
}
?>