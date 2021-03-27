<?php


namespace Service\Mailer;

interface MailerSerice
{
    /*** @return Mailer */
    public function build(): Mailer;

    /*** @return bool */
    public function forward(): bool;
}