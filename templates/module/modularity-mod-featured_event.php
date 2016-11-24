<?php
global $post;
$event = get_field('event', $module->ID);
?>

<?php if($event) : ?>
	<?php
		$event_class = new \HSOEventManager\Event();
		$event_data = $event_class->get_event($event->ID);
	?>

	<?php if (!$module->hideTitle && !empty($module->post_title)) : ?>
		<div class="grid-xs-12">
			<h2><?php echo $module->post_title; ?></h2>
		</div>
	<?php endif; ?>

	<?php
		// featured image of featured event
		$thumbnail_image = "";
		if(has_post_thumbnail($event_data['id'])){
			$thumb_id = get_post_thumbnail_id($event_data['id']);
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
			$thumbnail_image = $thumb_url_array[0];
		}
	?>

	<div class="<?php echo implode(' ', apply_filters('Modularity/Module/Classes', array('box', 'box-index'), $module->post_type, $args)); ?>" data-equal-item>
		<?php if(isset($event_data['transtickets']) && !empty($event_data['transtickets'])): ?>
			<div class="date-time">
				<label>Speltid:</label>
				<?php foreach($event_data['transtickets'] as $transticket): ?>
					<p>
						<i class="fa fa-clock-o" aria-hidden="true"></i>
						<span><?php echo date('H.i',strtotime($transticket['eventdate'])) ?></span> TDR <span><?php echo date('d M',strtotime($transticket['eventdate'])) ?></span>
					</p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ($thumbnail_image) : ?>
			<img class="box-image" src="<?php echo $thumbnail_image; ?>" alt="<?php echo isset($event_data['title']) && !empty($event_data['title']) ? $event_data['title'] : get_the_title(); ?>">
		<?php endif; ?>

		<div class="box-content">
			<h5 class="box-index-title link-item"><?php echo isset($event_data['title']) && !empty($event_data['title']) ? $event_data['title'] : get_the_title(); ?></h5>
			<p>
				<?php
				// get trimmed content
				if($event_data['content'] != ""){
					$event_content = wp_trim_excerpt($event_data['content']);
					echo wp_trim_words($event_content,25,' [...]');
				}else{
					echo get_the_excerpt();
				}
				?>
			</p>

			<div class="buttons">
				<?php if($event_data['buy_event_ticket_link']): ?>
					<button type="button" onclick="window.location='<?php echo $event_data['buy_event_ticket_link']  ?>';" class="link first">Köp</button>
				<?php else: ?>
					<button type="button" class="link first">Köp</button>
				<?php endif; ?>

				<?php if($event_data['link']): ?>
					<button type="button" onclick="window.location='<?php echo $event_data['link']  ?>';" class="link">Läs mer</button>
				<?php else: ?>
					<button type="button" class="link">Läs mer</button>
				<?php endif; ?>
			</div>
		</div>
	</div>


<?php endif; ?>
<?php wp_reset_postdata(); ?>