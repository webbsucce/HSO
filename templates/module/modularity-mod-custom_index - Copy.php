<?php
global $post;
$title = get_field('title', $module->ID);
$image = get_field('image', $module->ID);
$link_title = get_field('link_title', $module->ID);
$link_url = get_field('link_url', $module->ID);
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
?>

	<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box-index'), $module->post_type, $args)); ?>" data-equal-item>

		<?php if ($thumbnail_image) : ?>
			<img class="box-image" src="<?php echo $thumbnail_image; ?>" alt="<?php echo isset($title) && !empty($title) ? $title : get_the_title(); ?>">
		<?php endif; ?>

		<div class="box-content">
			<h5 class="box-index-title link-item"><?php echo isset($title) && !empty($title) ? $title : get_the_title(); ?></h5>
			<p>
				<?php
				// get trimmed content
				$content_post = get_post($module->ID);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				if($content != ""){
					$content = wp_trim_excerpt($content);
					echo wp_trim_words($content,25,' [...]');
				}else{
					echo get_the_excerpt();
				}
				?>
			</p>

			<div class="buttons">
				<?php if($link_url): ?>
					<button type="button" onclick="window.location='<?php echo $link_url  ?>';" class="link"><?php echo $link_title? $link_title : "Läs mer" ?></button>
				<?php else: ?>
					<button type="button" class="link"><?php echo $link_title? $link_title : "Läs mer" ?></button>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php wp_reset_postdata(); ?>