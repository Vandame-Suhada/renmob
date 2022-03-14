<div class="box-body">
<table border="1" style="border-color: #000;" id="dataTables" class="table table-hover table-bordered">
	<thead>
	    <tr>
		    <th style="border-color: #000;" class="text-center small">No</th>
		    <th style="border-color: #000;" class="text-center small">Merek Mobil</th>
		    <th style="border-color: #000;" class="text-center small">Unit</th>
	    </tr>
	</thead>
	<?php  
		include("koneksi.php");
		$record=mysqli_query($kon, "SELECT * FROM kendaraan_inventaris");
		$no=1;
		while($data=mysqli_fetch_assoc($record)){
    ?>
	<tr>
	    <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['merek_mobil'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['unit_tersedia'] ?></td>
    </tr>
    <?php
		$no++; 
		}
	?>
</form>
</table>
</div><!-- /.box-body -->