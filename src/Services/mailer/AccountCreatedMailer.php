<?php


namespace Service\Mailer;


class AccountCreatedMailer extends Mailer implements MailerSerice
{
    /*** @return Mailer */

    public function build(): Mailer
    {
        // TODO: Implement build() method.
        $this
            ->from(MAIL_USERNAME, MAIL_SENDER)
            ->subject('Vos identifiants de connexion')
            ->view('mailer.identifiantsMailerView', $this->data, true);
        return $this;
    }

    /*** @return bool */
    public function forward(): bool
    {
        // TODO: Implement forward() method.
        return $this->build()->push();
    }
}