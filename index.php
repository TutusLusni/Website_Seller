<?php
$page = "index";
include 'template/headeruser.php';
?>

<!-- jumbroton -->
<div class="main-banner banner text-center">
    <div class="container">
    </div>
</div>
<!-- tutup jumbroton -->
<!-- content-starts-here -->
<div class="content">
    <div class="categories">
        <div class="container">

            <div class="col-md-4 focus-grid">
                <a href="categories.php">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-wheelchair"></i></div>
                            <h4 class="clrchg">Alat Rumah Tangga</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 focus-grid">
                <a href="categories.php#parentVerticalTab2">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-mobile"></i></div>
                            <h4 class="clrchg">Handphone</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 focus-grid">
                <a href="categories.php#parentVerticalTab3">
                    <div class="focus-border">
                        <div class="focus-layout">
                            <div class="focus-image"><i class="fa fa-laptop"></i></div>
                            <h4 class="clrchg">Komputer</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <div class="trending-ads">
        <div class="container">
            <!-- slider -->
            <div class="trend-ads">
                <h2>Terbaru</h2>
                <ul id="flexiselDemo3">
                    <li>
                        <?php
						$data = lihat('SELECT * FROM barang order by K_barang DESC limit 0,4');
						foreach ($data as $d) :
						?>
                        <div class="col-md-3 biseller-column">
                            <a href="detail.php?key=<?php echo $d["K_barang"]; ?>">
                                <img src="upload/<?php echo $d["gambar"] ?>" />
                                <span class="price">Rp. <?php echo $d["harga"]; ?> </span>
                            </a>
                            <div class="ad-info">
                                <h5><?php echo $d["N_barang"]; ?></h5>
                                <!-- <span>1 hour ago</span> -->
                            </div>
                        </div>
                        <?php endforeach ?>
                    </li>
                    <li>
                        <?php
						$data = lihat('SELECT * FROM barang order by K_barang DESC limit 4,4');
						foreach ($data as $d) :
						?>
                        <div class="col-md-3 biseller-column">
                            <a href="detail.php?key=<?php echo $d["K_barang"]; ?>">
                                <img src="upload/<?php echo $d["gambar"] ?>" />
                                <span class="price">Rp. <?php echo $d["harga"]; ?> </span>
                            </a>
                            <div class="ad-info">
                                <h5><?php echo $d["N_barang"]; ?></h5>
                                <!-- <span>1 hour ago</span> -->
                            </div>
                        </div>
                        <?php endforeach ?>
                    </li>
                </ul>
                <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo3").flexisel({
                        visibleItems: 1,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 5000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 1
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 1
                            }
                        }
                    });

                });
                </script>
                <script type="text/javascript" src="asset/js/jquery.flexisel.js"></script>
            </div>
        </div>
        <!-- //slider -->
    </div>
    <div class="mobile-app">
        <div class="container">
            <div class="col-md-5 app-left">
                <a href="mobileapp.html"><img src="images/app.png" alt=""></a>
            </div>
            <div class="col-md-7 app-right">
                <h3>Mandiri Jaya Store App untuk <span>Memudahkan</span> pencarian barang - barang yang dijual oleh
                    Mandiri Jaya Group</h3>
                <p>Ayo ..., buruan download Mandiri Jaya Store dan temukan barang - barang kebutuhan perlengkapan rumah
                    anda dengan mudah dan praktis.</p>
                <div class="app-buttons">
                    <div class="app-button">
                        <a href="#"><img src="images/1.png" alt=""></a>
                    </div>
                    <div class="app-button">
                        <a href="#"><img src="images/2.png" alt=""></a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer section start-->
<?php
include 'template/footeruser.php';
?>