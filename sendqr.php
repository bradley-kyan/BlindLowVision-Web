<?php
require 'vendor/autoload.php';

ini_set('display_errors', 1);
if(!isset($_COOKIE['cookieUserLogin'])) {
  //cookie does not exist;
    echo 404;
    exit;
}

$cookieGet = $_COOKIE['cookieUserLogin'];
$cookieData = json_decode($cookieGet, true);

//UserId from login cookie
$email1 = $cookieData['Email'];
$name1 = $cookieData['first_name'];
$UserID1 = $cookieData['UserID'];
$src1 = 'https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=';
$src1 .= $UserID1;

$to = "$email1";
$subject = 'Blind Low Vision - Your Code!';

$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'><html data-editor-version='2' class='sg-campaigns' xmlns='http://www.w3.org/1999/xhtml'><head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1'>
      <meta http-equiv='X-UA-Compatible' content='IE=Edge'>
<style type='text/css'>
    body, p, div {
      font-family: Helvetica, Arial, sans-serif;
      font-size: 16px;
    }
    body {
      color: #FFFFFF;
    }
    body a {
      color: #F36E36;
      text-decoration: none;
    }
    p { margin: 0; padding: 0; }
    table.wrapper {
      width:100% !important;
      table-layout: fixed;
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: 100%;
      -moz-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    img.max-width {
      max-width: 100% !important;
    }
    .column.of-2 {
      width: 50%;
    }
    .column.of-3 {
      width: 33.333%;
    }
    .column.of-4 {
      width: 25%;
    }
    @media screen and (max-width:480px) {
      .preheader .rightColumnContent,
      .footer .rightColumnContent {
        text-align: left !important;
      }
      .preheader .rightColumnContent div,
      .preheader .rightColumnContent span,
      .footer .rightColumnContent div,
      .footer .rightColumnContent span {
        text-align: left !important;
      }
      .preheader .rightColumnContent,
      .preheader .leftColumnContent {
        font-size: 80% !important;
        padding: 5px 0;
      }
      table.wrapper-mobile {
        width: 100% !important;
        table-layout: fixed;
      }
      img.max-width {
        height: auto !important;
        max-width: 100% !important;
      }
      a.bulletproof-button {
        display: block !important;
        width: auto !important;
        font-size: 80%;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .columns {
        width: 100% !important;
      }
      .column {
        display: block !important;
        width: 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
      }
    }
  </style>
      <!--user entered Head Start-->

     <!--End Head user entered-->
    </head>
    <body>
      <center class='wrapper' data-link-color='#ffffff' data-body-style='font-size:16px; font-family:Helvetica, Arial, sans-serif; color:#FFFFFF; background-color:#ffffff;'>
        <div class='webkit'>
          <table cellpadding='0' cellspacing='0' border='0' width='100%' class='wrapper' bgcolor='#ffffff'>
            <tbody><tr>
              <td valign='top' bgcolor='#ffffff' width='100%'>
                <table width='100%' role='content-container' class='outer' align='center' cellpadding='0' cellspacing='0' border='0'>
                  <tbody><tr>
                    <td width='100%'>
                      <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                        <tbody><tr>
                          <td>
                            <!--[if mso]>
    <center>
    <table><tr><td width='600'>
  <![endif]-->
    <table width='100%' cellpadding='0' cellspacing='0' border='0' style='width:100%; max-width:600px;' align='center'>
    <tbody><tr>
    <td role='modules-container' style='padding:0px 0px 0px 0px; color:#FFFFFF; text-align:left;' bgcolor='#ffffff' width='100%' align='left'><table class='module preheader preheader-hide' role='module' data-type='preheader' border='0' cellpadding='0' cellspacing='0' width='100%' style='display: none !important; mso-hide: all; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;'>
    <tbody><tr>
      <td role='module-content'>
        <p>QR Code:<p>
      </td>
    </tr>
  </tbody></table><table class='wrapper' role='module' data-type='image' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed;' data-muid='98ndJyAY9BSGjoVqrr6FYx'>
      <tbody><tr>
        <td style='font-size:6px; line-height:10px; padding:30px 0px 30px 0px;' valign='top' align='left'>
          <img class='max-width' border='0' style='display:block; color:#000000; text-decoration:none; font-family:Helvetica, Arial, sans-serif; font-size:16px; max-width:40% !important; width:40%; height:auto !important;' src='http://cdn.mcauto-images-production.sendgrid.net/de068702f23cf12e/cdb1937f-2605-48b6-be59-069cf02e78b1/2298x433.jpg' alt='Blind and Low vision New Zealand' width='240' data-responsive='true' data-proportionally-constrained='false'>
        </td>
      </tr>
    </tbody></table><table class='wrapper' role='module' data-type='image' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed;' data-muid='3Ypdby9Xfsf2rN27zTDEfN'>
      <tbody><tr>
        <td style='font-size:6px; line-height:10px; padding:0px 0px 0px 0px;' valign='top' align='center'>
          <img class='max-width' border='0' style='display:block; color:#000000; text-decoration:none; font-family:Helvetica, Arial, sans-serif; font-size:16px; max-width:100% !important; width:100%; height:auto !important;' src='http://cdn.mcauto-images-production.sendgrid.net/de068702f23cf12e/307d399c-45f5-48f2-a73f-c4272488deb0/4256x2832.JPG' alt='' width='600' data-responsive='true' data-proportionally-constrained='false'>
        </td>
      </tr>
    </tbody></table><table class='module' role='module' data-type='text' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed;' data-muid='7pyDCmyDaGcm5WsBBSaEgv'>
      <tbody><tr>
        <td style='background-color:#F36E36; padding:50px 0px 30px 0px; text-align:inherit;' height='100%' valign='top' bgcolor='#F36E36'><div style='font-family: inherit; text-align: center; font-size: 35px'>Use this QR code when attending events to claim your prizes!</div></td>
      </tr>
    </tbody></table><table class='module' role='module' data-type='text' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed;' data-muid='nSVYnVzPLnGZ4wUdynLiKo'>
      <tbody><tr>
        <td style='background-color:#F36E36; padding:30px 50px 30px 40px; line-height:22px; text-align:inherit;' height='100%' valign='top' bgcolor='#F36E36'>
        
        <img class='max-width' id='qrFrame' border='0' style='display:block; color:#000000; text-decoration:none; font-family:Helvetica, Arial, sans-serif; font-size:16px; max-width:100% !important; width:100%; height:auto !important;' src='$src1' alt='' width='600' data-responsive='true' data-proportionally-constrained='false'>
        </td>
      </tr>
    </tbody></table><br><br>
     </table>
    </tbody></table><table class='module' role='module' data-type='spacer' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed;' data-muid='sfek66tVLi5d2iy5jmSawj'>
      <tbody><tr>
        <td style='padding:0px 0px 30px 0px;' role='module-content' bgcolor=''>
        </td>
      </tr>
    </tbody></table><table class='module' role='module' data-type='social' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed;' data-muid='kTqJe3Ke2movtrLxSjKW3C'>
      <tbody>
        <tr>
          <td valign='top' style='padding:0px 0px 0px 0px; font-size:6px; line-height:10px;' align='center'>
            <table align='center'>
              <tbody>
                <tr><td style='padding: 0px 5px;'>
      <a role='social-icon-link' href='https://www.facebook.com/sendgrid/' target='_blank' alt='Facebook' title='Facebook' style='display:inline-block; background-color:#F36E36; height:30px; width:30px; border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px;'>
        <img role='social-icon' alt='Facebook' title='Facebook' src='https://marketing-image-production.s3.amazonaws.com/social/white/facebook.png' style='height:30px; width:30px;' height='30' width='30'>
      </a>
    </td><td style='padding: 0px 5px;'>
      <a role='social-icon-link' href='https://twitter.com/sendgrid?ref_src=twsrc%5egoogle%7ctwcamp%5eserp%7ctwgr%5eauthor' target='_blank' alt='Twitter' title='Twitter' style='display:inline-block; background-color:#F36E36; height:30px; width:30px; border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px;'>
        <img role='social-icon' alt='Twitter' title='Twitter' src='https://marketing-image-production.s3.amazonaws.com/social/white/twitter.png' style='height:30px; width:30px;' height='30' width='30'>
      </a>
    </td><td style='padding: 0px 5px;'>
      <a role='social-icon-link' href='https://www.instagram.com/sendgrid/?hl=en' target='_blank' alt='Instagram' title='Instagram' style='display:inline-block; background-color:#F36E36; height:30px; width:30px; border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px;'>
        <img role='social-icon' alt='Instagram' title='Instagram' src='https://marketing-image-production.s3.amazonaws.com/social/white/instagram.png' style='height:30px; width:30px;' height='30' width='30'>
      </a>
    </td><td style='padding: 0px 5px;'>
      <a role='social-icon-link' href='https://www.pinterest.com/sendgrid/' target='_blank' alt='Pinterest' title='Pinterest' style='display:inline-block; background-color:#F36E36; height:30px; width:30px; border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px;'>
        <img role='social-icon' alt='Pinterest' title='Pinterest' src='https://marketing-image-production.s3.amazonaws.com/social/white/pinterest.png' style='height:30px; width:30px;' height='30' width='30'>
      </a>
    </td></tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table><div data-role='module-unsubscribe' class='module unsubscribe-css__unsubscribe___2CDlR' role='module' data-type='unsubscribe' style='color:#FFFFFF; font-size:12px; line-height:20px; padding:16px 16px 16px 16px; text-align:center;' data-muid='txBUUpmixSjuZ5Ad69p1sX'>
    </div></td>
        </tr>
        </tbody></table>
        </td>
        </tr>
        </tbody></table>
        </div>
      </center>
    
  
</body></html>
";

// Always set content-type when sending HTML email
$headers = 'MIME-Version: 1.0' . '\r\n';
$headers .= 'Content-type:text/html;charset=UTF-8' . '\r\n';

// More headers
$headers .= 'From: <noreply@blindlowvision.com>' . '\r\n';

mail($to,$subject,$message,$headers);
