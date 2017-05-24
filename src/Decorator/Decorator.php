<?php

namespace SimplePhpApi\Decorator;

/**
 * Class Decorator
 * @package SimplePhpApi\Decorator
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
abstract class Decorator
{

    /**
     * @var int
     */
    protected $code = 201;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set Header for response
     */
    public function setHeaders()
    {
        http_response_code($this->getCode());
        header('Content-type: application/json');
        header_remove('X-Powered-By');
        header('X-Powered-By : beabys');
    }

}