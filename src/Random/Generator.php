<?php

namespace WPSalts\Random;

use RandomLib\Factory;

class Generator
{
    private $factory;

    private $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!"#$%&\'()* +,-./:;<=>?@[\]^_`{|}~';

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function salt(): string
    {
        return $this->factory->getMediumStrengthGenerator()
            ->generateString(64, $this->chars);
    }
}
