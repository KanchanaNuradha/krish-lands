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
 <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   #page_list li
   {
    padding:16px;
    background-color:#f9f9f9;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
   #page_list li.ui-state-highlight
   {
    padding:24px;
    background-color:#ffffcc;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
  </style>
<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script> 
<!-- Inner Container Start -->
<div class="container"> 
    <div class="mws-panel grid_7">
        <div class="mws-panel-header">
            <span><i class="icon-user"></i> Job Details -  <?php echo $jobs['job_title']; ?> </span>
        </div>
        <div class="mws-panel-body no-padding">     
            <?php // print_r($documents) ?>
            <ul class="list-unstyled" id="page_list">
                <?php
               foreach($documents as $doc) {
                    echo '<li id="' . $doc["id"] . '"> <a href="'. base_url() .'cv/'. $doc["document"] .'"> ' . $doc["document"] . '</a>  <br> '. $employee[$doc["user"]]  . '</li>';
                }
                ?>
            </ul>
            <input type="hidden" name="page_order_list" id="page_order_list" />
        </div>
    </div>
</div>
<!-- Inner Container End -->
<?php
footer();
?>    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#page_list li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"<?php echo base_url(); ?>index.php/jobs/update_inf",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
    // alert(data);
    }
   });
  }
 });

});
</script>