Leafly API PHP Wrapper
===========================
A PHP 5.3+ warpper for the [Leafly API](https://developer.leafly.com/), with Laravel, FuelPHP and Codeignitor integration coming soon.

[![Build Status](https://travis-ci.org/TinyRocket/LeaflyPHPApi.svg?branch=master)](https://travis-ci.org/TinyRocket/LeaflyPHPApi)
[![Latest Stable Version](https://poser.pugx.org/tinyrocket/leafly/v/stable.svg)](https://packagist.org/packages/tinyrocket/leafly) [![Total Downloads](https://poser.pugx.org/tinyrocket/leafly/downloads.svg)](https://packagist.org/packages/tinyrocket/leafly) [![Latest Unstable Version](https://poser.pugx.org/tinyrocket/leafly/v/unstable.svg)](https://packagist.org/packages/tinyrocket/leafly) [![License](https://poser.pugx.org/tinyrocket/leafly/license.svg)](https://packagist.org/packages/tinyrocket/leafly)

## Installation

To install via composer, add the following to your requirements

    "require": {
		...
		"tinyrocket/leafly": "dev-master"
		...
	},
**Note:** You may need to change your **minimum-stability** to **dev**

##Usage

Require the autoloader
	
	require 'vendor/autoload.php'
	
Initiate Leafly with your Application ID and Key [Found here](https://developer.leafly.com/)
	
	$leafly = new Leafly\Leafly($appId, $key)
	
###Locations

Get location details

	$leafly->location()->getDetails('location-slug')
	
Get location menu

	$leafly->location()->getMenu('location-slug')
	
Search locations
> **Note:** Current configuration requires that latitude and longitude are passed before returning results. In future releases, this will be replaced with a PostalCode requirement which determines the search readius

	$leafly->location()->search($params, $latitude, $longitude)
	
Additional methods

	getReviews($location-slug)
	getSpecials($location-slug, $skip, $take)
	
###Strains

Get strain details
	
	$leafly->strains()->getDetails('strain-slug')
	
Get strain photos

	$leafly->strains()->getPhotos('strain-slug', $page, $take)
	
Get reviews

	$leafly->strains()->getReviews('strain-slug', $sortOrder, $page, $take)
	
Get review details

	$leafly->strains()->getReviewDetails('strain-slug', $reviewId)

##Todo

* Laravel 4/5 Integration
* FuelPHP Integration
* CodeIgnitor Integration
* Seconary package for Geolocation