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
namespace Leafly;

use Leafly\Resource\Locations;
use Leafly\Resource\Strains;

class Leafly {

	public $adapter;

	public function __construct($adapter)
	{
		$this->adapter = $adapter;
	}

	public function locations()
	{
		return new Locations($this->adapter);
	}

	public function strains()
	{
		return new Strains($this->adapter);
	}
}