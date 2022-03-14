<?php
	/* Database connection settings */
	include "koneksi.php";

	$data1 = '';
	$data2 = '';
	$data3 = '';
	$datatemp1= '';
	$datatemp2= '';
	//query to get data from the tabl
	$sql = "SELECT pengeluaran as tp, pemasukan as tpm FROM data_transaksi ORDER BY tanggal";
	$result = mysqli_query($kon, $sql);
	$not1=1;
	$not2=1;
	//loop through the returned data
	while ($row = mysqli_fetch_assoc($result)) {

		if($row['tp']!=NULL){
		$data1 = $data1 . '"'. $row['tp'].'",';
		$datatemp1 = $datatemp1.''.$not1.',';
		$not1++;
		}
		else if($row['tpm']!=NULL){
		$data2 = $data2 . '"'. $row['tpm'] .'",';
		$datatemp2 = $datatemp2.''.$not2.',';
		$not2++;
		}
	}
	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
	if($datatemp1>$datatemp2){
		$data3=$datatemp1;
	}
	else if($datatemp2>$datatemp1){
		$data3=$datatemp2;
	}
	$data3 = trim($data3,",");
?>
<input type="hidden" value="<?php echo $data3 ?>" id="tanggal">
<div class="box-body">
<canvas id="chart" style="width: auto; height: 10px; background: #FFFF; border: 1px solid #FFFFFF; margin-top: 10px;"></canvas>
<script>
				var ctx = document.getElementById("chart").getContext('2d');
				var tanggal = document.getElementById("tanggal");
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $data3 ?>],
		            datasets: 
		            [{
		                label: 'Pemasukan',
		                data: [<?php echo $data2; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(66,255,0)',
		                borderWidth: 2
		            },

		            {
		            	label: 'Pengeluaran',
		                data: [<?php echo $data1; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,0,0)',
		                borderWidth: 2
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0,0,0)', fontSize: 16}}
		        }
		    });
			</script>
</div><!-- /.box-body -->