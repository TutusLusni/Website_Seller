<?php 
$hal="user";
include '../template/header.php';
require 'fungsi.php'; 
$data=lihat('SELECT * FROM user'); 
$k=kode('SELECT max(kode_user) as maxKode FROM user','U');

if (isset($_POST["tambah_user"])) {
	if (tambahuser($_POST)>0) {
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

if (isset($_POST["ubah_user"])) {
	if (ubahuser($_POST)>0) {
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
				<li class="active">User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tabel User</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-plus"></i> Tambah User</a>
			</div>
		</div><!--/.row-->
		<div class=""><br>          
  		<table class="table table-striped">
    		<thead>
     		 <tr>
       			 <th>NO</th>
       			 <th>Kode user</th>
       			 <th>Username</th>
       			 <th>Alamat</th>
       			 <th>No. Handphone</th>
       			 <th>Hak Akses</th>
       			 <th>Aksi</th>
     		 </tr>
    	</thead>
    	<tbody>
    		<?php $i=1;  ?>
			<?php foreach ($data as $d) : ?>
     		 <tr>
     		   <td><?php echo "$i"; ?></td>
      		   <td><?php echo $d["kode_user"]; ?></td>
       		   <td><?php echo $d["user"]; ?></td>
       		   <td><?php echo $d["alamat"]; ?></td>
       		   <td><?php echo $d["no_hp"]; ?></td>
       		   <td><?php echo $d["kategori"]; ?></td>
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
                                <h4 align="center" >Apakah anda yakin ingin menghapus barang <?php echo $d["user"];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                <a href="hapususer.php?id=<?php echo $d["kode_user"]; ?>" class="btn btn-primary">Delete</a>
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
                                <form action="" method="post" role="form">
                                  <?php
                                  $id=$d["kode_user"];
								                  $data=lihat("SELECT * FROM user WHERE kode_user='$id'")[0]; 
                                  ?>
                                  <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right"></label>         
                      <div class="col-sm-8"><input type="hidden" class="form-control" name="kode" value="<?php echo $data["kode_user"]; ?>">
                        <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $data["pass"]; ?>">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Username <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $data["user"]; ?>"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Password <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="password" class="form-control" name="password1" placeholder="Password"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Konfirmasi Password <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="password" class="form-control" name="password2" placeholder="Ulangi Password"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Alamat <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $data["alamat"]; ?>"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">No. Handphone <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="no" placeholder="No. Handphone" value="<?php echo $data["no_hp"] ?>"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Hak Akses <span class="text-red">*</span></label>
                        <div class="col-sm-8"><select name="kategori" class="form-control select2" style="width: 100%;">
                          <option value="admin" selected="">Admin</option>
                          <option value="user">User</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="ubah_user" class="btn btn-primary" value="Ubah">
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
		</div> <!-- batas tabel -->



        <!-- modal insert -->

        <div class="example-modal">
          <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Tambah User</h3>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" role="form">
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Kode User<span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="kode" value="<?php echo $k; ?>" disabled></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Usernam <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Password <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="password" class="form-control" name="password1" placeholder="Password" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Ulangi Password<span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="password" class="form-control" name="password2" placeholder="Username" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Alamat<span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">No. Handphone <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="no" placeholder="Username" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Hak Akses <span class="text-red">*</span></label>
                        <div class="col-sm-8"><select name="kategori" class="form-control select2" style="width: 100%;">
                          <option value="admin" selected="">Admin</option>
                          <option value="user">User</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="tambah_user" class="btn btn-primary" value="Simpan">
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