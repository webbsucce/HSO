<?php

namespace HSO\Theme;

use HSO\Custom\View;

class Shortcode
{
	public function __construct()
	{
		$this->register_shortcodes();
	}

	public function register_shortcodes()
	{
		add_shortcode('hso_featured_post', array($this, 'callback_hso_featured_post'));
		add_shortcode('hso_featured_event', array($this, 'callback_hso_featured_event'));
		add_shortcode('hso_socialmedia_feed', array($this, 'callback_hso_socialmedia_feed'));

		add_shortcode('hso-contact-map', array($this, 'callback_hso_contact_map'));
		add_shortcode('hso-author-section', array($this, 'callback_hso_author_section'));
		add_shortcode('hso-events', array($this, 'callback_hso_events'));
	}

	public function callback_hso_featured_post($atts)
	{
		ob_start();
		View::render('shortcodes.hso-featured-post');
		return ob_get_clean();
	}

	public function callback_hso_featured_event($atts)
	{
		ob_start();
		View::render('shortcodes.hso-featured-event');
		return ob_get_clean();
	}

	public function callback_hso_socialmedia_feed($atts)
	{
		ob_start();
		View::render('shortcodes.hso-socialmedia-feed');
		return ob_get_clean();
	}

	public function callback_hso_contact_map($atts){
		ob_start();
		View::render('shortcodes.hso-contact-map');
		return ob_get_clean();
	}

	public function callback_hso_author_section($atts){
		ob_start();
		View::render('shortcodes.hso-author-section');
		return ob_get_clean();
	}

	public function callback_hso_events($atts){
		ob_start();
		View::render('shortcodes.hso-events');
		return ob_get_clean();
	}
}