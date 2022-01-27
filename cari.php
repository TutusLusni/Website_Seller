<?php 
include 'template/headeruser.php'; 

$key=$_POST["buah"];
$data=lihat("SELECT * FROM barang WHERE N_barang LIKE '%$key%' ORDER BY N_barang DESC");

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
			<h2 class="head">Hasil Pencarian</h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<div class="resp-tabs-container hor_1">
						
						<div>
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>Hasil Pencarian</strong></span>

							<?php foreach ($data as $d) : ?>
							<div class="category">
								<div class="category-img">
									<img src="upload/<?php echo $d["gambar"] ?>" title="image" width="20px" height="100px" />
								</div>
								<div class="category-info">
									<h4><?php echo $d["N_barang"]; ?></h4>
									<span>Rp. <?php echo $d["harga"]; ?></span>
									<a href="detail.php?key=<?php echo $d["K_barang"] ?>">Selengkapnya ...</a>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach ?>
						</div>
						
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--footer section start-->		
<?php include 'template/footeruser.php' ?>
