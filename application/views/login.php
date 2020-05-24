
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>INICIO DE SESIÓN</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BAR -->

                <br>
                <!-- PRODUCT-OFFER -->
                <div class="product_wrap">

                <div class="container">
                        <div class="row">
                            <div class="span2"></div>
                            <div class="span8">

                                <div id="check-accordion">

                                    <h5><small><i class="fa fa-user"></i></small><a href="#">Iniciar sesión</a></h5>

                                    <div class="clearfix">
                                        <div class="span6 cheakout clearfix register">
                                            <div id="resp_log" class="col-12">
                                                <label id="resp_msg_log" style="color:red;"></label>
                                            </div>
                                            <form id="frm_login" class="clearfix" method="post" action="<?= base_url().'Login/startLoginFromLogin'; ?>">
                                                <label>Correo</label>
                                                <input id="log_user" type="text" placeholder="correo"><br/>
                                                <label>Contraseña</label>
                                                <input id="log_password" type="password" placeholder="*************"><br/>
                                                <input type="submit" value="Iniciar sesión">
                                            </form>
                                        </div>
                                    </div>

                                    <h5><small><i class="fa fa-plus"></i></small><a href="#">Registrarme</a></h5>

                                    <div class="clearfix">
                                        <div class="span6 cheakout clearfix register">
                                            <div id="resp_reg" class="col-12 mb--20">
                                                <label id="resp_msg" style="color:red;"></label>
                                            </div>
                                            <form class="clearfix" id="frm_register" method="post" action="<?php echo base_url().'Login/register'; ?>">
                                                <label>Nombre</label>
                                                <input id="reg_name" name="reg_name" type="text" placeholder="Nombre(s)" required><br/>
                                                <label>Apellidos</label>
                                                <input id="reg_lname" name="reg_lname" type="text" placeholder="Apellidos" required><br/>
                                                <label>Correo</label>
                                                <input id="reg_email" name="reg_email"  type="email" placeholder="Correo" required><br/>
                                                <label>Usuario</label>
                                                <input id="reg_user" name="reg_user" type="text" minlength="8" placeholder="Usuario" required><br/>
                                                <label>Teléfono</label>
                                                <input id="reg_phone" name="reg_phone" type="text" minlength="10" maxlength="10" placeholder="Teléfono" required><br/>
                                                <label>Contraseña</label>
                                                <input id="reg_password" name="reg_password" type="password" minlength="8" placeholder="*************" required><br/>
                                                <label>Confirmar contraseña</label>
                                                <input id="conf_pass" type="password" minlength="8" placeholder="*************" required><br/>
                                                <input type="submit" value="Registrarme">
                                            </form>
                                        </div>
                                    </div>

                                    <!-- <h5><small><i class="fa fa-refresh"></i></small><a href="#">Recuperar contraseña</a></h5>

                                    <div class="clearfix">
                                        <div class="span6 cheakout clearfix register">
                                            <h6>Ingresa tu correo electrónico, te enviaremos un link de recuperación.</h6>
                                            <form class="clearfix">
                                                <label>Correo</label>
                                                <input type="text" placeholder="Correo"><br/>
                                                <input type="submit" value="Enviar">
                                            </form>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
                