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
 * @copyright  (c) 2011 - 2013, TinyRocket
 * @link       http://tinyrocket.co/leafly
 */
namespace Leafly\Resource;

class Locations extends AbstractResource {

	public function search($latitude = null, $longitude = null, $params = array(), $skip = 0, $take = 10)
	{
		if ( !is_array($params) ) {
			throw new \Exception("Variable [$params] must be an array.");
		}
		return $this->adapter->post(sprintf('%s/locations/%s/reviews?latitude=%s&longitude=%s&skip=%s&take=%s', $latitude, $longitude, $this->endpoint, $location, $skip, $take), '', json_encode($params));
	}

	public function getDetails($location)
	{
		return $this->adapter->get(sprintf('%s/locations/%s', $this->endpoint, $location));
	}

	public function getMenu($location)
	{
		return $this->adapter->get(sprintf('%s/locations/%s/menu', $this->endpoint, $location));
	}

	public function getSpecials($location)
	{
		return $this->adapter->get(sprintf('%s/locations/%s/specials', $this->endpoint, $location));
	}

	public function getReviews($location, $skip = 0, $take = 10)
	{
		return $this->adapter->get(sprintf('%s/locations/%s/reviews?skip=%s&take=%s', $this->endpoint, $location, $skip, $take));
	}
}