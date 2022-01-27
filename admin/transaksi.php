<?php 
$hal="transaksi";
include '../template/header.php'; 
require 'fungsi.php'; 
$data=lihat("SELECT * FROM transaksi,barang,user WHERE barang.K_barang=transaksi.K_barang AND user.kode_user=transaksi.kode_user"); 

if (isset($_POST["date"])) {
  $bulan=($_POST["bulan"]+1);
  $tahun=$_POST["tahun"];
  $data=lihat("SELECT * FROM transaksi,barang,user WHERE MONTH(T_transaksi)='$bulan' AND YEAR(T_transaksi)='$tahun' AND barang.K_barang=transaksi.K_barang AND user.kode_user=transaksi.kode_user");
}else{
  $data=lihat("SELECT * FROM transaksi,barang,user WHERE barang.K_barang=transaksi.K_barang AND user.kode_user=transaksi.kode_user");
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Transaksi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tabel Transaksi</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
		<form action="" method="post">
      <div class="col-xs-2">
      <select class="form-control " id="sel1" name="bulan">
        <?php 
        $bulan=["januari","februari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember"];
        for ($i=0; $i <= 11 ; $i++) {
          if (isset($_POST["bulan"])) {
            $sel=($i+1)== ($_POST["bulan"]+1) ? ' selected="selected"' : '';
          }else{
            $sel=($i+1)== date('m') ? ' selected="selected"' : '';
          } 
          echo '<option value="'.$i.'"'.$sel.'>'.$bulan[$i].'</option>';
        }
         ?>
      </select>
			</div>
      <div class="col-xs-2">
      <select class="form-control " id="sel1" name="tahun">
        <?php 
        $tahun= date('Y') - 5;
        for ($i=$tahun; $i <= date('Y') ; $i++) {
          if (isset($_POST["tahun"])) {
            $sel=$i== $_POST["tahun"] ? ' selected="selected"' : '';
          }else{
            $sel=$i== date('Y') ? ' selected="selected"' : '';
          } 
          echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
         ?>
      </select>
      </div>
      <button type="submit" class="btn btn-default" name="date"><i class="fa fa-search"></i></button>
    <div class="pull-right" style="padding-right: 20px;">
       <?php if (isset($_POST["date"])) : ?>
       <a href="hapustransaksi.php?bulan=<?php echo ($_POST["bulan"]+1); ?>&tahun=<?php echo $_POST["tahun"]; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> hapus</a> 
        <?php else : ?>
        <a href="hapustransaksi.php?bulan=<?php echo date('m'); ?>&tahun=<?php echo date('Y'); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> hapus</a>
        <?php endif ?>
    </div>
    </form>
      
      
		</div><!--/.row-->
		<div class=""><br>          
  		<table class="table table-striped">
    		<thead>
     		 <tr>
       			 <th>NO</th>
       			 <th>Kode Transaksi</th>
       			 <th>User</th>
             <th>Tanggal</th>
       			 <th>Jumlah Barang</th>
       			 <th>Total</th>
     		 </tr>
    	</thead>
    	<tbody>
    		<?php $i=1;  ?>
			<?php foreach ($data as $d) : ?>
     		 <tr>
     		   <td><?php echo "$i"; ?></td>
      		   <td><?php echo $d["K_transaksi"]; ?></td>
       		   <td><?php echo $d["user"]; ?></td>
       		   <td><?php echo $d["T_transaksi"]; ?></td>
             <td><?php echo $d["qty"]; ?></td>
       		   <td><?php 
                  $jum=$d["qty"];
                  $har=$d["harga"];
                  $sum=$jum*$har;
                  echo $sum; 
                ?>
               
             </td>
          </tr>
    	    <?php $i++; ?>
			<?php endforeach ?>
    	</tbody>
  		</table>
		</div>

<?php include '../template/footer.php'; ?>