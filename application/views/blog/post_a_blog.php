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
<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script> 
<!-- Inner Container Start -->
<div class="container"> 
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-user"></i> Blog Post Details </span>
        </div>
        <div class="mws-panel-body no-padding">     
            <?php echo form_open_multipart('blogpost/save_blog ', 'id="form1" class="mws-form"'); ?>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label"> Title  </label>
                    <div class="mws-form-item">
                        <?php
                        echo form_hidden('id', $blogposts['id']);
                        echo form_input('title', $blogposts['title'], 'class="medium"');
                        ?>                        
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"> Content   </label>
                    <div class="mws-form-item">
                        <textarea class="ckeditor" cols="80" id="editor1" name="details" rows="10">
                            <?php echo $blogposts['content']; ?>
                        </textarea>
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
                title: {
                    required: true
                }
                content: {
                    required: true
                }
            }
            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }
        });
    });
</script> 