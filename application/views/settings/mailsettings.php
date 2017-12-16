<?php
$this->load->view('templates/index');
//var_dump($member);die;
if (!isset($css))
    $css = "";

if (!isset($msg))
    $msg = "";
else
    $msg = $this->messages->getMessage($msg);
if (!isset($error))
    $error = "";

$mainmenu = $this->mainmenu->buildMenu($session_data['utype']);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$title = 'Dashboard';
gethead($css, $msg, $error, $session_data, $mainmenu, $prof_inf, $title);
?> 

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-envelope"></i> Mail details </span>
    </div>
    <div class="mws-panel-body no-padding">
        <?php echo form_open_multipart('settings/save_mail', 'id="form1" class="mws-form"'); ?>
        <div class="mws-form-inline">            
            <div class="mws-form-row">
                <label class="mws-form-label"> Sender Mail  </label>
                <div class="mws-form-item">
                    <?php
                    //    print_r($settings_result);
                    echo form_input('sender_mail', $sender['val'], 'class="medium"');
                    ?>                        
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label"> Reciever Mail  </label>
                <div class="mws-form-item">
                    <?php
                    //    print_r($settings_result);
                    echo form_input('reciever_mail', $reciever['val'], 'class="medium"');
                    ?>                        
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" value="Save">
                <input type="reset" class="btn " value="Reset">
            </div>
        </div>
    </div>
</div>
            <?php echo form_close(); ?>
        </div>
        <!-- Inner Container End -->
        <?php
        footer();
        ?>    

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/js/jquery.validate.js"></script>
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
                        sender_mail: {
                            required: true,
                            email: true
                        },
                        reciever_mail: {
                            required: true,
                        }
                    },
                    //set messages to appear inline


                    errorPlacement: function (error, element) {
                        error.appendTo(element.parent());
                    }

                });
            });

        </script>