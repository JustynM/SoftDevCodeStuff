<?php

$website_name = 'CSIS-390 JM';
$author = 'Justyn McHarg';
$pages = array(	'home.php' => 'Home',
								'resume.php' => 'Resume',
								'courses.php' => 'Courses',
								'anime.php' => 'Anime' );
	/*make_page, 4, 6, echo outputs data to the screen, to be able to view the webpage, page_name is being printed in the title of the web page, 
    file_get_contents reads what ever file is its parameter in as a string, nav bar and footer are always the same, side_menu & page_content & aside_content will vary dpending on the input to the make_page function */
function make_page($page_name, $side_menu, $page_content, $aside_content, $style = null) {
    
    $main_content='
        <article>
            '.file_get_contents($page_content).'
        </article>';
    if($side_menu != null && $aside_content != null){
        $main_content = '
            <div class="row">
                <nav class="col-sm-3 col-lg-3">
                    '.file_get_contents($side_menu).'
                    </nav>
                    
                    <article class="col-sm-9 col-lg-6">
						'.file_get_contents($page_content).'
					</article>
                    
                    <aside class="col-sm-12 col-lg-3">
						'.file_get_contents($aside_content).'
					</aside>	
                <div>';}
        // If both side_menu and aside are present
	if ($side_menu && $aside_content) {
		$main_content = '
			<nav class="col-sm-4 col-lg-3">
				'.file_get_contents($side_menu).'
			</nav>
			<article class="col-sm-8 col-lg-6">
				'.file_get_contents($page_content).'
			</article>
			<aside class="col-sm-4 col-lg-3">
				'.file_get_contents($aside_content).'
			</aside>					
		';
	}
	else if ($side_menu) {	  // Side menu only	
		$main_content = '
			<nav class="col-sm-4 col-lg-3">
				'.file_get_contents($side_menu).'
			</nav>
			<article class="col-sm-8 col-lg-9">
				'.file_get_contents($page_content).'
			</article>			
		';
	}
	else if ($aside_content) {		// Aside only
		$main_content = '
			<article class="col-sm-8 col-lg-9">
				'.file_get_contents($page_content).'
			</article>
			<aside class="col-sm-4 col-lg-3">
				'.file_get_contents($aside_content).'
			</aside>			
		';
	}
	else {		// No side menu and no aside
		$main_content = 
			
				file_get_contents($page_content);
		;
	}
        echo make_top($page_name,$style);
        echo '<main class="container">';

        echo $main_content;

        echo '</main>';
        echo make_bottom();
        echo make_footer();
    }
    
function make_top($page_name, $style) {
    global $website_name;
	
	if ($style != null) {
		$style = '<style>'.$style.'</style>';
	}
	return '
		<!DOCTYPE html>
		<html lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>'.$website_name.'- '.$page_name.'</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/custom.css">
        '.$style.'
		<body>
    <header class="col-12">
        '.file_get_contents('navbar.html').'
    </header>';
}

            
function make_footer() {
	
	return '
            <footer class="col-12">
				'.file_get_contents('footer.html').'
            </footer>	';
            
         }
    
    
function make_bottom(){
	
	return '
			<!-- javascript -->
			<script src="js/jquery.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		
		</body>
		</html>
	';
}

function make_basic_page($page_name, $page_content, $style = null){
    echo make_top($page_name, $style);
    echo '<main class="container">';
    
    echo $page_content;
    
    echo '</main>';
    echo make_footer();
    echo make_bottom();

    
}

function make_list($list, $type) {
	if ($type != 'ul' && $type != 'ol') $type = 'ul';
	$out = '<'.$type.'>';
	foreach ($list as $i) {
		$out .= '<li>'.$i.'</li>';
	}
	$out .= '</'.$type.'>';
	return $out;
}


/*Failed attempt at a picture making function
function make_picture_page($picture_file, $width, $height,$alt_name,$style = null) {
    $page_name = 'Anime';
    echo make_top($page_name, $style);
    echo '<main class="container">';
    
   '<section>';
    for ($count = 0; $count < 7; $count++){
        if ($count < 4)
            $picture = $picture_file[$count];
            $w = $width[$count];
            $h = $height[$count];
            $alt = $alt_name[$count];
            echo '<img src='.$picture.' alt='.$alt.' height='.$h.' width='.$w.'>';
        if($count == 4){
            '</section>
            <section>';
            $picture = $picture_file[$count];
            $w = $width[$count];
            $h = $height[$count];
            $alt = $alt_name[$count];
            echo '<img src='.$picture.' alt='.$alt.' height='.$h.' width='.$w.'>';}
        if ($count == 5){
            $picture = $picture_file[$count];
            $w = $width[$count];
            $h = $height[$count];
            $alt = $alt_name[$count];
            echo '<img src='.$picture.' alt='.$alt.' height='.$h.' width='.$w.'>';
        }
        if($count == 6){
            '</section>
            <section>';
            $picture = $picture_file[$count];
            $w = $width[$count];
            $h = $height[$count];
            $alt = $alt_name[$count];
            echo '<img src='.$picture.' alt='.$alt.' height='.$h.' width='.$w.'>';}
            
    }
    echo '</main>';
    echo make_footer();
    echo make_bottom();

}*/

?>