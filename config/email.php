<?php
/**
 * Configuration du service d'envoie de mail
 */
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_USERNAME', 'cpypigier@gmail.com');
define('MAIL_PASSWORD', 'cpy@2020');
define('MAIL_SENDER', 'CIPY');
/**
 * Template des mails a envoyé
 */
define('FINALIZE_ACCOUNT_CREATION_EMAIL_CUSTUMER', <<<EMAIL
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
    <!--[if gte mso 9]>
    <xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="x-apple-disable-message-reformatting">
      <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
      <title></title>
      
        <style type="text/css">
          a{ color: #0000ee; text-decoration: underline; }
           @media only screen and (min-width: 620px) {
                  .u-row {
                    width: 600px !important;
                  }
                  .u-row .u-col {
                    vertical-align: top;
                  }
                  .u-row .u-col-100 {
                    width: 600px !important;
                  }
    
            }
    
            @media (max-width: 620px) {
                  .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                  }
                  .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                  }
                  .u-row {
                    width: calc(100% - 40px) !important;
                  }
                  .u-col {
                    width: 100% !important;
                  }
                  .u-col > div {
                    margin: 0 auto;
                  }
            }
            body {
              margin: 0;
              padding: 0;
            }
            
            table,
            tr,
            td {
              vertical-align: top;
              border-collapse: collapse;
            }
            
            p {
              margin: 0;
            }
            
            .ie-container table,
            .mso-container table {
              table-layout: fixed;
            }
            
            * {
              line-height: inherit;
            }
            
            a[x-apple-data-detectors='true'] {
              color: inherit !important;
              text-decoration: none !important;
            }
    
    </style>
    <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
    </head>
    <body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff">
      <!--[if IE]><div class="ie-container"><![endif]-->
      <!--[if mso]><div class="mso-container"><![endif]-->
      <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
      <tbody>
      <tr style="vertical-align: top">
        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->
    <div class="u-row-container" style="padding: 0px;background-color: transparent">
      <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #dcdcdc;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-image: url('https://www.cipy.tk/images/cpy.png');background-repeat: no-repeat;background-position: center top;background-color: transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-image: url('images/image-2.png');background-repeat: no-repeat;background-position: center top;background-color: #dcdcdc;"><![endif]-->
    <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
    <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
      <div style="width: 100% !important;">
      <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]--> 
    <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
      <tbody>
        <tr>
          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 225px;font-family:'Cabin',sans-serif;" align="left">
      <div style="color: #000000; line-height: 140%; text-align: center; word-wrap: break-word;">
        <p style="line-height: 140%; font-size: 14px;">&nbsp;</p>
    <p style="line-height: 140%; font-size: 14px;">&nbsp;</p>
      </div>
          </td>
        </tr>
      </tbody>
    </table>
      <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td><![endif]-->
          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div class="u-row-container" style="padding: 0px;background-color: transparent">
      <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #fcf9f8;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #fcf9f8;"><![endif]-->
    <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
    <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
      <div style="width: 100% !important;">
      <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
    <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
      <tbody>
        <tr>
          <td style="overflow-wrap:break-word;word-break:break-word;padding:44px 10px 14px;font-family:'Cabin',sans-serif;" align="left">
      <div style="color: #000000; line-height: 140%; text-align: center; word-wrap: break-word;">
        <p style="font-size: 14px; line-height: 140%;"><span style="font-family: Cabin, sans-serif; font-size: 14px; line-height: 19.6px;"><span style="font-size: 26px; line-height: 36.4px;"><strong><span style="line-height: 36.4px; font-size: 26px;">FINALISATION DE LA CREATION DE COMPTE</span></strong></span></span></p>
      </div>
          </td>
        </tr>
      </tbody>
    </table>
    <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
      <tbody>
        <tr>
          <td style="overflow-wrap:break-word;word-break:break-word;padding:0.5rem;font-family:'Cabin',sans-serif;" align="left"> 
      <div style="color: #000000; line-height: 170%; text-align: justify; word-wrap: break-word;">
        <p style="font-size: 14px; line-height: 170%;"><span style="font-family: Cabin, sans-serif; font-size: 18px; line-height: 30.6px;">Chez etudiant <strong>%NAME%</strong>  nous vous avons
          envoyé ce mail pour finaliser la creation de  votre compte , il ne vous reste plus que cette etape pour
          activer votre compte . Merci de bien vouloir appuyer sur le bouton ci-dessous.</span></p>
      </div>
          </td>
        </tr>
      </tbody>
    </table>
    <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
      <tbody>
        <tr>
          <td style="overflow-wrap:break-word;word-break:break-word;padding:4px 55px 10px;font-family:'Cabin',sans-serif;" align="left"></td>
        </tr>
      </tbody>
    </table>
    
    <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
      <tbody>
        <tr>
          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 55px;font-family:'Cabin',sans-serif;" align="left"> 
    <div align="center">
      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:'Cabin',sans-serif;"><tr><td style="font-family:'Cabin',sans-serif;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:45px; v-text-anchor:middle; width:212px;" arcsize="9%" stroke="f" fillcolor="#34495e"><w:anchorlock/><center style="color:#e3e0f0;font-family:'Cabin',sans-serif;"><![endif]-->
        <a href="%URL%" target="_blank" style="box-sizing: border-box;display: inline-block;font-family:'Cabin',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #e3e0f0; background-color: #34495e; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
          <span style="display:block;padding:13px 55px;line-height:120%;"><span style="font-family: Cabin, sans-serif; font-size: 16px; line-height: 19.2px;"><span style="line-height: 19.2px; font-size: 16px;">TERMINER</span></span></span>
        </a>
      <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
    </div>
          </td>
        </tr>
      </tbody>
    </table>
      <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td><![endif]-->
          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div class="u-row-container" style="padding: 0px;background-color: transparent">
      <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #184e5a;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #184e5a;"><![endif]-->
    <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
    <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
      <div style="width: 100% !important;">
      <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
    <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
      <tbody>
        <tr>
          <td style="overflow-wrap:break-word;word-break:break-word;padding:0.5rem;font-family:'Cabin',sans-serif;" align="left">     
      <div style="color: #ffffff; line-height: 230%; text-align: center; word-wrap: break-word;">
        <p style="font-size: 14px; line-height: 230%;"><strong><span style="font-family: Cabin, sans-serif; font-size: 18px; line-height: 41.4px;">★ ★ ★ ★ ★</span></strong></p>
    <p style="font-size: 14px; line-height: 230%;"><em><span style="font-family: Cabin, sans-serif; font-size: 18px; line-height: 41.4px;font-style: italic;">« Les gens assez fous pour penser qu'ils peuvent changer le monde sont ceux qui y parviennent. »</span></em></p>
    <p style="font-size: 14px; line-height: 230%;"><em><span style="font-family: Cabin, sans-serif; font-size: 18px; line-height: 41.4px;font-style: italic;">-Steve Jobs</span></em></p>
      </div>
          </td>
        </tr>
      </tbody>
    </table>
      <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td><![endif]-->
          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div class="u-row-container" style="padding: 0px 0px 17px;background-color: transparent">
      <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 0px 17px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
          
    <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
    <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
      <div style="width: 100% !important;">
      <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
      
    <table style="font-family:'Cabin',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
      <tbody>
        <tr>
          <td style="overflow-wrap:break-word;word-break:break-word;padding:23px 10px 10px;font-family:'Cabin',sans-serif;" align="left">
    </div>
          </td>
        </tr>
      </tbody>
    </table>
      <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
      </div>
    </div>
    <!--[if (mso)|(IE)]></td><![endif]-->
          <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
      </tr>
      </tbody>
      </table>
      <!--[if mso]></div><![endif]-->
      <!--[if IE]></div><![endif]-->
    </body>
    </html>    
EMAIL
);