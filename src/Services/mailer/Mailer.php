<?php


namespace Service\Mailer;


interface Mailer
{
    /*** @return string */
    public function emailBodyBulder(): string;

    /**
     * @param bool $ajax
     * @return mixed
     */
    public function configEmailService(bool $ajax);

    /*** @return bool */
    public function push(): bool;
}