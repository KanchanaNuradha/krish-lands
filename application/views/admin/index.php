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
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/menu/css/mws.style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/menu/css/icons/32x32.css" media="screen" />

<?php
gethead($css, $msg, $error, $session_data, $mainmenu, $prof_inf, $title);
?> 	


<!-- Inner Container Start -->
<div class="container">
    <!-- Statistics Button Container -->
    <!-- Panels Start -->   
    <div class="mws-panel grid_5">
        <div class="mws-panel-header">
            <span><i class="icon-graph"></i>Weekly Progress</span>
        </div>
        <div class="mws-panel-body">
            <div id="container" style="height: 75%" ></div>
            <div id="mws-dashboard-chart" ></div>
        </div>
    </div>
    <div class="mws-panel grid_3">
        <div class="mws-panel-header">
            <span><i class="icon-book"></i> Monthly Sales</span>
        </div>
        <div class="mws-panel-body">
            <div id="container2" style="height: 75%"></div>
        </div>
    </div>
    <!-- Panels End -->
</div>
<!-- Inner Container End -->


<?php
footer();
?>  


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Weekly Progress'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
                name: 'Count',
                data: [
                    ['Posted Lands', 8],
                    ['Sales made', 3],
                ]
            }]
    });
// Set up the chart
    var chart2 = new Highcharts.Chart({
        chart: {
            renderTo: 'container2',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Monthly Sales'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
                data: [29.9, 71.5, 106.4]
            }]
    });
</script>

