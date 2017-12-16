<?php
$this->load->view('templates/index');
//var_dump($member);die;
if (!isset($css))
    $css = "";

if (!isset($message))
    $message = "";

if (!isset($error))
    $error = "";

$mainmenu = $this->mainmenu->buildMenu($session_data['utype']);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$title = 'Dashboard';
gethead($css, $message, $error, $session_data, $mainmenu, $prof_inf, $title);
?> 

<!-- Inner Container Start -->
<div class="container"> 
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-pencil"></i> Agent Details </span>
        </div>
        <div class="mws-panel-body no-padding">
            <?php echo form_open_multipart('agent/save_agent_inf', 'id="form1" class="mws-form"'); ?>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label"> Agent Name    </label>
                    <div class="mws-form-item">
                        <?php
                        echo form_hidden('id', $userinf['id']);
                        echo $userinf['contactName'];
                        ?>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"> Picture    </label>
                    <div class="mws-form-item">
                        <input type="file" name="picture" size="20" />   
                        <?php if ($userinf['image']) { ?>
                            <img src="<?php echo base_url(); ?>files/prof/thumb/<?php echo $userinf['image']; ?>?<?php echo date("F j, Y, g:i a"); ?>" width="100px" />
                        <?php } ?>   
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"> City   </label>
                    <div class="mws-form-item">
                        <?php
                        echo $userinf['city'];
                        ?>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"> Phone   </label>
                    <div class="mws-form-item">
                        <?php
                        echo $userinf['phone'];
                        ?>
                    </div>
                </div>       
                <div class="mws-form-row">
                    <label class="mws-form-label"> Email   </label>
                    <div class="mws-form-item">
                        <?php
                        echo $userinf['email'];
                        ?>
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
                contactName: {
                    required: true
                },
                phone: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            //set messages to appear inline


            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }

        });
    });

</script> 