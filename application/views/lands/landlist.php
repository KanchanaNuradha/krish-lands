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
<!-- Inner Container Start -->
<div class="container">
    <div class="mws-panel grid_10" style="margin: 0">
        <div class="mws-panel-header">
            <span style="float: left"><i class="icon-list"></i> Land List 
            </span>
            <span class="btn-group"> 
                <a href="<?php echo base_url(); ?>index.php/lands/post_a_land" class="btn btn-success" style="float: right">Post a Land<i class="icon-plus-sign"></i></a>
            </span> 
        </div>
    </div>
    <div class="mws-panel-body">
        <div class="mws-panel grid_11" >
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th> Land ID </th>
                        <th> Category  </th>
                        <th> Location </th>
                        <th> Prize</th>
                        <th> Address </th>
                        <th> Size </th>
                        <th> Image </th>
                        <th> Details </th>        
                        <th> Date  </th>    
                        <th> Action  </th>  
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($lands as $landlist) {
                        $number = $this->Landsm->count_lands($landlist['id']);
                        ?>
                        <tr>
                            <td> <?php echo $landlist['id'] ?></td> 
                            <td> <?php echo $category[$landlist['category_name']] ?></td>
                            <td> <?php echo $location[$landlist['location']] ?></td>
                            <td> <?php echo $landlist['prize'] ?></td>
                            <td> <?php echo $landlist['address'] ?></td>
                            <td> <?php echo $landlist['size'] ?></td>
                            <td><?php if ($landlist['image']) { ?>
                                <button  class="image"  data-image="<?php echo $landlist['image'] ?>"> <i class="icon-file"></i> </button>
                                <?php } ?> 
                            </td>
                            <td><p><button  class="map"  data-job="<?php echo $landlist['details'] ?>"> <i class="icon-pencil"></i> </button></p></td>
                            <td> <?php echo $landlist['created_at'] ?></td>
                            <td> <span class="btn-group">
                                    <?php echo form_open('jobs/delete_job', 'id="frm1' . $landlist['id'] . '"'); ?>
                                    <?php if ($landlist['stat'] == 1) { ?>
                                        <a href="<?php echo base_url(); ?>index.php/lands/unpublish_land/<?php echo $landlist['id']; ?>" class="btn btn-small "><i class="icon-unlock " style="color: green" ></i></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(); ?>index.php/lands/publish_land/<?php echo $landlist['id']; ?>" class="btn btn-small"><i class="icon-lock" style="color: red"></i></a>
                                    <?php } ?>                               
                                    <a href="<?php echo base_url(); ?>index.php/lands/post_a_land/<?php echo $landlist['id']; ?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                                    <?php
                                    echo form_hidden('id', $landlist['id']);
                                    if ($number < 1) {
                                        echo '<a href="#" class="btn btn-small" onclick="confirm_delete(' . $landlist['id'] . ')" ><i class="icon-trash"></i></a>';
                                    }
                                    echo form_close();
                                    ?>
                                </span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>   
    </div>
</div>

<div class="modal fade"  id="myModal" role="dialog">
    <div class="modal-dialog" style=" width: 100%; overflow: auto">>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> View </h4>
            </div>
            <div class="modal-body" id="m-body"   >
          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Inner Container End -->

<?php
footer();
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/css/modalWindow.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/syntax/shCore.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/demo.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/js/dataTables.tableTools.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/demo.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true,    
            dom: 'T<"clear">lfrtip',
            "order": [[0, "desc"]],
            "pageLength": 10
        });
        $(".map").click(function ()
        {
            $('#m-body').html("");
            $('#m-body').append($(this).attr("data-job"));          
            $('#myModal').modal('show');
        });
        $(".image").click(function ()
        {
            $('#m-body').html("");          
            $('#myModal').modal('show');
            $('#m-body').html('<img src="<?php echo base_url(); ?>files/'+ $(this).attr("data-image") +'" width = "100%">');
        });
    });
    function confirm_delete(num)
    {
        var x;
        var r = confirm("Are you Sure Delete?");
        if (r == true)
        {
            document.getElementById("frm1" + num + "").submit();
        } else {
        }
    }
</script>