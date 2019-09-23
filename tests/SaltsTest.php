<?php

namespace Tests;

use WPSalts\Salts;
use PHPUnit\Framework\TestCase;

class SaltsTest extends TestCase
{
    public function testSalts()
    {
        $salts = new Salts();

        $this->assertInstanceOf(Salts::class, $salts);
    }

    public function testWordPressSalts()
    {
        $salts = new Salts();

        $result = $salts->wordPressSalts();

        $this->assertTrue(isset($result['AUTH_KEY']));
        $this->assertTrue(isset($result['SECURE_AUTH_KEY']));
        $this->assertTrue(isset($result['LOGGED_IN_KEY']));
        $this->assertTrue(isset($result['NONCE_KEY']));
        $this->assertTrue(isset($result['AUTH_SALT']));
        $this->assertTrue(isset($result['SECURE_AUTH_SALT']));
        $this->assertTrue(isset($result['LOGGED_IN_SALT']));
        $this->assertTrue(isset($result['NONCE_SALT']));
    }

    public function testSaltsLength()
    {
        $salts = new Salts();

        $result = $salts->wordPressSalts();

        $this->assertEquals(64, strlen($result['AUTH_KEY']));
        $this->assertEquals(64, strlen($result['SECURE_AUTH_KEY']));
    }

    public function testSaltsNoMatch()
    {
        $salts = new Salts();

        $result = $salts->wordPressSalts();

        $this->assertNotEquals($result['LOGGED_IN_KEY'], $result['NONCE_KEY']);
        $this->assertNotEquals($result['SECURE_AUTH_SALT'], $result['AUTH_SALT']);
    }

    public function testTraditional()
    {
        $salts = new Salts();

        $result = $salts->traditional();

        $this->assertRegExp('/^define\(\'AUTH_KEY\',\s\'/', $result);
        $this->assertRegExp('/define\(\'SECURE_AUTH_KEY\',\s\'/', $result);
        $this->assertRegExp('/define\(\'LOGGED_IN_KEY\',\s\'/', $result);
        $this->assertRegExp('/define\(\'NONCE_KEY\',\s\'/', $result);
        $this->assertRegExp('/define\(\'AUTH_SALT\',\s\'/', $result);
        $this->assertRegExp('/define\(\'SECURE_AUTH_SALT\',\s\'/', $result);
        $this->assertRegExp('/define\(\'LOGGED_IN_SALT\',\s\'/', $result);
        $this->assertRegExp('/define\(\'NONCE_SALT\',\s\'/', $result);
    }

    public function testDotEnv()
    {
        $salts = new Salts();

        $result = $salts->dotEnv();

        $this->assertRegExp('/^AUTH_KEY=\'.*/', $result);
        $this->assertRegExp('/SECURE_AUTH_KEY=\'.*/', $result);
        $this->assertRegExp('/LOGGED_IN_KEY=\'.*/', $result);
        $this->assertRegExp('/NONCE_KEY=\'.*/', $result);
        $this->assertRegExp('/AUTH_SALT=\'.*/', $result);
        $this->assertRegExp('/SECURE_AUTH_SALT=\'.*/', $result);
        $this->assertRegExp('/LOGGED_IN_SALT=\'.*/', $result);
        $this->assertRegExp('/NONCE_SALT=\'.*/', $result);
    }
}
