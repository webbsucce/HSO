<?php
namespace HSO;

class App
{
    public function __construct()
    {
        new \HSO\Theme\Enqueue();
        new \HSO\Theme\Navigation();
        new \HSO\Theme\Shortcode();
        new \HSO\Theme\General();
        new \HSO\Theme\ShortcodeEvents();

        // Admin
        new \HSO\Admin\Options\Theme();
	    new \HSO\Admin\Modules\FeaturedEvent\FeaturedEvent();
	    new \HSO\Admin\Modules\CustomIndex\CustomIndex();
        new \HSO\Admin\Modules\CustomFeaturedImage\CustomFeaturedImage();
        new \HSO\Admin\Modules\Advertise\Advertise();


        $this->registerCustomTemplates();
    }

    public function registerCustomTemplates(){

        // chefens blogg archive
        add_action('parse_query', array($this, 'chefensBloggArchive'));
        add_filter('Municipio/blade/controller', function ($controller) {
            if (is_post_type_archive('chefens-blogg')) {
                return \Municipio\Helper\Controller::locateController(get_stylesheet_directory() . '/library/Controller/ArchiveChefensBlogg.php');
            }

            if ( is_singular( 'event' ) ) {
                return \Municipio\Helper\Controller::locateController(get_stylesheet_directory() . '/library/Controller/SingleEvent.php');
            }
            return $controller;
        });

    }

    public function chefensBloggArchive(){

        if (!is_post_type_archive('chefens-blogg')) {
            return;
        }

        new \HSO\Theme\ChefensBloggArchive();

        // Remove action after first run so that it does not run anymore on this page
        remove_action('parse_query', array($this, 'chefensBloggArchive'));
    }
}
