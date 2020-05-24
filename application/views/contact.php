                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>CONTACTO</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BAR -->

                <!-- PRODUCT-OFFER -->
                <br>
                <?php 
                if(!empty($this->session->flashdata("success"))){
                echo '<span class="text-warning" style="font-size: 25px; margin-left:70px;"> '.
                            $this->session->flashdata("success")
                            .'
                        </span>';
                }?>
                <br>
                <div class="product_wrap">

                    <div class="container">
                        <div class="row">
                            <div class="span12">

                                <div id="check-accordion">
                                    <h5><small><i class="fa fa-phone"></i></small><a>Cuentanos tu opinión</a></h5>

                                    <div class="clearfix">
                                        <form id="contact-form" action="<?= base_url().'myAccount/sendMessage' ?>"
                method="post" class="billing-form clearfix">
                                            <fieldset>
                                                <label>support@decomixado.com</label>
                                                <label>+(772) 140 0372</label>
                                                <label>Mixquiahuala col centro #7, calle comxs</label>
                                            </fieldset>

                                            <label>Nombre *</label>
                                            <input type="text" name="customerName" id="customername" class="form-control" required style="width:100%;"/>
                                            <label>Correo *</label>
                                            <input type="text" name="customerEmail" id="customerEmail" class="form-control" required style="width:100%;"/>
                                            <label>Asunto *</label>
                                            <input type="text" name="contactSubject" class="form-control" id="contactSubject" style="width:100%;"/>
                                            <label>Mensaje</label>
                                            <input type="text" name="contactMessage" class="form-control" id="contactMessage" required style="width:100%;"/>
                                            <fieldset>
                                               
                                            </fieldset>
                                            <input type="submit" value="ENVIAR" class="red-button">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->