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

        <!-- JavaScript Plugins -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>

        <!-- jQuery-UI Dependent Scripts -->
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/jui/js/jquery-ui-effects.min.js"></script>

        <?php echo link_tag('css/style.css'); ?>
        <script type="text/javascript" >
            $(document).ready(function () {

                jQuery.validator.addMethod("lettersonly", function (value, element) {
                    return this.optional(element) || /^[a-z]+$/i.test(value);
                }, "Please enter only letters without space.");

                // validate contact form on keyup and submit
                $("#form1").validate({
                    errorElement: "p",
                    //set the rules for the fields
                    rules: {
                        username: {
                            required: true,
                            email: true
                        }
                    },

                    errorPlacement: function (error, element) {
                        error.appendTo(element.parent());
                    }

                });
            });

        </script>
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

                    <?php echo form_open('user/sendresetpw', 'id=form1 class="form-horizontal"'); ?> 

                    <div class="mws-form-row">
                        <div class="mws-form-item large">
                            <?php echo form_input('username', '', 'class="  mws-textinput required " placeholder="Email" '); ?>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <?php echo form_submit('mysubmit', 'Send Reset password link', 'class=fx-button   '); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </body>
</html>















