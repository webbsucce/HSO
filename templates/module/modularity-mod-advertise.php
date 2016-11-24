<?php
$text = get_field('text', $module->ID);
if($text){
	echo do_shortcode($text);
}
?>