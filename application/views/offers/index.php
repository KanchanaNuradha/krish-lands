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
            <span style="float: left"><i class="icon-file-xml"></i> Offers Made

            </span>
        </div>
    </div>
    <div class="mws-panel-body">
        <div class="mws-panel grid_11" >
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> User ID</th>
                        <th> Land ID </th>
                        <th> Offer 1 </th>
                        <th> Offer 2 </th>
                        <th> offer 3 </th>
                        <th> Date   </th> 
                        <th> Action  </th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php foreach ($offers as $om) { ?>
                        <tr>
                            <td> <?php echo $om['id'] ?></td>
                            <td> <?php echo $om['user'] ?> </td>
                            <td> <?php echo $om['land_id'] ?> </td>
                            <td> <?php echo $om['offer_1'] ?></td>
                            <td> <?php echo $om['offer_2'] ?></td>
                            <td> <?php echo $om['offer_3'] ?></td>
                            <td> <?php echo $om['created_at'] ?></td>
                            <td>
                                <span class="btn-group">
                                    <?php echo form_open('offers/delete_offer', 'id="frm1' . $om['id'] . '"'); ?>
                                    <?php
                                    echo form_hidden('id', $om['id']);
                                    echo '<a href="#" class="btn btn-small" onclick="confirm_delete(' . $om['id'] . ')" ><i class="icon-trash"></i></a>';
                                    echo form_close();
                                    ?>
                                </span>
                            </td>   
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