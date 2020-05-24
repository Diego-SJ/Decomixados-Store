				<!-- FOOTER -->
				

                <div class="footer-wrap">
                    <div class="container">
                        <div class="row">

                            <div class="footer clearfix">

                                <div class="span3">
                                    <div class="widget">
                                        <h3>Servicio al cliente</h3>
                                        <ul>
                                            <li><a href="<?= base_url().'home/aboutus' ?>">Nosotros</a></li>
                                            <li><a href="<?= base_url().'home/aboutus' ?>">Política de privacidad</a></li>
                                            <li><a href="<?= base_url().'home/aboutus' ?>">Terminos y condiciones</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="span3">
                                </div>

                                <div class="span3">
                                <?php 
                                if($this->session->userdata('USER_ID') != NULL || 
                                $this->session->userdata('USER_AT') != NULL){
                                    echo '<div class="widget">
                                            <h3>Mi cuenta</h3>
                                            <ul>
                                                <li><a href="'.base_url().'myAccount">Mi cuenta</a></li>
                                                <li><a href="'.base_url().'cart">Mi carrito</a></li>
                                                <li><a href="'.base_url().'wishlist">Favoritos</a></li>
                                            </ul>
                                        </div>';
                                } ?>
                                </div>

                                <div class="span3">
                                    <div class="widget">
                                        <h3>Contactanos</h3>
                                        <ul>
                                            <li>support@decomixado.com</li>
                                            <li>+(772) 140 0372</li>
                                            <li>Mixquiahuala col centro #7, calle comxs </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <footer class="clearfix">
                                <div class="span5">
                                    <p>© 2019 Decomixado, Todos los derechos reservados</p>
                                </div>
                                <div class="span2 back-top">
                                    <a href="#"> <img src="<?= base_url() ?>assets/images/back.png" alt=""></a>
                                </div>
                                <div class="span5">
                                    <div class="social-icon">
                                        <a class="twet" href="<?= base_url().'home/aboutus' ?>"></a>
                                        <a class="fb" href="<?= base_url().'home/aboutus' ?>"></a>
                                        <a class="google" href="<?= base_url().'home/aboutus' ?>"></a>
                                        <a class="pin" href="<?= base_url().'home/aboutus' ?>"> </a>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
                <!-- FOOTER -->

				
				<!-- Scripts -->
				
                <script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>
                <script src="<?= base_url() ?>assets/js/jquery.cycle.all.js"></script>
                <script src="<?= base_url() ?>assets/js/modernizr.custom.17475.js"></script>
                <script src="<?= base_url() ?>assets/js/jquery.elastislide.js"></script>
                <script src="<?= base_url() ?>assets/js/jquery.carouFredSel-6.0.4-packed.js"></script>
                <script src="<?= base_url() ?>assets/js/jquery.selectBox.js"></script>
                <script src="<?= base_url() ?>assets/js/jquery.tooltipster.min.js"></script>
                <script src="<?= base_url() ?>assets/js/jquery.prettyPhoto.js"></script>
				<script src="<?= base_url() ?>assets/js/custom.js"></script>		
		</body>
</html>