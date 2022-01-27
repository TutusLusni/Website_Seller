<footer>
			<div class="footer-top">
				<div class="container">
					<div class="foo-grids">
						<div class="col-md-3 footer-grid">
							<h4 class="footer-head">Web Apa Sih Ini?</h4>
							<p>Web ini bertujuan untuk memberi tahu gambaran jika kita ingin membangun sebuah bangunan khususnya rumah.</p>
							<p>Didalam web ini, juga terdapat model-model rumah sekarang. Sehingga kita tidak usah repot-repot mecari desain rumah. Serta dilengkapi dengan harga atap dan juga peralatn tambahan untuk membangun rumah impian anda. </p>
						</div>
						<div class="col-md-3 footer-grid">
							<h4 class="footer-head">Metode Pembayaran</h4>
							<ul>
								<li><img src="images/master (3).png"></li>
								<li><img src="images/visa.png"></li>
								<li><img src="images/paypal.png"></li>						
							</ul>
						</div>
						<div class="col-md-3 footer-grid">
							<h4 class="footer-head">Informasi</h4>
							<ul>
								<li><a href="about.php">Tentang Saya</a></li>	
							</ul>
						</div>
						<div class="col-md-3 footer-grid">
							<h4 class="footer-head">Hubungi Kami</h4>
							<span class="hq">Dengan cara di bawah ini ...</span>
							<address>
								<ul class="location">
									<li><span class="glyphicon glyphicon-map-marker"></span></li>
									<li>UD MANDIRI JAYA NGLAYUR P TULUS</li>
									<div class="clearfix"></div>
								</ul>	
								<ul class="location">
									<li><span class="glyphicon glyphicon-earphone"></span></li>
									<li>083 846 615 966</li>
									<div class="clearfix"></div>
								</ul>	
								<ul class="location">
									<li><span class="glyphicon glyphicon-envelope"></span></li>
									<li><a href="mailto:tu7uslusni@gmail.com">tu7uslusni@gmail.com</a></li>
									<div class="clearfix"></div>
								</ul>						
							</address>
						</div>
						<div class="clearfix"></div>
					</div>						
				</div>	
			</div>	
			<div class="footer-bottom text-center">
			<div class="container">
				<div class="footer-logo">
					<a href="index.php"><span>Mandiri</span>Jaya</a>
				</div>
				<div class="footer-social-icons">
					<ul>
						<li><a class="facebook" href="#"><span>Facebook</span></a></li>
						<li><a class="twitter" href="#"><span>Twitter</span></a></li>
						<li><a class="flickr" href="#"><span>Flickr</span></a></li>
						<li><a class="googleplus" href="#"><span>Google+</span></a></li>
						<li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
					</ul>
				</div>
				<div class="copyrights">
					<p> © 2016 Resale. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->

        <!-- Memanggil Autocomplete.js -->
        <script src="js/jquery.autocomplete.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Selector input yang akan menampilkan autocomplete.
                $( "#buah" ).autocomplete({
                    serviceUrl: "caribarang.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion) {
                        $( "#buah" ).val("" + suggestion.barang);
                    }
                });
            })
        </script>
</body>
</html>