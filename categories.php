<?php include 'template/headeruser.php'; ?>
	<!-- Large modal -->
			
	<div class="banner text-center">
	  <div class="container">    
	  </div>
	</div>
	<!-- Categories -->
	<!--Vertical Tab-->
	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head">Kategori Utama</h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<ul class="resp-tabs-list hor_1">
						<li>Alat Rumah Tangga</li>
						<li>Handphone</li>
						<li>Komputer</li>
					</ul>
					<div class="resp-tabs-container hor_1">
						
						<div>
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>Alat Rumah Tangga</strong> (Menampilkan jenis - jenis Alat Rumah Tangga)</span>
							<?php 
							$jumlahdataperhalaman=4;
							$jumlahdata=count(lihat("SELECT * FROM barang Where kode_kategori='J002'"));
							$jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
							$halamanaktif=(isset($_GET["page"])) ? $_GET["page"] : 1;
							$awaldata=($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
							$data=lihat("SELECT * FROM barang Where kode_kategori='J002' LIMIT $awaldata,$jumlahdataperhalaman");
							 foreach ($data as $d) :
							 ?>
							
							<div class="category">
								<div class="category-img">
									<img src="upload/<?php echo $d["gambar"]; ?>" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo $d["N_barang"]; ?></h4>
									<span>Rp. <?php echo $d["harga"]; ?></span>
									<a href="detail.php?key=<?php echo $d["K_barang"] ?>">Selengkapnya ...</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php endforeach ?>

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
						<div>
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>Handphone</strong> (Menampilkan Model-Model Handphone)</span>
							<?php 
							$jumlahdataperhalaman1=4;
							$jumlahdata1=count(lihat("SELECT * FROM barang Where kode_kategori='J001'"));
							$jumlahhalaman1=ceil($jumlahdata1/$jumlahdataperhalaman1);
							$halamanaktif1=(isset($_GET["page1"])) ? $_GET["page1"] : 1;
							$awaldata1=($jumlahdataperhalaman1 * $halamanaktif1) - $jumlahdataperhalaman1;
							$data1=lihat("SELECT * FROM barang Where kode_kategori='J001' LIMIT $awaldata1,$jumlahdataperhalaman1");
							 foreach ($data1 as $d1) :
							 ?>
							<div class="category">
								<div class="category-img">
									<img src="upload/<?php echo $d1["gambar"]; ?>" title="image" alt="" />
								</div>
									<div class="category-info">
									<h4><?php echo $d1["N_barang"]; ?></h4>
									<span>Rp <?php echo $d1["harga"]; ?></span>
									<a href="detail.php?key=<?php echo $d1["K_barang"] ?>">Selengkapnya ...</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php endforeach ?>

							<ul class="pager">
							    <?php if ($halamanaktif1>1) : ?>
							        <li class="previous"><a href="?page1=<?php echo ($halamanaktif1-1) ?>#parentVerticalTab2">Previous</a></li>
						        <?php else : ?>
						            <li class="disabled previous"><a href="#">Previous</a></li>
						        <?php endif ?> 

						        <ul class="pagination">
						        <?php for ($i=1; $i <=$jumlahhalaman1 ; $i++) { ?>
						        <!-- <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> -->
						            <li><a href="?page1=<?php echo $i; ?>#parentVerticalTab2"><?php echo $i; ?></a></li>      
      							<?php  } ?>
      							</ul>

      							<?php if ($halamanaktif1<$jumlahhalaman1) : ?>
      							    <li class="next"><a href="?page1=<?php echo ($halamanaktif1+1) ?>#parentVerticalTab2">Next</a></li>
      							<?php else : ?>
      							          <li class="disabled next"><a href="#" aria-label="next">Next</a></li>
        						<?php endif ?> 
    						</ul>
						</div>
						<!-- perlengkapan tambahan -->
						<div>
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>Komputer</strong> (Menampilkan jenis - jenis Komputer)</span>
							<?php
							$jumlahdataperhalaman2=4;
							$jumlahdata2=count(lihat("SELECT * FROM barang Where kode_kategori='J003'"));
							$jumlahhalaman2=ceil($jumlahdata2/$jumlahdataperhalaman2);
							$halamanaktif2=(isset($_GET["page2"])) ? $_GET["page2"] : 1;
							$awaldata2=($jumlahdataperhalaman2 * $halamanaktif2) - $jumlahdataperhalaman2;
							$data2=lihat("SELECT * FROM barang Where kode_kategori='J003' LIMIT $awaldata2,$jumlahdataperhalaman2"); 
							 foreach ($data2 as $d2) :
							 ?>
							<div class="category">
								<div class="category-img">
									<img src="upload/<?php echo $d2["gambar"]; ?>" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo $d2["N_barang"]; ?></h4>
									<span>Rp <?php echo $d["harga"]; ?></span>
									<a href="detail.php?key=<?php echo $d2["K_barang"] ?>">Selengkapnya...</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php endforeach ?>

							<ul class="pager">
							    <?php if ($halamanaktif2>1) : ?>
							        <li class="previous"><a href="?page2=<?php echo ($halamanaktif2-1) ?>#parentVerticalTab3">Previous</a></li>
						        <?php else : ?>
						            <li class="disabled previous"><a href="#">Previous</a></li>
						        <?php endif ?> 

						        <ul class="pagination">
						        <?php for ($i=1; $i <=$jumlahhalaman2 ; $i++) { ?>
						        <!-- <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> -->
						            <li><a href="?page2=<?php echo $i; ?>#parentVerticalTab3"><?php echo $i; ?></a></li>      
      							<?php  } ?>
      							</ul>

      							<?php if ($halamanaktif2<$jumlahhalaman2) : ?>
      							    <li class="next"><a href="?page2=<?php echo ($halamanaktif2+1) ?>#parentVerticalTab3">Next</a></li>
      							<?php else : ?>
      							          <li class="disabled next"><a href="#" aria-label="next">Next</a></li>
        						<?php endif ?> 
    						</ul>

						</div>
						<!-- perlengkapan tambahan -->
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--Plug-in Initialisation-->
	<script type="text/javascript">
    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
	<!-- //Categories -->
	<!--footer section start-->		
<?php include 'template/footeruser.php' ?>
