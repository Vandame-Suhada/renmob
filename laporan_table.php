<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <center><h2>Print Data</h2></center>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane fade in active" id="bulan">
            <h4 align="center">Data Penjualan Perbulan</h4>
            <form method="post" action="laporan_proses.php" target="_blank" enctype="multipart/form-data">
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <center><table>
                    <tr>
                      <td>
                      <select class="form-control" name="tahun" id="tahun">
                        <option disabled selected>--Pilih Tahun--</option>
                           <?php 
                            include "koneksi.php";
                            $sql=mysqli_query($kon,"SELECT DISTINCT year(tanggal) as ytp FROM data_transaksi");
                            while ($data=mysqli_fetch_array($sql)) {
                           ?>
                             <option value="<?=$data['ytp']?>"><?=$data['ytp']?></option> 
                           <?php
                            }
                           ?>
                      </select>
                    </td>
                    <td>
                      <select class="form-control" name="bulan" id="bulan">
                      <option disabled selected>--Pilih Bulan--</option>
                         <?php 
                          include "koneksi.php";
                          $sql=mysqli_query($kon,"SELECT DISTINCT month(tanggal) as mtp FROM data_transaksi");
                          while ($data=mysqli_fetch_array($sql)) {
                         ?>
                           <option value="<?=$data['mtp']?>"><?=$data['mtp']?></option> 
                         <?php
                          }
                         ?>
                      </select>
                    </td>
                    </tr>
                  </table><br>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-info" value="Cetak"><span class="fa fa-print"></span>&nbsp;Print</button>
                </div>
              </div>
              </center>
            </form>
          </div>
        </div>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
</div>