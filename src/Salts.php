<?php

namespace WPSalts;

use WPSalts\Random\Generator;
use RandomLib\Factory;

class Salts
{
    public function wordPressSalts(): array
    {
        $generator = new Generator(new Factory);

        $salts['AUTH_KEY'] = $generator->salt();
        $salts['SECURE_AUTH_KEY'] = $generator->salt();
        $salts['LOGGED_IN_KEY'] = $generator->salt();
        $salts['NONCE_KEY'] = $generator->salt();
        $salts['AUTH_SALT'] = $generator->salt();
        $salts['SECURE_AUTH_SALT'] = $generator->salt();
        $salts['LOGGED_IN_SALT'] = $generator->salt();
        $salts['NONCE_SALT'] = $generator->salt();

        return $salts;
    }

    public function traditional(): string
    {
        $salts = $this->wordPressSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
                $saltsString .= "define('$key', '$salts[$key]');" . PHP_EOL;

                return $saltsString;
            }, '');
    }

    public function dotEnv(): string
    {
        $salts = $this->wordPressSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
                $saltsString .= "$key = '$salts[$key]'" . PHP_EOL;

                return $saltsString;
            }, '');
    }
}
