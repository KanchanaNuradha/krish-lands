<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <!-- Viewport Metatag -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <!-- Plugin Stylesheets first to ease overrides -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/plugins/colorpicker/colorpicker.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/custom-plugins/picklist/picklist.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/plugins/select2/select2.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/plugins/ibutton/jquery.ibutton.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/plugins/cleditor/jquery.cleditor.css" media="screen">

        <!-- Required Stylesheets -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/bootstrap/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/fonts/ptsans/stylesheet.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/fonts/icomoon/style.css" media="screen">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/mws-style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/icons/icol16.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/icons/icol32.css" media="screen">

        <!-- Demo Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/demo.css" media="screen">

        <!-- jQuery-UI Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/jui/css/jquery.ui.all.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/jui/jquery-ui.custom.css" media="screen">

        <!-- Theme Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/mws-theme.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/admin/css/themer.css" media="screen">

        <title> Mhel Web Portal</title>

    </head>

    <body>



        <!-- Header -->
        <div id="mws-header" class="clearfix">

            <!-- Logo Container -->
            <div id="mws-logo-container">

                <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
                <div id="mws-logo-wrap">
                    <img src="<?php echo base_url(); ?>/admin/images/mws-logo.png" alt="mws admin">
                </div>
            </div>

            <!-- User Tools (notifications, logout, profile, change password) -->
            <div id="mws-user-tools" class="clearfix">

                <!-- Notifications -->
                <div id="mws-user-notif" class="mws-dropdown-menu">
                    <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>

                    <!-- Unread notification count -->
                    <span class="mws-dropdown-notif">35</span>

                    <!-- Notifications dropdown -->
                    <div class="mws-dropdown-box">
                        <div class="mws-dropdown-content">
                            <ul class="mws-notifications">
                                <li class="read">
                                    <a href="#">
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class="read">
                                    <a href="#">
                                        <span class="message">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class="unread">
                                    <a href="#">
                                        <span class="message">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class="unread">
                                    <a href="#">
                                        <span class="message">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mws-dropdown-viewall">
                                <a href="#">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                <div id="mws-user-message" class="mws-dropdown-menu">
                    <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>

                    <!-- Unred messages count -->
                    <span class="mws-dropdown-notif">35</span>

                    <!-- Messages dropdown -->
                    <div class="mws-dropdown-box">
                        <div class="mws-dropdown-content">
                            <ul class="mws-messages">
                                <li class="read">
                                    <a href="#">
                                        <span class="sender">John Doe</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class="read">
                                    <a href="#">
                                        <span class="sender">John Doe</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class="unread">
                                    <a href="#">
                                        <span class="sender">John Doe</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class="unread">
                                    <a href="#">
                                        <span class="sender">John Doe</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class="time">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mws-dropdown-viewall">
                                <a href="#">View All Messages</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Information and functions section -->
                <div id="mws-user-info" class="mws-inset">

                    <!-- User Photo -->
                    <div id="mws-user-photo">
                        <img src="<?php echo base_url(); ?>/admin/example/profile.jpg" alt="User Photo">
                    </div>

                    <!-- Username and Functions -->
                    <?php if (isset($session['id'])) { ?>
                        <div id="mws-user-functions">
                            <div id="mws-username">
                                Hello, <?php 
                                if (isset($session['id'])) {
                                    echo $session['username'];
                                }
                                ?>
                            </div>
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Change Password</a></li>
                                <li> <?php echo anchor('user/logout', 'logout'); ?></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Start Main Wrapper -->
        <div id="mws-wrapper">

            <!-- Necessary markup, do not remove -->
            <div id="mws-sidebar-stitch"></div>
            <div id="mws-sidebar-bg"></div>

            <!-- Sidebar Wrapper -->
            <div id="mws-sidebar">

                <!-- Hidden Nav Collapse Button -->
                <div id="mws-nav-collapse">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>



                <!-- Main Navigation -->
             <?php  include 'menu.php'; ?>
            </div>

            <!-- Main Container Start -->
            <div id="mws-container" class="clearfix">

                <!-- Inner Container Start -->
                <div class="container">

                    <!-- Statistics Button Container -->
                   
                    <!-- Panels Start -->
                    <div class="mws-panel grid_8">
                        <div class="mws-panel-header">
                            <span><i class="icon-tools"></i> Configuration </span>
                        </div>
                        <div class="mws-panel-body no-padding">
                            <?php echo form_open('admin/configSave', 'id="form1" class="mws-form"'); ?>
                            <div class="mws-form-inline">

                                <div class="mws-form-row">
                                    <label class="mws-form-label"> Fuel Surcharge</label>
                                    <div class="mws-form-item">
                                        <?php echo form_hidden('id', $userList['id']);
                                        echo form_input('fuel_surcharge', $userList['fuel_surcharge'], 'class="large"');
                                        ?>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label"> Exchange Rate </label>
                                    <div class="mws-form-item">
<?php echo form_input('exchangeRage', $userList['exchangeRage'], 'class="large"'); ?>

                                    </div>
                                </div>
                                <div class="mws-button-row">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                    <input type="reset" class="btn " value="Reset">
                                </div>



                            </div>
<?php echo form_close(); ?>
                        </div>
                    </div>

                    <div class="mws-panel grid_8">
                        <div class="mws-panel-header">
                            <span><i class="icon-tools"></i> Upload New Rate Sheet  (csv fiels only) </span>
                        </div>
                        <div class="mws-panel-body no-padding">
<?php echo form_open_multipart('admin/saveRateSheet', 'id="form2" class="mws-form"'); ?>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label"> Customer</label>
                                    <div class="mws-form-item">
                                       <?php echo form_dropdown('company', $users, '', 'class="large" '); ?>
                                       
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label"> Upload Rate Sheet</label>
                                    <div class="mws-form-item">
<?php //echo form_hidden('id', $userList['id']);
// echo form_input('fuel_surcharge', $userList['fuel_surcharge'], 'class="large"'); 
?>
                                        <input type="file" name="rateSheet"   >
                                    </div>
                                </div>


                                <div class="mws-button-row">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                    <input type="reset" class="btn " value="Reset">
                                </div>



                            </div>
<?php echo form_close(); ?>
                        </div>
                    </div>


                    <!-- Panels End -->
                </div>
                <!-- Inner Container End -->

                <!-- Footer -->
                <div id="mws-footer">
                    Copyright  MHEL 2014. All Rights Reserved.
                </div>

            </div>
            <!-- Main Container End -->

        </div>

        <!-- JavaScript Plugins -->
        <script src="<?php echo base_url(); ?>/admin/js/libs/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/js/libs/jquery.mousewheel.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/js/libs/jquery.placeholder.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/custom-plugins/fileinput.js"></script>

        <!-- jQuery-UI Dependent Scripts -->
        <script src="<?php echo base_url(); ?>/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/jui/jquery-ui.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/jui/js/jquery.ui.touch-punch.js"></script>

        <script src="<?php echo base_url(); ?>/admin/jui/js/globalize/globalize.js"></script>
        <script src="<?php echo base_url(); ?>/admin/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

        <!-- Plugin Scripts -->
        <script src="<?php echo base_url(); ?>/admin/custom-plugins/picklist/picklist.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/autosize/jquery.autosize.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/select2/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/colorpicker/colorpicker-min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/validate/jquery.validate-min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/ibutton/jquery.ibutton.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/cleditor/jquery.cleditor.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/cleditor/jquery.cleditor.table.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

        <!-- Core Script -->
        <script src="<?php echo base_url(); ?>/admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/admin/js/core/mws.js"></script>

        <!-- Themer Script (Remove if not needed) -->
        <script src="<?php echo base_url(); ?>/admin/js/core/themer.js"></script>

        <!-- Demo Scripts (remove if not needed) -->
        <script src="<?php echo base_url(); ?>/admin/js/demo/demo.formelements.js"></script>

    </body>
</html>



<!--<script type="text/javascript" >
    $(document).ready(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Please enter only letters without space.");

        // validate contact form on keyup and submit
        $("#form1").validate({

            errorElement: "p",


            //set the rules for the fields
            rules: {
                fuel_surcharge: {
                    required: true
                } ,
                exchangeRage : {
                    required: true
                }

            },
            //set messages to appear inline
            messages: {
                fuel_surcharge:  "Please enter Fuel Surcharge" ,
                exchangeRage : "Exchange Rate"




            },

            errorPlacement: function(error, element) {
                error.appendTo(element.parent());
            }

        });
    });

</script>

</head>-->



