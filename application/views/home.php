
                <?php if(!empty($offer)): ?>
                <div class="wrapper">
                    <div class="container">
                        <div class="row ">
                            <!-- SLIDER -->
                            <div class="span12 slider">
                                <div class="slider-slides">
                                <?php foreach($offer as $m): ?>
                                    <div class="slides">
                                        <a href="<?= base_url().'product/detail/'.$m->idproduct; ?>"><img src="<?= $m->image ?>" alt=""></a>
                                        <div class="overlay">
                                            <h1><?= $m->name ?></h1>
                                            <p><?= $m->description ?></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                </div>
                                <a href="#" class="next"></a>
                                <a href="#" class="prev"></a>
                                <div class="slider-btn"></div>
                            </div>
                            <!-- SLIDER -->

                        </div>
                    </div>
                </div>
                <?php endif ?>

                <!-- PRODUCT-OFFER -->
                <div class="product_wrap">
                    <div class="container">
                        <div class="row heading-wrap">
                            <div class="span12 heading">
                                <h2>Últimos productos <span></span></h2>
                            </div>
                        </div>
                        <div class="row">
                        <?php if(!empty($products)): ?>
                        <?php foreach($products as $product): ?>
                            <div class="span3 product">
                                <div>
                                    <figure>
                                        <a href="#"><img src="<?= $product->image ?>" style=""></a>
                                        <div class="overlay">
                                            <a href="<?= $product->image2 ?>" class="zoom prettyPhoto"></a>
                                            <a href="<?= base_url().'product/detail/'.$product->idproduct; ?>" class="link"></a>
                                        </div>
                                    </figure>
                                    <div class="detail">
                                        <span>$<?= $product->price_v ?></span>
                                        <h4 class="elipsis"><?= $product->name ?></h4>
                                        <div class="icon">
                                        <?php 
                                        if($product->stock>0){ ?>
                                            <a class="one btn-add-to-my-car" addCar="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'cart/add?idproduct='.$product->idproduct:base_url().'login'); ?>" title=""></a>
                                            <a class="two btn-add-to-my-wish" addWish="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'Wishlist/add?idproduct='.$product->idproduct:base_url().'login'); ?>" title=""></a>
                                        <?php } else { ?>
                                            <a class="two btn-add-to-my-wish" addWish="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'Wishlist/add?idproduct='.$product->idproduct:base_url().'login'); ?>" title=""></a>
                                        <?php }  ?>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <?php else: ?>
                            <div class="span3 product">
                            <h3>Aún no hay registros.</h3>
                            </div>
                        <?php endif ?>

                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
                

                