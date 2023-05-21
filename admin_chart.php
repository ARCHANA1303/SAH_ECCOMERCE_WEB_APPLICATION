<?php 

include 'config.php';



$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

$data1 = '';
$data2 = '';
$buildingName = '';

$query = "SELECT * FROM `order`";

$runQuery = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($runQuery)) {

    $data1 = $data1 . '"'. $row['order_id'].'",';
    // $data2 = $data2 . '"'. $row['user_id'] .'",';
    $buildingName = $buildingName . '"'. ucwords($row['placed_on']) .'",';
}

$data1 = trim($data1,",");
// $data2 = trim($data2,",");
$buildingName = trim($buildingName,",");

?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>order report</title>

		<style type="text/css">			
			/* body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			} */

			.container {
				color: #222;
				background: #fff;
				border: #555652 1px solid;
				padding: 10px;
			}
		</style>

	</head>

	<body>	   
	    <div class="container">	
	    <h1>Order Report</h1>       
			<canvas id="chart" style="width: 50%; font-color: #222; height: 200px; background: #fff; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $buildingName; ?>],
		            datasets: 
		            [{
		                label: 'order count',
		                data: [<?php echo $data1; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            },

		            {
		            	label: 'Order Count',
		                data: [<?php echo $data2; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,255,255)',
		                borderWidth: 3	
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
	    </div>
	    
	</body>
</html>