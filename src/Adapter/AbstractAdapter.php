<?php
/**
 * This file is part of the Leafly package
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @subpackage    Leafly\Adapter\AbstractAdapter
 * @version    	  1.0.0
 * @author     	  TinyRocket <michael@tinyrocket.co>
 * @license    	  BSD License (3-clause)
 * @copyright  	  Copyright 2014 TinyRocket
 * @link       	  http://tinyrocket.co/leafly
 */
namespace Leafly\Adapter;

/**
 *	Leafly\Adapter\AbstractAdapter
 *
 *	Provides an abstract foundation for setting
 *	required variables used by the chosen HTTP 
 *	Adapter. This should be extended directly.
 */
abstract class AbstractAdapter {

	/**
	 *	Leafly Application ID
	 *
	 *	@var string
	 */
	protected $app;

	/**
	 *	Leafly API Key
	 *
	 *	@var string
	 */
	protected $key;

	/**
	 *	Create a new instance of Leafly\Adapter
	 *	
	 *	@param string $app		Application ID obtained from Leafly Developer Center
	 *	@param string $key		Application key obtained from Leafly Developer Center
	 *
	 *	@return void
	 */
	public function __construct($app, $key)
	{
		$this->app = $app;
		$this->key = $key;
	}
}