<?php


namespace Service\Mailer;

class FinalizeAccountMailer extends Mailer implements MailerSerice
{

    private array $data;

    public function __construct(array $data = [], $exceptions = null)
    {
        parent::__construct($exceptions);
        $this->data = $data;
    }

    public function build(): Mailer
    {
        // TODO: Implement build() method.
        $this
            ->from(MAIL_USERNAME, MAIL_SENDER)
            ->subject('Finalisation de la creation du compte ')
            ->view('mailer.finalize-account', $this->data);
        return $this;
    }

    public function forward(): bool
    {
        // TODO: Implement forward() method.
        return $this->build()->push();
    }

}