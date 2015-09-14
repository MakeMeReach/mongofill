<?php

namespace Mongofill\Tests\Integration;

use PHPUnit_Framework_TestCase;
use MongoClient;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
    const TEST_DB = 'mongofill-test';

    /**
     * @var MongoClient
     */
    private $testClient;

    protected function setUp()
    {
        parent::setUp();
        $this->getTestDB()->drop();
    }

    protected function tearDown()
    {
        $this->testClient = null;
        parent::tearDown();
    }

    /**
     * @return \MongoClient
     */
    protected function getTestClient()
    {
        if (!$this->testClient) {
            $this->testClient = new MongoClient();
        }
        return $this->testClient;
    }

    /**
     * @return \MongoDB
     */
    public function getTestDB()
    {
        return $this->getTestClient()->selectDB(self::TEST_DB);
    }
}
