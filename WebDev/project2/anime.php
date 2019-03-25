<?php
include('functions.php');
$s = '
	height: 1500px;
    color: white;
    
main {
    background-image: linear-gradient(black, grey);
    color: white;
}
	
';
//create list of pictures
$pic_list = array('fmab.jpg','OnePiece.jpg','naruto-shi.png','TYBWIchigo.jpg','Minato.jpg','wp2288707.png','Bleach.jpg');
//desired heights for corresponding pictures
$height_list = array('300px','300px','300px','300px','300px','300px','600px');
//desired widths for corresponding pictures
$width_list = array('200px','300px','400px','196px','552px','553px','1106px');
//desired alt name for corresponding pictures
$alt_name = array('FMAB','OP','NARUTO','ICHIGO','MINATO','IKKI&STELLA','BLEACH');
$content = file_get_contents('anime.html');;
make_basic_page('Anime',$content,$s)
?>