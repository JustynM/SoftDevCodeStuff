<?php
include('functions.php');	

$content = file_get_contents('courses.html');
$s = '
	ul, ol {
		padding: 0px;
	}
	
	li li {
		font-size: 0.9em;
		margin-bottom: 5px;
			
	}
	
	li li {
		display: inline-block;
		width: 320px;
	}
    
	li {
		margin-bottom: 22px;
		vertical-align: top;
        font-size: 20px;
        list-style: none;
	}
	
';


make_basic_page('Courses', $content, $s);

?>