<?php


namespace Service\Mailer;

class FinalizeAccountMailer extends Mailer implements MailerSerice
{

    public function build(): Mailer
    {
        // TODO: Implement build() method.
        $this
            ->from(MAIL_USERNAME, MAIL_SENDER)
            ->subject('Finalisation de la creation de votre  compte espace membre ')
            ->view('mailer.finalize-account', $this->data, true);
        return $this;
    }

    public function forward(): bool
    {
        // TODO: Implement forward() method.
        return $this->build()->push();
    }

}