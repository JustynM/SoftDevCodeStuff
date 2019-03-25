<?php
include('functions.php');	

$content = file_get_contents('Resume.html');



make_basic_page('Resume', $content, null);

?>