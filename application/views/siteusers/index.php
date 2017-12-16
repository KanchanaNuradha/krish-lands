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
            <span style="float: left"><i class="icon-users"></i> Web-Site Users List  

            </span>         
        </div>
    </div>
    <div class="mws-panel-body">
        <div class="mws-panel grid_11" >
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Fist Name  </th>      
                        <th> Last Name  </th>
                        <th> Email  </th>
                        <th> Company  </th>
                        <th> Contact N0;  </th> 
                        <th> Register Date  </th>                                     
                        <th> Status/Action </th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php foreach ($siteuser as $suser) { ?>
                        <tr>
                            <td> <?php echo $suser['id'] ?></td>
                            <td> <?php echo $suser['first_name'] ?> </td>
                            <td> <?php echo $suser['last_name'] ?> </td>
                            <td> <?php echo $suser['email'] ?> </td>
                            <td> <?php echo $suser['company'] ?> </td>
                            <td> <?php echo $suser['telephone'] ?> </td>
                            <td> <?php echo $suser['created_at'] ?></td>

                            <td> <span class="btn-group">
                                    <span>
                                        <?php echo form_open('employee/delete_employee', 'id="frm1' . $suser['id'] . '"'); ?>
                                        <?php if ($suser['status'] == 1) { ?>
                                            <a href="<?php echo base_url(); ?>index.php/siteusers/approved_user/<?php echo $suser['id']; ?>" class="btn btn-small"><i class="icon-lock " style="color: green" > Active </i></a>
                                        <?php } else { ?>
                                                <a href="<?php echo base_url(); ?>index.php/siteusers/blocked_user/<?php echo $suser['id']; ?>" class="btn btn-small"><i class="icon-unlock " style="color: red" > Blocked </i></a>
                                        <?php } ?>
                                    </span>
                                    <?php
                                    echo form_hidden('id', $suser['id']);
                                    echo '<a href="#" class="btn btn-small" onclick="confirm_delete(' . $suser['id'] . ')" ><i class="icon-trash"></i></a>';
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
    $(document).ready(function() {
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