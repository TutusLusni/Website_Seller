<?php 
$page="keranjang";
include 'template/headeruser.php'; 
$n=$_SESSION["nama"];
$result=lihat("SELECT * from user where user='$n' ")[0];
$kode=$result["kode_user"];
/*$data=lihat("SELECT * FROM log WHERE kode_user='$kode'");*/

$jumlahdataperhalaman=3;
$jumlahdata=count(lihat("SELECT * FROM log"));
$jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
$halamanaktif=(isset($_GET["page"])) ? $_GET["page"] : 1;
$awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

$data=lihat("SELECT * FROM log WHERE kode_user='$kode' LIMIT $awaldata,$jumlahdataperhalaman"); 
?>
	<!-- Large modal -->
			
	<div class="banner text-center">
	  <div class="container">    
	  </div>
	</div>
	<!-- Categories -->
	<!--Vertical Tab-->
	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head">Keranjang saya</h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<div class="resp-tabs-container hor_1">
						
						<div>
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>List Belanja Saya</strong></span>
							<?php 
							 foreach ($data as $d) :
							 ?>
							
							<div class="category">
								<div class="category-img">
									<img src="upload/<?php echo $d["gambar"] ?>" title="image" width="20px" height="100px" />
								</div>
								<div class="category-info">
									<h4><?php echo $d["N_barang"]; ?></h4>
									<span>Jumlah Pembelian : <?php echo $d["jumlah"]; ?></span>
									<span>Tanggal Transaksi : <?php echo $d["Tanggal"]; ?></span>
                      				<a href="#" class="btn btn-danger btn-xs account" data-toggle="modal" data-target="#deleteuser<?php echo $d["no"]; ?>"><font color="black"><i class="fa fa-trash"></i> Hapus </font></a> 

                      				<div class="example-modal">
			                        <div id="deleteuser<?php echo $d["no"]; ?>" class="modal fade" role="dialog" style="display:none;">
			                          <div class="modal-dialog">
			                            <div class="modal-content">
			                              <div class="modal-header">
			                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                <h3 class="modal-title">Konfirmasi Delete Data User</h3>
			                              </div>
			                              <div class="modal-body">
			                                <h4 align="center" >Apakah anda yakin ingin menghapus history belanja <?php echo $d["N_barang"];?><strong><span class="grt"></span></strong> ?</h4>
			                              </div>
			                              <div class="modal-footer">
			                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
			                                <a href="hapuslog.php?id=<?php echo $d["no"] ?>"><button id="delete" type="button" class="btn btn-default pull-right" >Hapus</button></a>
			                              </div>
			                            </div>
			                          </div>
			                        </div>
			                      </div><!-- modal delete -->

								</div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach ?>
						</div>
						
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

					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--footer section start-->		
<?php include 'template/footeruser.php' ?>
