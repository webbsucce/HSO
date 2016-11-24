<?php
global $post;
$title = get_field('title', $module->ID);
$image = get_field('image', $module->ID);
$link_title = get_field('link_title', $module->ID);
$link_url = get_field('link_url', $module->ID);
$description = get_field('description', $module->ID);
?>

<?php if (!$module->hideTitle && !empty($module->post_title)) : ?>
	<div class="grid-xs-12">
		<h2><?php echo $module->post_title; ?></h2>
	</div>
<?php endif; ?>

<?php
// featured image
$thumbnail_image = "";
if( !empty($image) ){
	$thumbnail_image = $image['url'];
}

// content
// get trimmed content
$content_post = get_post($module->ID);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
?>
<div class="grid">
    <div class="grid-md-12">
     	<div class="box box-post-brick">
            <div style="background-image:url(<?php echo $thumbnail_image; ?>);" class="box-image">
            	<?php if ($thumbnail_image) : ?>
               		<img alt="<?php echo isset($title) && !empty($title) ? $title : get_the_title(); ?>" src="<?php echo $thumbnail_image ?>">
               	<?php endif; ?>
            </div>
            <div class="box-content">
            	<a href="<?php echo $link_url ?: "javascript:void(0)" ?>">
               		<h3 class="post-title"><?php echo isset($title) && !empty($title) ? $title : get_the_title(); ?></h3>
               	</a>
               <div class="buttons">
					<?php if($link_url): ?>
						<button type="button" onclick="window.location='<?php echo $link_url  ?>';" class="link"><?php echo $link_title? $link_title : "Läs mer" ?></button>
					<?php else: ?>
						<button type="button" class="link"><?php echo $link_title? $link_title : "Läs mer" ?></button>
					<?php endif; ?>
				</div>
            </div>
            <?php
				
			?>
			<?php if($description != ""): ?>
			<a href="<?php echo $link_url ?: "javascript:void(0)" ?>">			
            <div class="box-post-brick-lead">            	
               <p>
					<?php 
						if($description != ""){
							$description = wp_trim_excerpt($description);
							echo wp_trim_words($description,25,' [...]');
						}
					?>
				</p>								
            </div>
            </a>
        	<?php endif; ?>
       	</div>
    </div>
</div>	
<?php wp_reset_postdata(); ?>