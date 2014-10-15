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
namespace Leafly\Adapter;

use Buzz\Browser;
use Buzz\Message\Response;
use Buzz\Client\Curl;
use Buzz\Listener\ListenerInterface;
use Leafly\Adapter\ApplicationAuthListener;

class BuzzAdapter extends AbstractAdapter implements AdapterInterface {

	protected $browser;

	public function __construct($app, $key)
	{
		$this->browser = new Browser(new Curl());
		$this->browser->addListener(new ApplicationAuthListener($app, $key));
	}

	public function get($url)
	{
		$response = $this->browser->get($url);

		if ( !$response->isSuccessful() ) {
			throw new \Exception(__METHOD__);
		}

		return $this->format($response->getContent());
	}

	public function delete($url, $headers = array())
	{
		
	}

	public function put($url, $headers = array(), $content = '')
	{
		
	}

	public function post($url, $headers = array(), $content = '')
	{
		$response = $this->browser->post($url, $headers, $content);

		if ( !$response->isSuccessful() ) {
			throw new \Exception(__METHOD__);
		}

		return $this->format($response->getContent());
	}

	protected function format($response)
	{
		if ( is_string($response) ) {
			return json_decode($response);
		}
	}
}