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
 * @subpackage    Leafly\Resource\Strains
 * @version       1.0.0
 * @author        TinyRocket <michael@tinyrocket.co>
 * @license       BSD License (3-clause)
 * @copyright     Copyright 2014 TinyRocket
 * @link          http://tinyrocket.co/leafly
 */
namespace Leafly\Resource;

/**
 *	Leafly\Resource\Strains
 *
 *	Primary outlet for all strain based actions
 *
 *	@see https://developer.leafly.com/docs#strains
 */
class Strains extends AbstractResource {

	/**
	 *	Perform search for strains
	 *	
 	 *	@param int $page 		 page number
	 *	@param int $take 		 strains to show
	 *
	 *	@return object
	 */
	public function search($page = 0, $take = 10)
	{
		$params['Page'] = $page;
		$params['Take'] = $take;
		return $this->adapter->post(sprintf('%s/strains/', $this->endpoint), array(), json_encode($params));
	}

	/**
	 *	Get a single strain details
	 *
	 *	@param string $strain 	 strain slug identifier
	 *
	 *	@return object
	 */
	public function getDetails($strain)
	{
		return $this->adapter->get(sprintf('%s/strains/%s', $this->endpoint, $strain));
	}

	/**
	 *	Get a single strain reviews
	 *
	 *	@param string $strain 	 strain slug identifier
	 *	@param string $sort 	 review sort order
	 *	@param int    $page 	 curent search results page
	 *	@param int    $take 	 number of records to return
	 *
	 *	@return object
	 */
	public function getReviews($strain, $sort = 'date', $page = 0, $take = 10)
	{
		return $this->adapter->get(sprintf('%s/strains/%s/reviews?sort=%s&page=%s&take=%s', $this->endpoint, $strain, $sort, $page, $take));
	}

	/**
	 *	Get a single strain reviews
	 *
	 *	@param string 	$strain 	 strain slug identifier
	 *	@param int    	$reviewId  review identifier
	 *
	 *	@return object
	 */
	public function getReviewDetails($strain, $reviewId)
	{
		return $this->adapter->get(sprintf('%s/strains/%s/reviews/%s', $this->endpoint, $strain, $reviewId));
	}

	/**
	 *	Get a single strain photos
	 *
	 *	@param string $strain 	 strain slug identifier
	 * 	@param int    $page 	 curent search results page
	 *	@param int    $take 	 number of records to return
	 *
	 *	@return object
	 */
	public function getPhotos($strain, $page = 0, $take = 10)
	{
		return $this->adapter->get(sprintf('%s/strains/%s/photos?page=%s&take=%s', $this->endpoint, $strain, $page, $take));
	}
}