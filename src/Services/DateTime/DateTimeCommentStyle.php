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
    /*** @var array */
    private static $messages;

    public function __construct()
    {
        self::$messages = [
            'now' => 'A l\'instant',
            'h-m' => 'Il y a environ :hour h :min minutes',
            'm' => 'Il y a environ :min minutes',
            'ago' => 'l j F Y'
        ];
    }

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
     * @param array $messages
     * @return DateTimeCommentStyle
     */
    public function setMessages(array $messages)
    {
        self::$messages = $messages;
        return new self;
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
        return $infos;
    }

    /**
     * @param array $data
     * @return string
     */
    private static function switchDateStyle(array $data)
    {

        if ((int)$data['day'] === 0 && (int)$data['minute'] === 0 && (int)$data['hour'] == 0) {
            return self::buildMessage(self::$messages['now']);
        }
        if ((int)$data['day'] === 0 && (int)$data['minute'] <= 59 && ((int)$data['hour'] <= 24 && (int)$data['hour'] > 0)) {
            return self::buildMessage(self::$messages['h-m'], (int)$data['minute'], (int)$data['hour']);
        }
        if ((int)$data['day'] === 0 && (int)$data['minute'] <= 59 && (int)$data['hour'] == 0) {
            return self::buildMessage(self::$messages['m'], (int)$data['minute']);
        }
        return self::ago(self::$messages['ago']);

    }

    private static function ago($format)
    {
        self::$dateFormat = new Date(self::$date);
        self::$dateFormat::setLocale('fr');
        return ucfirst(self::$dateFormat->format($format));
    }

    /**
     * @param string $message
     * @param mixed ...$values
     * @return string|string[]
     */
    private static function buildMessage(string $message, $minutes = 0, $hour = 0)
    {
        if ($minutes !== 0 && $hour === 0) {
            return str_replace(':min', $minutes, $message);
        }
        if ($minutes === 0 && $hour === 0) {
            return $message;
        }
        if ($minutes !== 0 && $hour !== 0) {
            $message = str_replace(array(':min', ':hour'), array($minutes, $hour), $message);
            return $message;
        }
        if ($minutes === 0 && $hour !== 0) {
            $message = str_replace(array(':min', 'h', ':hour'), array($minutes, '', ''), $message);
            return $message;
        }
        return '';
    }
}