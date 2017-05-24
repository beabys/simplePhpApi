<?php
/**
 * Created by PhpStorm.
 * User: beabys
 * Date: 24/05/17
 * Time: 11:21
 */

namespace SimplePhpApi;

use SimplePhpApi\Decorator\Success;
use SimplePhpApi\Decorator\Error;
use SimplePhpApi\Decorator\Invalid;

/**
 * Class Server
 * @package SimplePhpApi
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class Server
{

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $info;

    /**
     * @var string
     */
    protected $input;

    /**
     * Server constructor.
     * @param $method
     * @param $info
     * @param $input
     */
    public function __construct($method, $info, $input)
    {
        $this->method = $method;
        $this->info = $info;
        $this->input = $input;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        //builder
        $builder = new Builder();
        //Set parameters in the builder
        $request = $builder
            ->setMethod($this->method)
            ->setRequest($this->info)
            ->setInput($this->input)
        ;

        //Return instance of the Request according the parameters
        $method = $request->build();

        //Process the request
        $message = $method
            ->process()
            ->getMessage()
        ;
        $message = $this->setHeaders($message);
        return json_encode($message);
    }

    /**
     * @param $message
     * @return mixed
     */
    protected function setHeaders($message)
    {

        if ($message['Success']) {
            $decorator = new Success();
        } else {
            $decorator = $message['Message']['code'] == 404 ? new Invalid() : new Error();
        }
        $decorator->setHeaders();
        return $message;
    }
}