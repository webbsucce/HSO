<div class="section author">	
	@if(get_field('author_image','option'))
	<?php 
		// retrive author image
		$image = get_field('author_image','option');
		$image_url = $image['url'];
	?>
	<div class="author-image" style="background-image: url('<?php echo $image_url ?>')"></div>
	@endif

	{!! get_field('author_description','option') !!}
</div>