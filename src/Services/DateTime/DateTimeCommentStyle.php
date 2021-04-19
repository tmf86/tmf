<?php

namespace Service\DateTime;

use Jenssegers\Date\Date;
use Wikimedia\Timestamp\ConvertibleTimestamp;

class DateTimeCommentStyle
{
    /*** @var ConvertibleTimestamp */
    private static ConvertibleTimestamp $convertibleTimeStamp;
    /*** @var Date */
    private static Date $dateFormat;
    /*** @var string */
    private static $timestamp;
    /*** @var string */
    private static $nowTimestamp;
    /*** @var string */
    private static $date;

    /**
     * @param $timestamp
     * @return DateTimeCommentStyle
     * @throws \Wikimedia\Timestamp\TimestampException
     */
    public static function setTimestamp($date)
    {
        self::$date = $date;
        self::$convertibleTimeStamp = new ConvertibleTimestamp();
        self::$convertibleTimeStamp->setTimestamp($date);
        return new self();
    }

    /**
     * @return string
     * @throws \Wikimedia\Timestamp\TimestampException
     */
    static function getDateCommentStyle()
    {
        self::$timestamp = self::$convertibleTimeStamp->getTimestamp();
        self::$nowTimestamp = time();
        return self::switchDateStyle(self::dateDiff(self::$nowTimestamp, self::$timestamp));
    }

    private static function dateDiff($date1, $date2)
    {
        $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
        $infos = [];
        $tmp = $diff;
        $infos['second'] = $tmp % 60;
        $tmp = floor(($tmp - $infos['second']) / 60);
        $infos['minute'] = $tmp % 60;
        $tmp = floor(($tmp - $infos['minute']) / 60);
        $infos['hour'] = $tmp % 24;
        $tmp = floor(($tmp - $infos['hour']) / 24);
        $infos['day'] = $tmp;
//        var_dump($infos);
        return $infos;
    }

    /**
     * @param array $data
     * @return string
     */
    private static function switchDateStyle(array $data)
    {

        if ((int)$data['day'] === 0 && (int)$data['minute'] === 0 && (int)$data['hour'] == 0) {
            return 'a l\'instant';
        }
        if ((int)$data['day'] === 0 && (int)$data['minute'] <= 59 && ((int)$data['hour'] <= 24 && (int)$data['hour'] > 0)) {
            return 'il y a ' . (int)$data['hour'] . ' h ' . (int)$data['minute'] . ' minutes';
        }
        if ((int)$data['day'] === 0 && (int)$data['minute'] <= 59 && (int)$data['hour'] == 0) {
            return 'il y a ' . (int)$data['minute'] . ' minutes';
        }
        self::$dateFormat = new Date(self::$date);
        self::$dateFormat::setLocale('fr');
        return ucfirst(self::$dateFormat->format('l j F Y'));
    }
}