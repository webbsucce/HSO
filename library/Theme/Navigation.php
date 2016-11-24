<?php
namespace HSO\Theme;

class Navigation
{
    public function __construct()
    {
        $this->registerMenus();
    }

    public function registerMenus()
    {
        $menus = array(
            'full-menu' => __('Full Menu', 'hsochild'),
            'quick-menu' => __('Quick Menu', 'hsochild'),
	        'quick-menu-sub' => __('Quick Menu Sub', 'hsochild'),
            'mobile-menu' => __('Mobile Menu', 'hsochild'),
        );
        register_nav_menus($menus);
    }
}