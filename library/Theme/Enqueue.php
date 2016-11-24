<?php
namespace HSO\Theme;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'));

	    // Action to add code in header
	    add_action('wp_head', array($this,'custom_head'));
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        
        wp_register_style('hbg-prime', 'http://helsingborg-stad.github.io/styleguide-web-cdn/styleguide.dev/dist/css/hbg-prime.min.css', '', '1.0.0');
        wp_enqueue_style('hbg-prime');

        wp_enqueue_style('HSOChild-css', get_stylesheet_directory_uri(). '/assets/dist/css/app.min.css', '', filemtime(get_stylesheet_directory() . '/assets/dist/css/app.min.css'));

        wp_enqueue_style('HSOChild-animate-css', get_stylesheet_directory_uri(). '/assets/dist/css/animate.css', '', filemtime(get_stylesheet_directory() . '/assets/dist/css/animate.css'));

        // slicknav css
        wp_enqueue_style('slicknav-css', get_stylesheet_directory_uri(). '/plugins/slicknav/slicknav.min.css', '', filemtime(get_stylesheet_directory(). '/plugins/slicknav/slicknav.min.css'));

        // font awesome
        wp_enqueue_style('font-awesome-cdn-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', '');        

        // remodal
        wp_enqueue_style('remodal-css', get_stylesheet_directory_uri(). '/plugins/remodal/remodal.css', '', filemtime(get_stylesheet_directory(). '/plugins/remodal/remodal.css'));
        wp_enqueue_style('remodal-default-theme-css', get_stylesheet_directory_uri(). '/plugins/remodal/remodal-default-theme.css', '', filemtime(get_stylesheet_directory(). '/plugins/remodal/remodal-default-theme.css'));

        wp_enqueue_style('hso-fonts', 'https://fonts.googleapis.com/css?family=Hind|Montserrat|Open+Sans|Playfair+Display', '', '1.0.0');
        
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        wp_register_script('hbg-prime', 'http://helsingborg-stad.github.io/styleguide-web-cdn/styleguide.dev/dist/js/hbg-prime.min.js', '', '1.0.0', true);
        wp_enqueue_script('hbg-prime');

        // slicknav
        wp_enqueue_script('slicknav-js', get_stylesheet_directory_uri(). '/plugins/slicknav/jquery.slicknav.min.js', '', filemtime(get_stylesheet_directory(). '/plugins/slicknav/jquery.slicknav.min.js'), true);

        // remodal
        wp_enqueue_script('remodal-js', get_stylesheet_directory_uri(). '/plugins/remodal/remodal.min.js', '', filemtime(get_stylesheet_directory(). '/plugins/remodal/remodal.min.js'),true);

        wp_enqueue_script('masonry-layout-js', get_stylesheet_directory_uri(). '/assets/dist/js/masonry.pkgd.min.js', '', filemtime(get_stylesheet_directory(). '/assets/dist/js/masonry.pkgd.min.js'), true);

        wp_enqueue_script('isotope-js', get_stylesheet_directory_uri(). '/assets/dist/js/isotope.pkgd.min.js', '', filemtime(get_stylesheet_directory(). '/assets/dist/js/isotope.pkgd.min.js'), true);

	    wp_enqueue_script('jplayer-js', get_stylesheet_directory_uri(). '/assets/dist/js/jplayer/jquery.jplayer.js', '', filemtime(get_stylesheet_directory(). '/assets/dist/js/jplayer/jquery.jplayer.js'), true);
	    wp_enqueue_script('jplayer-playlist-js', get_stylesheet_directory_uri(). '/assets/dist/js/jplayer/jplayer.playlist.min.js', '', filemtime(get_stylesheet_directory(). '/assets/dist/js/jplayer/jplayer.playlist.min.js'), true);

        wp_enqueue_script('transition-js', get_stylesheet_directory_uri(). '/assets/dist/js/jquery.transit.min.js', '', filemtime(get_stylesheet_directory(). '/assets/dist/js/jquery.transit.min.js'), true);

	    wp_enqueue_script('jqueyr-ui-js', get_stylesheet_directory_uri(). '/assets/dist/js/jquery-ui.js', '', filemtime(get_stylesheet_directory(). '/assets/dist/js/jquery-ui.js'), true);
        wp_enqueue_script('HSOChild-js', get_stylesheet_directory_uri(). '/assets/dist/js/app.min.js', '', filemtime(get_stylesheet_directory() . '/assets/dist/js/app.min.js'), true);
    }

	public function custom_head()
	{
		$file_url = get_stylesheet_directory_uri() . "/humans.txt";
		$output="<link type=\"text/plain\" rel=\"author\" href=\"$file_url\" />";
		echo $output;
    }
}