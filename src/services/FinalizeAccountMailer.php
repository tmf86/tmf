<?php


namespace Service;

use Contoller\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Service\Mailer\Mailer;

class FinalizeAccountMailer extends PHPMailer implements Mailer
{
    /*** @var string */
    private $name;
    /*** @var string */
    private $url;
    /*** @var string */
    private $email;
    /*** @var Request */
    private Request $request;

    public function __construct(string $name, string $email, string $url = null, $exceptions = null)
    {
        parent::__construct($exceptions);
        $this->name = $name;
        $this->url = $url;
        $this->email = $email;
        $this->request = new Request();
    }

    /*** @return string */
    public function emailBodyBulder(): string
    {
        // TODO: Implement emailBodyBulder() method.
        $email_body = FINALIZE_ACCOUNT_CREATION_EMAIL_CUSTUMER;
        $email_body = sprintf_custuming('%NAME%', $email_body, $this->name);
        $email_body = sprintf_custuming('%URL%', $email_body, $this->url);
        return $email_body;
    }

    /**
     * @param bool $ajax
     * @return bool|Request|mixed
     */
    public function configEmailService(bool $ajax = true)
    {
        // TODO: Implement configEmailService() method.
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = MAIL_HOST;                 // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = MAIL_USERNAME;                    // SMTP username
            $mail->Password = MAIL_PASSWORD;                         // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, utils 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->setFrom(MAIL_USERNAME, MAIL_SENDER);
            $mail->addAddress($this->email, $this->name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Finalisation de la creation du compte';
            $mail->Body = $this->emailBodyBulder();
            return $mail->send();
        } catch (Exception $e) {
            if ($ajax) {
                debug($e->getMessage());
                return $this->request->ajax([], 500);
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function push(): bool
    {
        // TODO: Implement push() method.
        return $this->configEmailService();
    }
}