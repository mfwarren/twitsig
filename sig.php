<?php
include "twitter.php";

$t = new twitter();
$res = $t->userTimeline($_GET["user"], 1);


$my_img = imagecreatefrompng ( "twittersig_blue.png" );

$grey = imagecolorallocate( $my_img, 150, 150, 150 );
$red = imagecolorallocate( $my_img, 255, 0,  0 );
$text_colour = imagecolorallocate( $my_img, 0, 0, 0 );

if($res===false){
	imagestring( $my_img, 4, 30, 25, "",
	  $text_colour );
} else {
	$newtext = wordwrap($res->status->text, 65, "\n");
	imagettftext( $my_img, 10, 0, 10, 35, $text_colour, "Arial.ttf", $newtext);
	imagettftext( $my_img, 10, 0, 90, 15, $red, "Arial Bold.ttf", "@".$_GET["user"]);
	imagettftext( $my_img, 10, 0, 225, 15, $grey, "Arial.ttf", strftime("%a %d %b %H:%M %Y", strtotime($res->status->created_at)));
}

header( "Content-type: image/png" );
imagepng( $my_img );
imagedestroy( $my_img );
?>