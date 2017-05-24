<?php

namespace Tests;

require_once('Mocks.php');
use PHPUnit\Framework\TestCase;
use SimplePhpApi\Model\Cards;
use ReflectionClass;

/**
 * Class CardsTest
 * @package Tests
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class CardsTest extends TestCase
{


    /**
     * Test invalid Array
     */
    public function testIsAValidArray()
    {

        //printf('Test invalid Array' . PHP_EOL);
        $cards = new Cards();
        $result = $this->invokeProtectedMethods($cards, 'validateFields', Mocks::INPUT_VALID);
        $this->assertTrue($result);
    }

    /**
     * Test Valid Array
     */
    public function testIsInvalidArray()
    {
        //printf('Test Valid Array' . PHP_EOL);
        $cards = new Cards();
        $result = $this->invokeProtectedMethods($cards, 'validateFields', Mocks::INPUT_INVALID_MISSING);
        $this->assertFalse($result);
    }

    /**
     * Test Has First Element
     */
    public function testHasFirstElement()
    {
        //printf('Test Has First Element' . PHP_EOL);
        $cards = new Cards();
        $result = $this->invokeProtectedMethods($cards, 'getFirstLink', Mocks::INPUT_INVALID);
        $this->assertNull($result);
    }

    /**
     * Test Order Cards
     */
    public function testOrderCards()
    {
        //printf('Test Order Cards' . PHP_EOL);
        $cards = new Cards();
        $result = $cards->order(Mocks::INPUT_VALID);
        $this->assertNotEmpty($result);
    }

    /**
     * @param $object
     * @param $method
     * @param array $args
     * @return mixed
     */
    protected function invokeProtectedMethods($object, $method, array $args = []) {
        $class = new ReflectionClass(get_class($object));
        $method = $class->getMethod($method);
        $method->setAccessible(true);
        return $method->invoke($object, $args);
    }

}

