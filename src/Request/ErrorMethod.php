<?php

namespace SimplePhpApi\Request;


/**
 * Class ErrorMethod
 * @package SimplePhpApi\Request
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class ErrorMethod extends Request
{
    const INVALID = 'invalid';
    const INTERNAL = 'internal';

    /**
     * @var string
     */
    protected $error;

    /**
     * ErrorMethod constructor.
     * @param $request
     * @param $error
     */
    public function __construct($request, $error)
    {
        $this->error = $error;
        parent::__construct($request);
    }

    /**
     * @return $this
     */
    public function process()
    {
        $result = $this->errorsMessage;
        $message = $this->error == self::INTERNAL ? $this->internalErrorResult : $this->invalidResult;
        $this->setMessage($result, $message);
        return $this;
    }

}