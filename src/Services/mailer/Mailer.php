<?php


namespace Service\Mailer;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

abstract class  Mailer extends PHPMailer
{
    protected $mail;

    /**
     * Mailer constructor.
     * @param null $exceptions
     */
    public function __construct($exceptions = null)
    {
        parent::__construct($exceptions);
        $this->mail = $this->config();
    }

    /**
     * @return PHPMailer
     * Fais la configuration  de PhpMailer
     */
    private function config()
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = MAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = MAIL_USERNAME;                     //SMTP username
            $mail->Password = MAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = MAIL_PORT;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //$mail->setFrom(MAIL_USERNAME, MAIL_SENDER);


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
//            $mail->Subject = 'Here is the subject';
//            $mail->Body = 'This is the HTML message body <b>in bold!</b>';

        } catch (Exception $e) {
            echo "We can't end configuration : {$mail->ErrorInfo}";
        }
        return $mail;
    }

    /**
     * @param string[]|string $users
     * @param string $name
     * @return $this
     * Enregistre le ou les adresse email des
     */
    public function to($users, string $name = '')
    {
        if (is_string($users)) {
            try {
                $this->mail->addAddress($users, $name);     //Add a recipient   //Add a recipient
                return $this;
            } catch (Exception $e) {
                echo "We can't end configuration : {$e->getMessage()}<br>";
            }
        }
        foreach ($users as $user => $username) {
            try {
                $this->mail->addAddress($user, $username);     //Add a recipient   //Add a recipient
            } catch (Exception $e) {
                echo "We can't end configuration : {$e->getMessage()}<br>";
            }
        }
        return $this;
    }

    protected function subject(string $subject)
    {
        $this->mail->Subject = $subject;
        return $this;
    }

    /**
     * @param string $name
     * @param array $data
     * @param bool $use_template
     * @param bool $die
     * @return $this
     */
    protected function view(string $name, array $data = [], bool $use_template = false, bool $die = false)
    {
        ob_start();
        view($name, $data, $use_template, $die);
        $view = ob_get_clean();
        $this->mail->Body = $view;
        return $this;

    }

    protected function from(string $username, string $name = '')
    {
        $this->mail->setFrom($username, $name);
        return $this;
    }

    protected function push()
    {
        $result = false;
        try {
            $result = $this->mail->send();
        } catch (Exception $exception) {
            echo 'The Message can\'t be send {' . $exception->getMessage() . '}';
        }
        return $result;
    }
}