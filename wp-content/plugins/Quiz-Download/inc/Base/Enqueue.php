<?php

namespace Inc\Base;
use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
	public function register(){

		 add_action('admin_enqueue_scripts', array($this,'enqueue'));
	}

	function enqueue()
    {
        // enqueue all out scripts
        wp_enqueue_style('quizplugin', $this->plugin_url . '/assets/mystyle.css');
        wp_enqueue_script('quizpluginscripts', $this->plugin_url .'/assets/script.js');
    }
}