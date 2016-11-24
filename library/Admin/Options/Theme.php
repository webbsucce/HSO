<?php
namespace HSO\Admin\Options;

class Theme
{
	public function __construct()
	{
		$this->registerThemeOptions();
	}

	public function registerThemeOptions(){
		// register hso theme options after parent theme register their options
		add_action( 'after_setup_theme', function(){
			if (function_exists('acf_add_options_page')) {
				$themeOptionsCapability = 'administrator';
				$themeOptionsParent = 'themes.php';

				acf_add_options_sub_page(array(
					'page_title'    => __('HSO Options', 'hsochild'),
					'menu_title'    => __('HSO Options', 'hsochild'),
					'capability'    => $themeOptionsCapability,
					'parent_slug'   => $themeOptionsParent,
					'menu_slug'     => 'acf-options-hso-options'
				));
			}
		} );
	}
}