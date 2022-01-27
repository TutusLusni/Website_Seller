<!DOCTYPE html>
<?php 
require '../admin/fungsi.php';

$key=$_GET["key"];
$data=lihat("SELECT * FROM barang WHERE N_barang LIKE '%$key%' ");
 ?>

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
          $i=1;  
      ?>
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
      
		</div> <!-- batas tabel -->