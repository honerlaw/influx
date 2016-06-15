<?php

namespace Server\Service\Router;

use \Server\Http\Request;
use \Server\Http\Response;

/**
 * Context used for routing, contains data associated with a route
 *
 * @author Derek Honerlaw <honerlawd@gmail.com>
 */
class RouteContext
{

    /**
     * @var array The array of data that is stored on the context
     */
    private $data;

    /**
     * @var resource The client socket
     */
    private $socket;

    /**
     * @var Request The request object containing request data
     */
    private $request;

    /**
     * @var Response The response object containing response data
     */
    private $response;

    /**
     * Initialize the RouteContext
     */
    public function __construct($socket, Request $request)
    {
        $this->data = [];
        $this->socket = $socket;
        $this->request = $request;
        $this->response = new Response();
    }

    /**
     * @return resource The client socket
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * Store a value on the context to be used later
     *
     * @param string $key The key for the value
     * @param mixed $value The value to store
     *
     * @return RouteContext
     */
    public function set(string $key, $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * Get data that is stored in the context
     *
     * @param string $key The key for the data
     *
     * @return mixed|null
     */
    public function get(string $key)
    {
        if(array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        return null;
    }

}
