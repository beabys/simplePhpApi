<?php

namespace SimplePhpApi\Request;

/**
 * Interface RequestInterface
 * @package SimplePhpApi\Request
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
interface RequestInterface {

    /**
     * @return mixed
     */
    public function validateRequest();

    /**
     * @return mixed
     */
    public function process();

    /**
     * @param array $result
     * @param array $message
     */
    public function setMessage(array $result, array $message);

    /**
     * @return mixed
     */
    public function getMessage();

}