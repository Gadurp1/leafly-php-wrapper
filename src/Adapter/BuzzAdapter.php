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
 * @subpackage    Leafly\Adapter\BuzzAdapter
 * @version       1.0.0
 * @author        TinyRocket <michael@tinyrocket.co>
 * @license       BSD License (3-clause)
 * @copyright     Copyright 2014 TinyRocket
 * @link          http://tinyrocket.co/leafly
 */
namespace Leafly\Adapter;

use Buzz\Browser;
use Buzz\Message\Response;
use Buzz\Client\Curl;
use Buzz\Listener\ListenerInterface;
use Leafly\Adapter\ApplicationAuthListener;

/**
 * Leafly\Adapter\BuzzAdapter
 *
 * Extension of the BuzzAdapter and the default
 * HTTP adapter for Leafly. Can serve as an outline
 * for future Adapter integrations
 */
class BuzzAdapter extends AbstractAdapter implements AdapterInterface {

    /**
     * @var \Buzz\Browser instance
     */
	protected $browser;

	/**
     *  @param string $app      Application ID obtained from Leafly Developer Center
     *  @param string $key      Application key obtained from Leafly Developer Center
     */
	public function __construct($app, $key)
	{
		$this->browser = new Browser(new Curl());
		$this->browser->addListener(new ApplicationAuthListener($app, $key));
	}

	/**
	 * @author Antoine Corcy <contact@sbin.dk>
	 */

  	/**
     * {@inheritdoc}
     *
     * @param string $url       Endpoint URL
     */
    public function get($url)
    {
        $response = $this->browser->get($url);

        if (!$response->isSuccessful()) {
            throw new \Exception($response);
        }

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     *
     * @param array  $headers   Additional headers to be sent with request
     * @param string $url       Endpoint URL
     */
    public function delete($url, array $headers = array())
    {
        $response = $this->browser->delete($url, $headers);

        if (!$response->isSuccessful()) {
            throw new \Exception($response);
        }
    }

    /**
     * {@inheritdoc}
     *
     * @param array  $headers    Additional headers to be sent with request
     * @param string $url        Endpoint URL
     * @param string $content    JSON Encoded parameter data
     */
    public function put($url, array $headers = array(), $content = '')
    {
        $response = $this->browser->put($url, $headers, $content);

        if (!$response->isSuccessful()) {
            throw new \Exception($response);
        }

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     *
     * @param array  $headers    Additional headers to be sent with request
     * @param string $url        Endpoint URL
     * @param string $content    JSON Encoded parameter data
     */
    public function post($url, array $headers = array(), $content = '')
    {
        $headers[] = sprintf("Content-Length: %s", strlen($content));
		$headers[] = array('Content-Type: application/json');

        $response = $this->browser->post($url, $headers, $content);
        if (!$response->isSuccessful()) {
            throw new \Exception($response);
        }

        return $response->getContent();
    }

    /**
     *  Format response data
     *
     *	@param Response 	$response
     *	@return \StdObject
     */
	protected function format($response)
	{
		if ( is_string($response) ) {
			return json_decode($response);
		}
	}
}