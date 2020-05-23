<?php

namespace backend\models;

/**
 * Класс цветовю.
 */
class Color
{
    const SILVER  = '#C0C0C0';
    const GRAY    = '#808080';
    const BLACK   = '#000000';
    const RED     = '#FF0000';
    const MAROON  = '#800000';
    const YELLOW  = '#FFFF00';
    const OLIVE   = '#808000';
    const LIME    = '#00FF00';
    const GREEN   = '#008000';
    const AQUA    = '#00FFFF';
    const TEAL    = '#008080';
    const BLUE    = '#0000FF';
    const NAVY    = '#000080';
    const FUCHSIA = '#FF00FF';
    const PURPLE  = '#800080';

    private static $colors = [
        self::SILVER,
        self::GRAY,
        self::BLACK,
        self::RED,
        self::MAROON,
        self::YELLOW,
        self::OLIVE,
        self::LIME,
        self::GREEN,
        self::AQUA,
        self::TEAL,
        self::BLUE,
        self::NAVY,
        self::FUCHSIA,
        self::PURPLE
    ];

    /**
     * Получить массив имующихся цветов.
     *
     * @return array
     */
    public static function getColors(): array
    {
        return self::$colors;
    }

    /**
     * Получить случайный цвет.
     *
     * @return string
     */
    public static function getRandomColor(): string
    {
        return self::getColors()[\array_rand(self::getColors())];
    }
}
