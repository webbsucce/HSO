<?php

namespace HSO\Admin\Modules\Advertise;

class Advertise extends \Modularity\Module
{

	/**
	 * Module args
	 * @var array
	 */
	public $args = array(
		'id' => 'advertise',
		'nameSingular' => 'Advertise',
		'namePlural' => 'Advertises',
		'description' => 'HSO Advertise Module',
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
				'key' => 'group_582c284df0acf',
				'title' => 'Module Advertise Fields',
				'fields' => array (
					array (
						'key' => 'field_582c285408424',
						'label' => 'Place shortcode',
						'name' => 'text',
						'type' => 'textarea',
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
						'maxlength' => '',
						'rows' => '',
						'new_lines' => 'wpautop',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'mod-advertise',
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
