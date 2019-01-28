<?php

namespace WPSalts\Random;

use RandomLib\Factory;

/**
 * A simple class that will generate a random 64 character string. This class
 * is based on the paragonie/random-lib which is a fork of the PHP
 * ircmaxell/random-lib which no longer seems to be in support.
 *
 * @author Rob Waller <rdwaller1984@gmail.com>
 */
class Generator
{
    /**
     * @var Factory $factory
     */
    private $factory;

    /**
     * List of characters to be used in the salt generation
     *
     * @var string $chars
     */
    private $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!"#$%&\'()*+,-./:;<=>?@[\]^_`{|}~';

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Generates 64 character salt string
     *
     * @return string
     */
    public function salt(): string
    {
        return $this->factory->getMediumStrengthGenerator()
            ->generateString(64, $this->chars);
    }
}
