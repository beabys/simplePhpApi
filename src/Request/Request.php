<?php

namespace SimplePhpApi\Request;

/**
 * Class Request
 * @package SimplePhpApi\Request
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
abstract class Request implements RequestInterface
{

    const REQUEST_ELEMENTS = 1;

    /**
     * @var array
     */
    protected $message;

    /**
     * @var array
     */
    protected $request;

    /**
     * @var array
     */
    protected $successMessage = [
        "Success" => true,
    ];

    /**
     * @var array
     */
    protected $errorsMessage = [
        "Success" => false,
    ];

    /**
     * @var array
     */
    protected $invalidResult = [
        "Error" => 'Invalid Request',
        "code" => 400
    ];

    /**
     * @var array
     */
    protected $internalErrorResult = [
        "Error" => 'Internal Error',
        "code" => 500
    ];

    /**
     * Request constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function validateRequest()
    {
        $validRequest = true;
        $request = $this->request;
        if (count($request) > self::REQUEST_ELEMENTS || (isset($request[0]) && $request[0] != '')) {
            $validRequest = false;
        }
        return $validRequest;
    }

    /**
     * Process Request
     */
    public function process()
    {
        return $this;
    }

    /**
     * @param array $result
     * @param array $message
     */
    public function setMessage(array $result, array $message)
    {
        $message = array_merge($result, ["Message" => $message]);
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

}