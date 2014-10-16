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
 * @subpackage    Leafly\Resource\Locations
 * @version   	  1.0.0
 * @author     	  TinyRocket <michael@tinyrocket.co>
 * @license    	  BSD License (3-clause)
 * @copyright  	  Copyright 2014 TinyRocket
 * @link       	  http://tinyrocket.co/leafly
 */
namespace Leafly\Resource;

/**
 *	Leafly\Resource\Locations
 *
 *	Primary outlet for all location based actions with GeoIP
 * 	integration coming sooner or later.
 *
 *	@see https://developer.leafly.com/docs#locations
 */
class Locations extends AbstractResource {

	/**
	 *	Perform search for stores
	 *	
	 *	@param float  $latitude 		radius latitude
	 *	@param float  $longitude 		radius longitude
	 *	@param array  $params 		 	search variables
 	 *	@param int    $skip 		 	stores to skip
	 *	@param int    $take 		 	stores to show
	 *
	 *	@return object
	 */
	public function search($params = array(), $latitude = null, $longitude = null, $skip = 0, $take = 10)
	{
		/**
		 *	Parameters should be an array
		 */
		if ( !is_array($params) ) {
			throw new \Exception("Variable '[$params]' must be an array.");
		}

		/**
		 * We'll need a location in order to search
		 */
		if ( is_null($latitude) OR is_null($longitude)) {
			throw new \Exception("Please enter a location. Search expects longitude and latitude");
		}

		return $this->adapter->post(sprintf('%s/locations/?latitude=%s&longitude=%s&skip=%s&take=%s', 
						$this->endpoint, $latitude, $longitude, $skip, $take), array(), json_encode($params));
	}

	/**
	 *	Get a single location details
	 *
	 *	@param string $location 	 location slug identifier
	 *
	 *	@return object
	 */
	public function getDetails($location)
	{
		return $this->adapter->get(sprintf('%s/locations/%s', $this->endpoint, $location));
	}

	/**
	 *	Get a single location menu
	 *
	 *	@param string $location 	 location slug identifier
	 *
	 *	@return object
	 */
	public function getMenu($location)
	{
		return $this->adapter->get(sprintf('%s/locations/%s/menu', $this->endpoint, $location));
	}

	/**
	 *	Get a single location specials
	 *
	 *	@param string $location 	 location slug identifier
	 *
	 *	@return object
	 */
	public function getSpecials($location)
	{
		return $this->adapter->get(sprintf('%s/locations/%s/specials', $this->endpoint, $location));
	}

	/**
	 *	Get a single location details
	 *
	 *	@param string $location 		 location slug identifier
	 *	@param int $skip 	 			 reviews to skip
	 *	@param int $take 	 			reviews to show
	 *
	 *	@return 			 object
	 */
	public function getReviews($location, $skip = 0, $take = 10)
	{
		return $this->adapter->get(sprintf('%s/locations/%s/reviews?skip=%s&take=%s', $this->endpoint, $location, $skip, $take));
	}
}