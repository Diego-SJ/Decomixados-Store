
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>RESULTADOS</h1>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="span12">
                                <div class="sorting-bar clearfix">
                                    <div>
                                        <form id="frm_sort_category" method="post" 
                                        action="<?php echo base_url().'product/search'; ?>">
                                            <label>Ordenar por: </label>
                                            <select id="sort_by" name="sort_by">
                                                <option value="1" <?php if(!empty($sort_selected) && $sort_selected == 1){echo 'selected';} ?>>Default</option>
                                                <option value="2" <?php if(!empty($sort_selected) && $sort_selected == 2){echo 'selected';} ?>>nombre A-Z</option>
                                                <option value="3" <?php if(!empty($sort_selected) && $sort_selected == 3){echo 'selected';} ?>>nombre Z-A</option>
                                                <option value="4" <?php if(!empty($sort_selected) && $sort_selected == 4){echo 'selected';} ?>>precio -+</option>
                                                <option value="5" <?php if(!empty($sort_selected) && $sort_selected == 5){echo 'selected';} ?>>precio +-</option>
                                                <option value="6" <?php if(!empty($sort_selected) && $sort_selected == 6){echo 'selected';} ?>>cat A-Z</option>
                                                <option value="7" <?php if(!empty($sort_selected) && $sort_selected == 7){echo 'selected';} ?>>cat Z-A</option>
                                            </select>
                                        </form>
                                    </div>

                                    <div class="show">
                                        
                                    </div>

                                    <div class="sorting-btn clearfix">
                                    <!-- <label>Mostrando 5 p.</label> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BAR -->

                <!-- PRODUCT-OFFER -->
                <div class="product_wrap">

                    <div class="container">
                        <div class="row">
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

                            <div class="span9 product-grid">
                                <div class=" clearfix">
                                    
                                <?php if(!empty($products)): ?>
                                <?php foreach($products as $product): ?>
                                    <div class="span3 product">
                                        <div>
                                            <figure>
                                                <a href="#"><img src="<?= $product->image ?>" alt=""></a>
                                                <div class="overlay">
                                                    <a href="<?= $product->image2 ?>" class="zoom prettyPhoto"></a>
                                                    <a href="<?= base_url().'product/detail/'.$product->idproduct; ?>" class="link"></a>
                                                </div>
                                            </figure>
                                            <div class="detail">
                                                <span>$<?= $product->price_v ?></span>
                                                <h4><?= $product->name ?></h4>
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
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
                