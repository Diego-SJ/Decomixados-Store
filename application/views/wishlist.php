
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>FAVORITOS</h1>
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
                            <div class="span12">
                                <div class="shopping-cart">

                                    <ul class="title clearfix">
                                        <li>Imagen</li>
                                        <li class="second">Nombre producto</li>
                                        <li>Precio</li>
                                        <li class="last">Acción</li>
                                    </ul>

                                    <?php if(!empty($products)){ ?>
                                    <?php $index = 1; ?>
                                    <?php foreach($products as $product){ ?>
                                        <ul class="clearfix">
                                            <li>
                                                <figure><img src="<?= $product->image; ?>" style="width: 50% !important; heigth: 90% !important;"></figure>
                                            </li>
                                            <li class="second">
                                                <h4>
                                                    <form method="post" action="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'product/detail/'.$product->idproduct:base_url().'login'); ?>">
                                                        <button type="submit" class=""><?= $product->name; ?></button>
                                                    </form>
                                                </a>
                                                </h4>
                                            </li>
                                            <li>$<?= $product->price_v; ?></li>
                                            <li class="last">
                                                <form class="" method="post" action="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'wishlist/remove/'.$product->idsaves:base_url().'login'); ?>">
                                                    <button type="submit" class=""><i class="fa fa-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                        <?php $index++; ?>
                                    <?php } ?>
                                    <?php } else {
                                        echo '<h3>¡Aún no has gurdado ningún producto!</h3>';
                                    }  ?>
                                    
                                    <a href="<?= base_url() ?>" class="red-button">Continuar comprando</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <!-- PRODUCT-OFFER -->
                