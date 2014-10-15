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

use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;

class ApplicationAuthListener implements \Buzz\Listener\ListenerInterface {

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
	 *	@return void
	 */
	public function __construct($app, $key)
	{
		$this->app = $app;
		$this->key = $key;
	}

    /**
     * {@inheritdoc}
     */
    public function preSend(RequestInterface $request)
    {
        $request->addHeader(sprintf('app_id:%s', $this->app));
        $request->addHeader(sprintf('app_key:%s', $this->key));
    }

    /**
     * {@inheritdoc}
     */
    public function postSend(RequestInterface $request, MessageInterface $response)
    {
    }
}