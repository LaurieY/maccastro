<?php
require_once './vendor/autoload.php';

//$helperLoader = new SplClassLoader('Helpers', './vendor');
//$mailLoader   = new SplClassLoader('SimpleMail', './vendor');
require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';

//$helperLoader->register();
//$mailLoader->register();


require 'vendor/Helpers/Config.class.php';
use Helpers\Config;
//use SimpleMail\SimpleMail;

$config = new Config();
$config->load('./config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = stripslashes(trim($_POST['form-name']));
    $email = stripslashes(trim($_POST['form-email']));
   $phone = stripslashes(trim($_POST['form-phone']));
    $subject = stripslashes(trim($_POST['form-subject'])); 
    $message = stripslashes(trim($_POST['form-message']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

$subject_to = $config->get('subjects.'.$subject);
    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }

    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($name && $email && $emailIsValid && $subject && $message) {
        // $mail = new SimpleMail();
        $transport = Swift_SmtpTransport::newInstance('mail.maccastrosoc.com', 25);
        $transport->setUsername('webmaster@maccastrosoc.com');
        $transport->setPassword('laurie12');

        $swift = Swift_Mailer::newInstance($transport);
        $mail = new Swift_Message($subject);
        $mail->setTo($subject_to);
        //$mail->setFrom($config->get('emails.from'));
        $mail->setFrom($email);
        //$mail->setSender($name);
        $mail->setSender($config->get('emails.from'));
        $mail->setSubject($config->get('subject.prefix') . ' ' . $subject);

        $body = "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
        <html>
            <head>
                <meta charset=\"utf-8\">
            </head>
            <body>
                <h1>{$subject}</h1>
                <p><strong>{$config->get('fields.name')}:</strong> {$name}</p>
                <p><strong>{$config->get('fields.email')}:</strong> {$email}</p>
              <p><strong>{$config->get('fields.phone')}:</strong> {$phone}</p> 
                <p><strong>{$config->get('fields.message')}:</strong> {$message}</p>
            </body>
        </html>";

        //$mail->setHtml($body);
        //$mail->setBody('Here is the message itself');
        $mail->setBody($body, 'text/html');
        print_r($mail);
        $recipients = $swift->send($mail, $failures);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
      "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Contact Macclesfield Astronomical Society</title>
  <meta name="generator" content="Amaya, see http://www.w3.org/Amaya/">
  <meta name="keywords"
  content="Astronomy, Solar System, Sun, Moon, Planets, Nebulae, Galaxies, Deep Sky Objects, Cosmos, Telescope Observing, Lovell Telescope, Jodrell Bank">
  <meta name="description" content="Macclesfield Astronomical Society">
  <meta name="description" content="Contact and Join us">
  <meta name="Author" content="Alan Banks">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon-120x120-precomposed.png">
  <link rel="apple-touch-icon" href="apple-touch-icon-152x152-precomposed.png">
  <link href="css/macc-style.css" rel="stylesheet" type="text/css">
  <link href="css/dropdown/themes/default/default.ultimate.css" media="screen"
  rel="stylesheet" type="text/css">
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!--   <script type="text/javascript" src="js/jquery/jquery.dropdown.js">
 </script>-->
 <!-- <script type="text/javascript" src="js/jquery/jquery.ipad.js">
 </script> -->
<style>input:required, textarea:required {
  box-shadow: 4px 4px 10px rgba(177, 179, 186, 0.85);
} </style>
</head>

<body>

<div id="header">

<div class="top">
</div>

<div class="logo">
<?php

include ("logo.php");
?>
</div>
</div>

<div class="frame1">
<?php

include ("menu.php");
?>
</div>

<div class="frame">

<div id="main-content">

<div class="text3">
<p style="text-align:center;margin-left:auto;margin-right:auto;"><b><span
style="color:#ff0000">Visit Us! </span><span style="color:#800040">Why not come
along to one of our <a href="events.php">meetings</a>?</span> </b><strong></strong></p>

<p style="text-align:center;margin-left:auto;margin-right:auto;"><b><span
style="color:#ff0000">Join Us!
</span></b><span style="color:#800040"><strong>Ask about membership by emailing
the Society at the address below. </strong></span></p>

<p style="text-align:center;margin-left:auto;margin-right:auto;"><em>Please
provide your name, email address, (phone optional) and select enquiry area. The relevant member will get
back to you as soon as possible.</em></p>





   <?php

if (! empty($emailSent)) :
    ?>
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-success text-center"><?php

    echo $config->get('messages.success');
 /*  echo '<script type="text/javascript">
           window.location = window.location.href
      </script>';*/
    ?></div>
        </div>
        </div>




 <?php else :

    ?>
        <?php

    if (! empty($hasError)) :
        ?>
        <div class="col-md-5 col-md-offset-4">
            <div class="alert alert-danger text-center"><?php

        echo $config->get('messages.error');
        ?></div>
        </div>

    <?php endif;
    ?>

    <div class="col-md-6 col-md-offset-3">
        <form action="<?php

    echo $_SERVER['REQUEST_URI'];
    ?>" enctype="application/x-www-form-urlencoded" id="contact-form" class="form-horizontal" method="post">
            <div class="form-group">
 
            
                <label for="form-name" class="col-lg-2 control-label"><?php

    echo $config->get('fields.name');
    ?></label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="form-name" name="form-name" 
                    placeholder="<?php echo $config->get('fields.name');
    ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="form-email" class="col-lg-2 control-label">
                <?php echo $config->get('fields.email');
    ?></label>
                <div class="col-lg-10">
                
                    <input type="email" class="form-control" id="form-email" name="form-email" 
                    placeholder="<?php  echo $config->get('fields.email');?>" required>
                </div>
            </div>
            <div class="form-group">
              <label for="form-phone" class="col-lg-2 control-label"> 
              <?php

    echo $config->get('fields.phone');
    ?></label>
                <div class="col-lg-10">
                    <input type="tel" class="form-control" id="form-phone" name="form-phone" 
                    placeholder="<?php echo $config->get('fields.phone');?>">

            </div> </div>
                <div class="form-group">
        <label class="col-lg-2 control-label">Subject of Enquiry</label>
        <div class="col-xs-6">
            <div class="radio">
                <label><input type="radio" name="form-subject" value="general"  required /> General</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="form-subject" value="membership"  required /> Membership</label>
            </div>        
            <div class="radio">
                <label><input type="radio" name="form-subject" value="speakers"  required /> Speakers</label>
            </div>       
            <div class="radio">
                <label><input type="radio" name="form-subject" value="outreach"  required /> Outreach</label>
            </div>
             <div class="radio">
                <label><input type="radio" name="form-subject" value="website"  required /> Website</label>
            </div>
        </div>
    </div>
            <div class="form-group">
                <label for="form-subject" class="col-lg-2 control-label">
                <!--?php      echo $config->get('fields.subject');
    ?></label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="form-subject" name="form-subject" placeholder=" -->
                <!--    <?php   echo $config->get('fields.subject');
    ?>" required>
                </div> -->
            </div>
            <div class="form-group">
                <label for="form-message" class="col-lg-2 control-label">
                <?php  echo $config->get('fields.message');    ?></label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="5" id="form-message" name="form-message" 
                    placeholder="<?php echo $config->get('fields.message');    ?>"  required>
                    </textarea>
                </div>
  
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default"><?php

    echo $config->get('fields.btn-send');
    ?></button>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>











<?php endif;
?>
       <script type="text/javascript" src="public/js/contact-form.js"></script>
    <script type="text/javascript">
        new ContactForm('#contact-form');
    </script>
<div id="bottom">
<p style="text-align:center;margin-left:auto;margin-right:auto;"><span
style="color:#ffffff">� Macclesfield Astronomical Society
<?php

echo date("Y")?></span></p>
</div>
</body>
</html>
