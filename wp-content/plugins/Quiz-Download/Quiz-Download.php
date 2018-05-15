 <?php

/*
 *@package Rameshplugin
 */
/*
Plugin Name: Quiz Download
Plugin URI: http://xploiting.com
Description: This is my quiz plugin for xploiting.com
Version: 1.0.0
Author: Ramesh KR
Author URI: http://xploiting.com
License: GPLv2 or later
Text Domain: Quiz Download
*/

/*
This program is free software; you can redistribute it and/or 
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or any Later version
*/

defined('ABSPATH') or die("You can't access this file.");

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;


function activate_quiz_download(){
	Activate::activate();
}

register_activation_hook( __FILE__,'activate_quiz_download');

function deactivate_quiz_download(){
	Deactivate::deactivate();
}

register_deactivation_hook( __FILE__,'deactivate_quiz_download');


if ( class_exists('Inc\\Init')){

    Inc\Init::register_services();
}