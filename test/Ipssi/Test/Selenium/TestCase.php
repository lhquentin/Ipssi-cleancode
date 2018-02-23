<?php

namespace Ipssi\Test\Selenium;

class TestCase extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        //$this->setBrowserUrl('http://192.168.8.28/Ipssi-cleancode');
        $this->setBrowserUrl('http://ipssi.com/');
        $this->setBrowser('chrome');
    }

    public function getHostname()
    {
        return 'http://ipssi.com';
    }
}