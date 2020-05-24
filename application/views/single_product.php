
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>JACKETS</h1>
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
                            <div class="span9">
                                <div class="single clearfix">
                                    <div class="wrap span5">
                                        <div id="carousel-wrapper">
                                            <div id="carousel" class="cool-carousel">
                                                <?php if(!empty($product->image)){echo '<span id="image1"><img src="'.$product->image.'" alt=""/></span>';} else {} ?>
                                                <?php if(!empty($product->image2)){echo '<span id="image1"><img src="'.$product->image2.'" alt=""/></span>';} else {} ?>
                                                <?php if(!empty($product->image3)){echo '<span id="image1"><img src="'.$product->image3.'" alt=""/></span>';} else {} ?>
                                                <?php if(!empty($product->image4)){echo '<span id="image1"><img src="'.$product->image4.'" alt=""/></span>';} else {} ?>
                                            </div>
                                            <a href="#" class="prev"></a><a href="#" class="next"></a>
                                        </div>

                                        <div class="bottom">
                                            <div id="thumbs-wrapper">
                                                <div id="thumbs">
                                                    <?php if(!empty($product->image)){echo '<a href="#image1" class="selected"><img src="'.$product->image.'" alt="" /></a>';} else {} ?>
                                                    <?php if(!empty($product->image2)){echo '<a href="#image2"><img src="'.$product->image2.'" alt="" /></a>';} else {} ?>
                                                    <?php if(!empty($product->image3)){echo '<a href="#image3"><img src="'.$product->image3.'" alt="" /></a>';} else {} ?>
                                                    <?php if(!empty($product->image4)){echo '<a href="#image4"><img src="'.$product->image4.'" alt="" /></a>';} else {} ?>
                                                </div>
                                                <a id="prev" href="#"></a>
                                                <a id="next" href="#"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="span4">
                                        <div class="product-detail">
                                            <h4><?php if(!empty($product)){echo strtoupper($product->name);} else {echo 'No se pudo cargar';} ?></h4>
                                            <span><?php if(!empty($product)){echo '$'.$product->price_v;} else {echo 'No se pudo cargar!';} ?></span>
                                            <p>
                                                <?php if(!empty($product)){echo ucfirst($product->description);} else {echo 'No se pudo cargar!';} ?>
                                            </p>
                                        </div>
                                        <div class="product-type clearfix">
                                            <div>
                                                <label>Stock</label>
                                                <label><?php if(!empty($product)){echo ($product->stock < 1)?'Agotado':$product->stock;} else {echo 'No s epudo cargar!';} ?></label>
                                            </div>
                                        </div>

                                        <div class="buttons">
                                            <?php 
                                            if($product->stock>0){ ?>
                                                <a class="cart big-button btn-add-to-my-car" addCar="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'cart/add?idproduct='.$product->idproduct:base_url().'login'); ?>" title="">Agregar al carrito</a>
                                                <a class="wish big-button btn-add-to-my-wish" addWish="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'Wishlist/add?idproduct='.$product->idproduct:base_url().'login'); ?>" title="">Favoritos</a>
                                            <?php } else { ?>
                                                <a class="wish big-button btn-add-to-my-wish" addWish="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'Wishlist/add?idproduct='.$product->idproduct:base_url().'login'); ?>" title="">Favoritos</a>
                                            <?php }  ?>  
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="span3">
                                <div id="sidebar2">

                                    <div class="widget">
                                        <h4>CATEGORÍAS</h4>
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
                