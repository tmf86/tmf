<?php


namespace Repositories;

use Contoller\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mailer extends PHPMailer
{
    /*** @var string */
    private $name;
    /*** @var string */
    private $url;
    /*** @var string */
    private $email;

    public function __construct(string $name, string $email, string $url = null, $exceptions = null)
    {
        parent::__construct($exceptions);
        $this->name = $name;
        $this->url = $url;
        $this->email = $email;
    }

    /**
     * @param Request $request
     * @param bool $ajax
     * @return bool|Request
     */
    public function mail(Request $request, bool $ajax = true)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'cpypigier@gmail.com';                     // SMTP username
            $mail->Password = 'cpy@2020';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, utils 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->setFrom('cpypigier@gmail.com', 'CIPY');
            $mail->addAddress($this->email, $this->name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Finalisation de la creation du compte';
            $mail->Body = $this->buildMailBody();
            return $mail->send();
        } catch (Exception $e) {
            if ($ajax) {
                debug($e->getMessage());
                return $request->ajax([], 500);
            }
        }
        return $request;
    }

    /*** @return string */
    protected function buildMailBody()
    {
        $email = FINALIZE_ACCOUNT_CREATION_EMAIL_CUSTUMER;
        $email = sprintf_custuming('%NAME%', $this->name, $email);
        $email = sprintf_custuming('%URL%', $this->url, $email);
        return $email;

    }

}