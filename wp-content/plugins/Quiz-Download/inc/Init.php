<?php

namespace Inc;

final class Init{


	/**
	  * store all classes inside an array
	  * @return array Full List of classes
	  */

	public static function get_services() {
		return [

			Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLink::class,

		];

	}

	/**
	  *loop through the classes, initilize them,
	  *and call the register() method if it exists
	  *@return
	  */	

	public static function register_services(){

			foreach (self::get_services() as $class ) {
				$service = self::instantiate($class);
				if( method_exists($service, 'register') ) {
					$service->register();
				}
			}

	}
	
	/**
	  *Initialize the Class
	  */

	private static function instantiate( $class )
	{
		return new $class();
	}
	
}

    
