<?php
namespace backend\utils;

/**
 * Класс утилит даты и времени.
 */
class DateTime
{
    /**
     * Сгенерировать случайный timestamp в дипазоне.
     *
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     *
     * @return int
     */
    public static function randomDate(\DateTime $startDate, \DateTime $endDate): int
    {
        return \mt_rand($startDate->getTimestamp(), $endDate->getTimestamp());
    }
}
