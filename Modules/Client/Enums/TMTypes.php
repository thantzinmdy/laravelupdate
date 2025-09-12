<?php

namespace Modules\Client\Enums;

class TMTypes
{
    const WORD_AND_FIGURE = 'W & F';
    const FIGURE = 'F';
    const WORD = 'W';

    /**
     * Get all TM types as an array
     *
     * @return array
     */
    public static function getAll()
    {
        return [
            self::WORD_AND_FIGURE => 'W & F',
            self::FIGURE => 'F',
            self::WORD => 'W',
        ];
    }

    /**
     * Get TM type label by value
     *
     * @param string $value
     * @return string
     */
    public static function getLabel($value)
    {
        $types = self::getAll();
        return $types[$value] ?? $value;
    }

    /**
     * Get all TM type values
     *
     * @return array
     */
    public static function getValues()
    {
        return [
            self::WORD_AND_FIGURE,
            self::FIGURE,
            self::WORD,
        ];
    }
}