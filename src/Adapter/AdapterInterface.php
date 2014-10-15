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
namespace Leafly\Adapter;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
interface AdapterInterface {

	/**
     * @param  string                               $url
     * @throws \RuntimeException|ExceptionInterface
     * @return string
     */
    public function get($url);

    /**
     * @param  string                               $url
     * @param  array                                $headers (optional)
     * @throws \RuntimeException|ExceptionInterface
     */
    public function delete($url, array $headers = array());

    /**
     * @param  string                               $url
     * @param  array                                $headers (optional)
     * @param  string                               $content (optional)
     * @throws \RuntimeException|ExceptionInterface
     * @return string
     */
    public function put($url, array $headers = array(), $content = '');

    /**
     * @param  string                               $url
     * @param  array                                $headers (optional)
     * @param  string                               $content (optional)
     * @throws \RuntimeException|ExceptionInterface
     * @return string
     */
    public function post($url, array $headers = array(), $content = '');
}