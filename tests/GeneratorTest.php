<?php

namespace Tests;

use WPSalts\Random\Generator;
use RandomLib\Factory;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function testGenerator()
    {
        $generator = new Generator(new Factory);

        $this->assertInstanceOf(Generator::class, $generator);
    }

    public function testSalt()
    {
        $generator = new Generator(new Factory);

        $salt = $generator->salt();

        $this->assertEquals(64, strlen($salt));
    }
}
