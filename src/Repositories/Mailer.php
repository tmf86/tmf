<?php


namespace Repositories;


use interfaces\AjaxCallError;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mailer extends PHPMailer implements AjaxCallError
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

    /*** @return bool */
    public function mailerSend()
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
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->setFrom('cpypigier@gmail.com', 'CPY');
            $mail->addAddress($this->email, $this->name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Validation de compte';
            $mail->Body = $this->buildMailBody();
            return $mail->send();
        } catch (Exception $e) {
            debug($e->getMessage());
            $this->abortAjaxError(500);
            return false;
        }
    }

    /*** @return void */
    public function abortAjaxError($code)
    {
        http_response_code($code);
        die();
    }

    /*** @return string */
    protected function buildMailBody()
    {
        return '<!doctype html><html lang="fr" style="font-family: Helvetica, sans-serif;">
<head>
    <title>CPY-EMAIL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <style type="text/css">
        body, html {
            font-family: Helvetica, sans-serif;
        }

        a {
            outline: none;
            color: #fff;
            text-decoration: none;
			background : #43BBE7;
			text-align : center;
			padding : 1rem 6rem;
			text-transform : uppercase;
        }

        a:hover {
            text-decoration: none !important;
        }

        table td {
			text-align : center;
            border-collapse: collapse !important;
        }
        @media only screen and (max-width: 500px) {
            table[class="flexible"] {
                width: 100% !important;
            }

            td[class="img-flex"] img {
                width: 100% !important;
                height: auto !important;
            }


        }
    </style>
</head>
<body style="margin: 0;padding: 0;font-family: Helvetica, sans-serif;" bgcolor="#eaeced">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td bgcolor="#eaeced" style="text-align: center;border-collapse: collapse !important;">
            <table class="flexible" width="400" height="100" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0"  bgcolor="#f9f9f9">
                <tr>
                    <!--td class="img-flex" style="padding-top:5%">
						<img src="http://work-smy.byethost15.com/images/cpy.jpeg?i=1" style="vertical-align:top;" width="500" height="300" alt=""/>
					</td-->
                </tr>
                <tr >
                    <td data-bgcolor="bg-block" class="holder" style="padding: 58px 60px 52px;text-align: center;border-collapse: collapse !important;">
                        <table width="500" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="title" align="center" style="font-family: Helvetica, sans-serif;font-weight: 400;font-size: 1.5rem;color: #292c34;padding: 0 0 24px;text-transform: uppercase;text-align: center;border-collapse: collapse !important;">
                                    Validation de compte
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: 400;text-align: start;padding: 0 0 23px;font-size:1.5rem;border-collapse:collapse!important;font-family: Helvetica, sans-serif;">
                                    Chez etudiant <strong>' . $this->name . '</strong>  nous vous avons
                                    envoyé ce mail pour la validation de votre compte il ne reste plus que cette etape
                                    pour que votre compte soit activé ! Merci de bien vouloir appuyer sur le bouton
                                    ci-dessous !
                                   <br>
                                </td>
                            </tr>
                            <tr>
                                <table width="500"  bgcolor="#f9f9f9">
                                    <tr>
                                        <td  bgcolor="#f9f9f9">
                                            <td style="text-align: center;border-collapse: collapse !important;">
                                                <a href="#" style="outline: none;color: #fff;text-decoration: none;background: #43BBE7;text-align: center;padding: 1rem 6rem;text-transform: uppercase;font-family: Helvetica, sans-serif;font-size: 1.3rem">Valider</a>
                                            </td>
                                        </td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>';
    }

}