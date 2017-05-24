<?php

namespace SimplePhpApi;

use Exception;
use SimplePhpApi\Request\DeleteMethod;
use SimplePhpApi\Request\ErrorMethod;
use SimplePhpApi\Request\GetMethod;
use SimplePhpApi\Request\PostMethod;
use SimplePhpApi\Request\PutMethod;

/**
 * Class Builder
 * @package SimplePhpApi
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class Builder
{
    const POST = 'POST';

    const REQUEST = [];

    /**
     * @var null
     */
    protected $input = null;

    /**
     * @var null
     */
    protected $request = self::REQUEST;

    /**
     * @var null
     */
    protected $method = self::POST;

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param $input
     * @return $this
     */
    public function setInput($input)
    {
        $this->input = $input;
        if (!is_array($input)) {
            $this->input = json_decode($input, true);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = explode('/', trim($request,'/'));

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return DeleteMethod|GetMethod|PostMethod|PutMethod
     * @throws \Exception
     */
    public function build()
    {
        try {
            if ($this->getMethod() == null) {
                throw new Exception('method not set');
            }
            switch ($this->getMethod()) {
                case 'POST' :
                    $method = new PostMethod($this->getRequest(), $this->getInput());
                    break;
                //change if need another method
                /*case 'GET' :
                    $method = new GetMethod($this->getRequest());
                    break;
                case 'PUT' :
                    $method = new PutMethod($this->getRequest());
                    break;
                case 'DELETE' :
                    $method = new DeleteMethod($this->getRequest());
                    break;*/
                default :
                    $method = new ErrorMethod($this->getRequest(), ErrorMethod::INVALID);
            }
        } catch (Exception $e) {
            $method = new ErrorMethod($this->getRequest(), ErrorMethod::INTERNAL);
        }
        return $method;
    }

}