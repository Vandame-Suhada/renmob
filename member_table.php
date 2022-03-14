<a href="member_add.php">
    <button class="btn btn-success" name="sub" value="add" type="button"><i class="fa fa-plus"></i> Add</button>
</a>
<div class="box-body">
<table border="1" style="border-color: #000;" id="dataTables" class="table table-hover table-bordered">
	<thead>
	    <tr>
		    <th style="border-color: #000;" class="text-center small">No</th>
		    <th style="border-color: #000;" class="text-center small">Nama Lengkap</th>
		    <th style="border-color: #000;" class="text-center small">No Telp</th>
		    <th style="border-color: #000;" class="text-center small">Jenis Kelamin</th>
		    <th style="border-color: #000;" class="text-center small">Alamat</th>
		    <th style="border-color: #000;" class="text-center small">Action</th>
	    </tr>
	</thead>
	<?php  
		include("koneksi.php");
		$record=mysqli_query($kon, "SELECT * FROM member");
		$no=1;
		while($data=mysqli_fetch_assoc($record)){
    ?>
	<tr>
	    <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['nama_lengkap'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['no_telp'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['jenis_kelamin'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['alamat'] ?></td>
	    <td style="border-color: #000;" class="text-center">
	    <?php
    	echo "<a onclick=\"return confirm('Are you sure you want to delete this item?');\" class=\"btn btn-danger fa fa-trash\" href=\"member_edit_delete.php?aksi=Delete&id=".$data['id']."\"></a>";
        ?>
        </td>
    </tr>
    <?php
		$no++; }
	?>
</form>
</table>
</div><!-- /.box-body -->