<?php


namespace Service;


interface SendMail
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