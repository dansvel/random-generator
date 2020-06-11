<?php

namespace Setengahmanusia\RandomGenerator;

use Exception;

/**
 * Class RandomGenerator
 * @package Setengahmanusia\RandomGenerator
 */
class Random
{
    /**
     * Generate human readable word with 3-6 letters.
     *
     * @param int $length
     * @return string
     * @throws Exception
     */
    public static function humane($length = 6) {
        if ($length < 3 || $length > 6) throw new Exception('Unhandled length! Please use length from 3 to 6');

        $string     = '';
        $vowels     = 'aeiou';
        $consonants = 'bcdfghjklmnprstvwxyz';

        $composition = [
            3 => ['cvc'],
            4 => ['cvcv', 'vccv', 'vcvc'],
            5 => ['cvcvc', 'cvccv', 'vccvc', 'vcvcv'],
            6 => ['cvcvcv', 'cvccvc', 'vcvcvc', 'vccvcv']
        ];

        srand((double) microtime() * 1000000);
        $random_composition = $composition[$length][array_rand($composition[$length])];

        foreach (str_split($random_composition) as $value) {
            $string .= $value == 'c' ? $consonants[rand(0,19)] : '';
            $string .= $value == 'v' ? $vowels[rand(0,4)] : '';
        }

        return $string;
    }

    /**
     * Generate true random of string with any character length.
     *
     * @param int $length
     * @param string $char_type
     * @return string
     * @throws Exception
     */
    public static function inhumane(int $length = 6, string $char_type = 'a') {
        if ($length < 1) throw new Exception('Length must be a positive integer.');

        $charset = [
            0 => $num = '0123456789',
            'a' => $low = 'qwertyuiopasdfghjklzxcvbnm',
            'A' => $up = strtoupper($low),
            'aA' => $low.$up,
            '0a' => $num.$low,
            '0A' => $num.$up,
            '0aA' => $num.$low.$up,
        ];

        if (!array_key_exists($char_type, $charset)) throw new Exception('Unhandled char type! Please use "0", "a", "A", "aA", "0a", "0A" or "0aA".');

        $charset = $charset[$char_type];
        $char_length = strlen($charset);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $charset[rand(0, $char_length - 1)];
        }
        return $string;
    }
}
