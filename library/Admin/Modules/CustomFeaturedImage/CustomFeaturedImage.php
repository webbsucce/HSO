<?php

namespace HSO\Admin\Modules\CustomFeaturedImage;

class CustomFeaturedImage extends \Modularity\Module
{

	/**
	 * Module args
	 * @var array
	 */
	public $args = array(
		'id' => 'custom_featured_image',
		'nameSingular' => 'Custom Featured Image',
		'namePlural' => 'Custom Featured Images',
		'description' => 'HSO Custom Featured Image Module',
		'supports' => array(''),
		'icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOS4yLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGFnZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyODUgMjg1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAyODUgMjg1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8cGF0aCBkPSJNMjYzLDc0LjhjMCw0LjctMy45LDguNi04LjYsOC42SDMxLjVjLTQuNywwLTguNi0zLjktOC42LTguNlY1Ny43YzAtNC43LDMuOS04LjYsOC42LTguNmgyMjIuOWM0LjcsMCw4LjYsMy45LDguNiw4LjYNCgkJVjc0Ljh6IE0yNjMsMTI2LjJjMCw0LjctMy45LDguNi04LjYsOC42SDMxLjVjLTQuNywwLTguNi0zLjktOC42LTguNnYtMTcuMWMwLTQuNywzLjktOC42LDguNi04LjZoMjIyLjljNC43LDAsOC42LDMuOSw4LjYsOC42DQoJCVYxMjYuMnogTTI2MywxNzcuN2MwLDQuNy0zLjksOC42LTguNiw4LjZIMzEuNWMtNC43LDAtOC42LTMuOS04LjYtOC42di0xNy4xYzAtNC43LDMuOS04LjYsOC42LTguNmgyMjIuOWM0LjcsMCw4LjYsMy45LDguNiw4LjYNCgkJVjE3Ny43eiBNMjYzLDIyOS4xYzAsNC43LTMuOSw4LjYtOC42LDguNkgzMS41Yy00LjcsMC04LjYtMy45LTguNi04LjZWMjEyYzAtNC43LDMuOS04LjYsOC42LTguNmgyMjIuOWM0LjcsMCw4LjYsMy45LDguNiw4LjYNCgkJVjIyOS4xeiIvPg0KPC9nPg0KPC9zdmc+DQo='
	);


	/**
	 * Constructor
	 */
	public function __construct()
	{
		// This will register the module
		$this->register(
			$this->args['id'],
			$this->args['nameSingular'],
			$this->args['namePlural'],
			$this->args['description'],
			$this->args['supports'],
			$this->args['icon']
		);

		$this->acfFields();
	}

	public function acfFields()
	{
		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array (
				'key' => 'group_5826db746f98a',
				'title' => 'Custom Featured Image Fields',
				'fields' => array (
					array (
						'key' => 'field_5826db91235de',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_5826db99235df',
						'label' => 'Subtitle',
						'name' => 'subtitle',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_5826db9d235e0',
						'label' => 'Gradient',
						'name' => 'gradient',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array (
							'on' => 'On',
							'off' => 'Off',
						),
						'default_value' => array (
							'off' => 'off',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'placeholder' => '',
						'disabled' => 0,
						'readonly' => 0,
					),
					array (
						'key' => 'field_5826dbf0235e1',
						'label' => 'Text Color',
						'name' => 'text_color',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array (
							'white' => 'White',
							'black' => 'Black',
						),
						'default_value' => array (
							'white' => 'white',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'placeholder' => '',
						'disabled' => 0,
						'readonly' => 0,
					),
					array (
						'key' => 'field_5826dc18235e2',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'mod-custom_featured_',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

		endif;
	}
}
