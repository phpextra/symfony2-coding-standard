<?php
/**
 * One Dot Per Line Sniff, if not getter or fluent
 */
class OneDotPerLineSniffTest
{
    public function validExamples()
    {
        $this->container;

        $this->container
             ->get('service');

        $this->getContainer()
             ->get('service');

        $this->getContainer()->get('service');

        self::$container;

        self::$container->get('service');

        self::$container->get('service')
                        ->getName();

        self::$container->get('service')->getName();

        $mock = $this->getMockBuilder('FooBar')
                     ->disableOriginalConstructor()
                     ->getMock();

        $mock->expects($this->any())
             ->method('foo')
             ->will($this->returnValue($mock));
    }

    public function invalidExamples()
    {
        // properties break the method chain
        $this->container->get('service');

        $this->getContainer()->name;

        $this->getService()->gettable->getType();

        // mixing getters and non-getters in the fluent interface
        $mock = $this->getMockBuilder('FooBar')->disableOriginalConstructor()
                     ->getMock();

        $mock = $this->getMockBuilder('FooBar')->disableOriginalConstructor()->getMock();

        $mock = $this->getMockBuilder('FooBar')
                     ->disableOriginalConstructor()->getMock();
    }
}
