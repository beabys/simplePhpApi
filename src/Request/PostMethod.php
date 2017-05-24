<?php

namespace SimplePhpApi\Request;

use SimplePhpApi\Model\Cards;

/**
 * Class PostMethod
 * @package SimplePhpApi\Request
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class PostMethod extends Request
{

    protected $input;

    /**
     * PostMethod constructor.
     * @param $request
     * @param $input
     */
    public function __construct($request, $input)
    {
        $this->request = $request;
        $this->input = $input;
    }

    /**
     * Process Request
     */
    public function process()
    {
        $result = $this->errorsMessage;
        $message = $this->invalidResult;
        if ($this->validateRequest()) {
            $cards = new Cards();
            $tempMessage = $cards->order($this->input);
            if (!empty($tempMessage)) {
                $message = $tempMessage;
                $result = $this->successMessage;
            };
        }
        $this->setMessage($result, $message);

        return $this;
    }
}