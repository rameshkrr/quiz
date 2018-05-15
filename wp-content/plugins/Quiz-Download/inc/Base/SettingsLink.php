<?php

namespace Inc\Base;
use \Inc\Base\BaseController;

class SettingsLink extends BaseController{


	public function register(){

		
		add_filter("plugin_action_links_$this->plugin", array($this,'settings_link'));

	}

	 public function settings_link($links)
        {
            // add custom setting link
            $setting_link = '<a href="admin.php?page=ramesh_pugin">Settings</a> ';
            array_push($links, $setting_link);
            return $links;
            
        }
}