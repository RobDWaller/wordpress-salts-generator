<?php

namespace WPSalts;

use WPSalts\Random\Generator;
use RandomLib\Factory;

/**
 * Class that generates WordPress salts and keys used in authentication and
 * security. Generates the salts and keys in the traditional 'define'
 * WordPress manner and the new Composer driven DotEnv format.
 *
 * @author Rob Waller <rdwaller1984@gmail.com>
 */
class Salts
{
    /**
     * Generate and return all the WordPress salts as an array.
     *
     * @return array
     */
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

    /**
     * Gets an array of WordPress salts and then reduces them to a string for
     * output to the CLI. Returns them in the traditional WordPress define
     * format used in wp-config.php files.
     *
     * @return string
     */
    public function traditional(): string
    {
        $salts = $this->wordPressSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
            $saltsString .= "define('$key', '$salts[$key]');" . PHP_EOL;

            return $saltsString;
        }, '');
    }

    /**
     * Gets an array of WordPress salts and then reduces them to a string for
     * output to the CLI. Returns them in the DotEnv format used in .env files.
     *
     * @return string
     */
    public function dotEnv(): string
    {
        $salts = $this->wordPressSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
            $saltsString .= "$key='$salts[$key]'" . PHP_EOL;

            return $saltsString;
        }, '');
    }
}
