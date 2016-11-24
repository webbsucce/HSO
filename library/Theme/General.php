<?php
namespace HSO\Theme;

class General
{
    public function __construct()
    {
        add_filter( 'page_template', function($template){
            
            if(is_page('kontakt')){
                return \Municipio\Helper\Template::locateTemplate('contact-page.blade.php');
            }

            if(is_page("vara-musiker")){
            	return \Municipio\Helper\Template::locateTemplate("vara-musiker-page.blade.php");
            }

            return $template;            

        }, 99);

         add_filter('Municipio/blade/controller', function ($controller) {
            if (is_page('vara-musiker')) {
                return \Municipio\Helper\Controller::locateController(get_stylesheet_directory() . '/library/Controller/Page.php');
            }
            return $controller;
        });

    }
}