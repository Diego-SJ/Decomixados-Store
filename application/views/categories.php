

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
                                <h2>Categorías <span></span></h2>
                            </div>
                        </div>
                        <div class="row">

                        <?php if(!empty($categories)): ?>
                        <?php foreach($categories as $cat): ?>
                            <div class="span3 product">
                                <div>
                                    <figure>
                                        <a href=""><img src="<?= $cat->image ?>" alt=""></a>
                                        <div class="overlay">
                                            <a href="<?= $cat->image ?>" class="zoom prettyPhoto"></a>
                                            <a href="<?php echo base_url().'category/detail/'.$cat->idcategories; ?>" class="link"></a>
                                        </div>
                                    </figure>
                                    <div class="detail">
                                        <span><?= $cat->name ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <?php else: ?>
                            <div class="col-lg-12 col-sm-12 mb--30 text-center">
                                <h3>Sin registros.</h3>
                            </div>
                        <?php endif ?>

                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->

                