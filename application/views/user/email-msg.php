<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Apple iOS and Android stuff (do not remove) -->
        <meta name="apple-mobile-web-app-capable" content="no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />

        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

        <!-- Required Stylesheets -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/fonts/ptsans/stylesheet.css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/form.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/login.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/login.min.css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/themer.css" media="screen" />

    
 
    </head>
    <body style="background: #666">
        <div id="mws-login-wrapper">
            <div id="mws-login" style="background: #121e32"> 
                <h1> Reset Password </h1>
                <div id="mws-login-form"> 
                    <?php
                    if (isset($msg)) {
                        $message = $this->messages->getMessage($msg);
                        echo $message;
                    }
                    ?>         
                    <div class="mws-form-row">
                        <div class="mws-form-item large">
                            <p style="color: #fff">  We are email to you password reset link please check you email inbox. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>



















