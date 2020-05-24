
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>PERFIL</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BAR -->

                <br>
                <!-- PRODUCT-OFFER -->
                <div class="blog_wrap">

                    <div class="container">
                        <div class="row">
                            <div class="span9 blog">
                                <!--COMMENTS-->
                                <div class="commnts-wrap">
                                    <ul class="comments">
                                        <li class="clearfix">
                                            <figure>
                                                <a><img src="<?= base_url().'assets/images/usuario.png' ?>" alt="user-img"></a>
                                            </figure>
                                            <div>
                                                <p><?= (!empty($profile))?$profile->name:''; ?> <?= (!empty($profile))?$profile->lname:''; ?></p>
                                                <p><?= (!empty($profile))?$profile->user:''; ?></p>
                                                <p><?= (!empty($profile))?$profile->email:''; ?></p>
                                                <p><?= (!empty($profile))?$profile->phone:''; ?></p>
                                                <p><a href="<?= base_url().'myAccount/myPurchases' ?>" class="text-error"><h1>Mis compras</h1></a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <?php 
                                if(!empty($this->session->flashdata("ups"))){
                                    echo '<span>
                                            <b style="color: #229954;"> '.
                                            $this->session->flashdata("ups").'</b> </span><br><br>';
                                } else if(!empty($this->session->flashdata("upe"))){
                                    echo '<span><b style="color: #EC1E14;">  '.
                                            $this->session->flashdata("upe") .'</b></span><br><br>';
                                }?>
                                <!--COMMENTS-->
                                <div class="commnts-wrap">
                                    <div class="contact-form">
                                        <h3>Actualizar perfil</h3>
                                        <form method="post" action="<?= base_url().'myAccount/updateProfile'; ?>">
                                            <fieldset>
                                                <input name="fp_name" type="text" value="<?= (!empty($profile))?$profile->name:''; ?>" placeholder="nombre" required>
                                                <input name="fp_lname"type="text" value="<?= (!empty($profile))?$profile->lname:''; ?>" placeholder="apellidos" required>
                                                <input name="fp_user" type="text" value="<?= (!empty($profile))?$profile->user:''; ?>" placeholder="usuario" required>
                                            </fieldset>
                                            <input name="fp_phone" type="text" minlength="10" maxlength="10" value="<?= (!empty($profile))?$profile->phone:''; ?>" placeholder="teléfono">
                                            <input name="fp_email" type="text" value="<?= (!empty($profile))?$profile->email:''; ?>" placeholder="correo" required>
                                            <input type="submit" value="Actualizar">
                                        </form>
                                    </div>
                                </div>
                                <br><br><br>
                                <hr>
                                <div class="commnts-wrap">
                                    <div class="contact-form">
                                        <h3>Actualizar contraseña</h3>
                                        <form method="post" action="<?= base_url().'myAccount/updatePassword'; ?>">
                                            <fieldset>
                                                <input id="fup_current_pass" name="fup_current_pass" placeholder="Contraseña actual" type="text" minlength="8" placeholder="contraseña actual" required>
                                                <input id="fup_new_pass" name="fup_new_pass" placeholder="Nueva contraseña" type="text" minlength="8" placeholder="nueva contraseña" required>
                                            </fieldset>
                                            <input id="btn-fup" type="submit" value="Actualizar">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="span3">
                                <div id="sidebar2">

                                    <div class="widget">
                                        <h4>CATEGORIES</h4>
                                        <ul>
                                        <?php 
                                            if(!empty($categories)){
                                                foreach($categories as $category){ 
                                                echo '<li><a href="'.base_url().'category/detail/'.$category->idcategories.'">'.ucwords($category->name).'</a></li>'; 
                                                }  
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
                <br>