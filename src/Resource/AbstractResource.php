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
 * @package    Leafly
 * @version    1.0.0
 * @author     TinyRocket <michael@tinyrocket.co>
 * @license    BSD License (3-clause)
 * @copyright  Copyright 2014 TinyRocket
 * @link       http://tinyrocket.co/leafly
 */
namespace Leafly\Resource;

abstract class AbstractResource {

	/**
	 *	Adapter provided by string
	 *
	 *	@var AbstractAdapter
	 */
	protected $adapter;

	/**
	 *	API Endpoint
	 *
	 *	@var string
	 */
	protected $enpoint;

	/**
	 *	Set adapter and endpoint for resources
	 *
	 *	@param adapter 		Adpater chosen during initialization
	 *	@param endponint 	API Endpoint, if different
	 */
	public function __construct($adapter, $endpoint = 'http://data.leafly.com/')
	{
		$this->adapter = $adapter;
		$this->endpoint = $endpoint;
	}

}