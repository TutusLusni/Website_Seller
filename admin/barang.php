<?php 
$hal="barang";
include '../template/header.php';
require 'fungsi.php'; 
$k=kode('SELECT max(K_barang) as maxKode FROM barang','B');

$jumlahdataperhalaman=5;
$jumlahdata=count(lihat("SELECT * FROM barang"));
$jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
$halamanaktif=(isset($_GET["page"])) ? $_GET["page"] : 1;
$awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

$data=lihat("SELECT * FROM barang LIMIT $awaldata,$jumlahdataperhalaman"); 


if (isset($_POST["tambah_barang"])) {
	if (tambahbarang($_POST)>0) {
		echo "<script type='text/javascript'>
		alert('Data berhasil ditambahkan...');
		document.location.href='index.php';
		</script>";
	}else{
		echo "<script type='text/javascript'>
		alert('Data Gagal ditambahkan..!!!!!');
		document.location.href='index.php';
		</script>";
	}
}

if (isset($_POST["ubah_barang"])) {
	if (ubahbarang($_POST)>0) {
		echo "<script type='text/javascript'>
		alert('Data berhasil di Ubah...');
		document.location.href='index.php';
		</script>";
	}else{
		echo "<script type='text/javascript'>
		alert('Data Gagal di Ubah..!!!!!');
		document.location.href='index.php';
		</script>";
	}
}


?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tabel Barang</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-plus"></i> Tambah Barang</a>
        <input class="pull-right" type="text" name="caribarang" id="keyword" placeholder="Cari Barang Disini">
			</div>
		</div><!--/.row-->
    <br>
		<div id="asek">          
  		<table class="table table-striped">
    		<thead>
     		 <tr>
       			 <th>NO</th>
       			 <th>Kode Barang</th>
       			 <th>Kode Kategori</th>
       			 <th>Nama Barang</th>
       			 <th>Harga</th>
       			 <th>Stok Barang</th>
       			 <th>Gambar</th>
       			 <th>Aksi</th>
     		 </tr>
    	</thead>
    	<tbody>
    		<?php
        if ($halamanaktif>1) {
          $i=(($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman)+1;   
         }else{ 
          $i=1;  
      }?>
			<?php foreach ($data as $d) : ?>
     		 <tr>
     		   <td><?php echo "$i"; ?></td>
      		   <td><?php echo $d["K_barang"]; ?></td>
       		   <td><?php echo $d["kode_kategori"]; ?></td>
       		   <td><?php echo $d["N_barang"]; ?></td>
       		   <td><?php echo $d["harga"]; ?></td>
       		   <td><?php echo $d["stock"]; ?></td>
       		   <td><img src="../upload/<?php echo $d["gambar"]; ?>" width="50px" height="50px"></td>
       		   <td><a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updateuser<?php echo $i; ?>"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deleteuser<?php echo $i; ?>"><i class="fa fa-trash"></i> Delete</a>                      
                      
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteuser<?php echo $i; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Konfirmasi Delete Data User</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus barang <?php echo $d["N_barang"];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                <a href="hapusbarang.php?id=<?php echo $d["K_barang"]; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updateuser<?php echo $i; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data User</h3>
                              </div>
                              <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data" role="form">
                                  <?php
                                  $id=$d["K_barang"];
								                  $data=lihat("SELECT * FROM barang WHERE K_barang='$id'")[0]; 
                                  
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right"></label>         
                                    <div class="col-sm-8"><input type="hidden" class="form-control" name="kode" value="<?php echo $data["K_barang"]; ?>">
                                      <input type="hidden" class="form-control" name="gambarlama" value="<?php echo $data["gambar"]; ?>">
                                    </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama Barang <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Username" value="<?php echo $data["N_barang"]; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right">Harga <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="harga" placeholder="Username" value="<?php echo $data["harga"]; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right">Stok <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="stok" placeholder="Username" value="<?php echo $data["stock"]; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right">Kategori Barang <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><select name="kategori" class="form-control select2" style="width: 100%;">
                                        <option value="J001" selected="">Handphone</option>
                                        <option value="J002">Alat Rumah Tangga</option>
                                        <option value="J003">Komputer</option>
                                      </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right">Pilih Gambar <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><img src="../upload/<?php echo $data["gambar"]; ?>" width="50px" height="50px"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right"></label>
                                    <div class="col-sm-8"><input type="file" class="form-control" name="gambar"></div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="ubah_barang" class="btn btn-primary" value="Ubah">
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update user -->
                    </td>
                  </tr>
    	    <?php $i++; ?>
			<?php endforeach ?>
      </tbody>
  		</table>
      <ul class="pager">
                  <?php if ($halamanaktif>1) : ?>
                      <li class="previous"><a href="?page=<?php echo ($halamanaktif-1) ?>">Previous</a></li>
                    <?php else : ?>
                        <li class="disabled previous"><a href="#">Previous</a></li>
                    <?php endif ?> 

                    <ul class="pagination">
                    <?php for ($i=1; $i <=$jumlahhalaman ; $i++) { ?>
                    <!-- <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> -->
                        <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>      
                    <?php  } ?>
                    </ul>

                    <?php if ($halamanaktif<$jumlahhalaman) : ?>
                        <li class="next"><a href="?page=<?php echo ($halamanaktif+1) ?>">Next</a></li>
                    <?php else : ?>
                        <li class="disabled next"><a href="#" aria-label="next">Next</a></li>
                    <?php endif ?> 
      </ul>
		</div> <!-- batas tabel -->



        <!-- modal insert -->

        <div class="example-modal">
          <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Tambah Barang</h3>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Kode Barang <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="kode" value="<?php echo $k; ?>" disabled></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Nama Barang <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama Barang" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Harga <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="harga" placeholder="Harga Barang" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Stok <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="stok" placeholder="Stok Barang" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Kategori Barang <span class="text-red">*</span></label>
                        <div class="col-sm-8"><select name="kategori" class="form-control select2" style="width: 100%;">
                          <option value="J001" selected="">Handphone</option>
                          <option value="J002">Alat Rumah Tangga</option>
                          <option value="J003">Komputer</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Pilih Gambar <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="file" class="form-control" name="gambar"></div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="tambah_barang" class="btn btn-primary" value="Simpan">
                    </div>
                    <!--<div class="box-footer">
                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div> /.box-footer -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- modal insert close -->

<?php include '../template/footer.php' ?>