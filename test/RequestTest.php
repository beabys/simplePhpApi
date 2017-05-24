<?php

namespace Tests;

require_once('Mocks.php');
use PHPUnit\Framework\TestCase;
use SimplePhpApi\Request\PostMethod;

/**
 * Class RequestTest
 * @package Tests
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class RequestTest extends TestCase
{

    /**
     * Validate instance or Request
     */
    public function testValidateInstance()
    {
        $postMethod = new PostMethod(Mocks::REQUEST, Mocks::INPUT_VALID);
        $this->assertInstanceOf('SimplePhpApi\Request\Request', $postMethod);
    }

    /**
     * Test ValidateRequest
     */
    public function testValidateRequest()
    {
        $postMethod = new PostMethod(Mocks::REQUEST, Mocks::INPUT_VALID);
        $result = $postMethod->validateRequest();
        $this->assertTrue($result);
    }

    /**
     * Test Process to get messages
     */
    public function testProccess()
    {

        $postMethod = new PostMethod(Mocks::REQUEST, Mocks::INPUT_VALID);
        $result = $postMethod
            ->process()
            ->getMessage();
        $this->assertArrayHasKey('Success', $result);
    }

}