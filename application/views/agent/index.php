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
            <span style="float: left"><i class="icon-user"></i> Agent Info 

            </span>
            <span class="btn-group"> 
                <a href="<?php echo base_url(); ?>index.php/agent/add_agent" class="btn btn-success" style="float: right"> Add Agent <i class="icon-plus-sign"></i></a>
            </span> 
        </div>
    </div>
    <div class="mws-panel-body">
        <div class="mws-panel grid_11" >
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Name  </th>
                        <th> City </th>
                        <th> Phone  </th>      
                        <th> Email   </th>  
                        <th> Date  </th>  
                        <th> Type  </th>  
                        <th> Action  </th>  
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td> <?php echo $user['id'] ?></td>
                            <td> <?php echo $user['contactName'] ?> </td>
                            <td> <?php echo $user['city'] ?></td>   
                            <td> <?php echo $user['phone'] ?></td>
                            <td> <?php echo $user['email'] ?></td>
                            <td> <?php echo $user['created_at'] ?></td>
                            <td> <?php echo $type[$user['type']] ?></td>
                            <td> <span class="btn-group">
                                    <?php if ($user['type'] != 1) { ?>
                                        <?php echo form_open('ratesheet/delete_countryzone', 'id="frm1' . $user['id'] . '"'); ?>
                                        <?php if ($user['status'] == 1) { ?>
                                            <a href="<?php echo base_url(); ?>index.php/agent/unpublish_agent/<?php echo $user['id']; ?>" class="btn btn-small"><i class="icon-unlock " style="color: green" ></i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url(); ?>index.php/agent/publish_agent/<?php echo $user['id']; ?>" class="btn btn-small"><i class="icon-lock" style="color: red"></i></a>
                                        <?php } ?>                             
                                        <a href="<?php echo base_url(); ?>index.php/agent/add_agent/<?php echo $user['id']; ?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                                        <?php
                                        echo form_hidden('id', $user['id']);
                                        //  echo '<a href="#" class="btn btn-small" onclick="confirm_delete(' . $user['id'] . ')" ><i class="icon-trash"></i></a>';
                                        echo form_close();
                                        ?>
                                    <?php } ?>
                                </span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>   
    </div>
</div>
<!-- Inner Container End -->

<?php
footer();
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/css/dataTables.tableTools.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/syntax/shCore.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/demo.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/js/dataTables.tableTools.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>tbaleExport/examples/examples/resources/demo.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true,
            dom: 'T<"clear">lfrtip',
            "order": [[0, "desc"]],
            "pageLength": 10
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