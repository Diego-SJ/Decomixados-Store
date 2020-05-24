
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>CARRITO DE COMPRAS</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BAR -->

                <br>
                <?php 
                if(!empty($this->session->flashdata("success"))){
                echo '<span class="text-warning" style="font-size: 25px; margin-left:20px;"> '.
                            $this->session->flashdata("success")
                            .'
                        </span>';
                }?>
                <br>
                <!-- PRODUCT-OFFER -->
                <div class="product_wrap">

                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <form method="post" action="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'cart/update':base_url().'login'); ?>" class="">
                                    <div class="shopping-cart">
                                    
                                        <ul class="title clearfix">
                                            <li>Imagen</li>
                                            <li class="second">Nombre producto</li>
                                            <li>Cantidad</li>
                                            <li>Precio</li>
                                            <li>Sub Total</li>
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
                                                <li><input type="number" name="quantity_<?= $index; ?>" min="1" value="<?= $product->quantity; ?>" required></li>
                                                <li>$<?= $product->price_v; ?></li>
                                                <li>$<?= ($product->price_v * $product->quantity); ?></li>
                                                <li class="last">
                                                    <form class="" method="post" action="<?= (!empty($this->session->userdata('USER_ID'))?base_url().'cart/remove/'.$product->idcart:base_url().'login'); ?>">
                                                        <button type="submit" class=""><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </li>
                                                <input name="idcart_<?= $index; ?>" type="text" class="sr-only" value="<?= $product->idcart; ?>" hidden>
                                                <input name="idproduct_<?= $index; ?>" type="text" class="sr-only" value="<?= $product->idproduct; ?>" hidden>
                                            </ul>
                                            <?php $index++; ?>
                                           
                                        <?php } ?>
                                        <input name="num_items" type="text" class="sr-only" value="<?= $index; ?>" hidden>
                                        <input type="submit" class="red-button black" name="update_cart" value="Actualziar ccarrito">
                                        <?php } else {
                                            echo '<h3>¡Aún no has gurdado ningún producto!</h3>';
                                        }  ?>
                                        
                                        <a href="<?= base_url() ?>" class="red-button">Continuar comprando</a>
                                        
                                    
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row cart-calculator clearfix">
                            <div class="span4">
                            </div>

                            <div class="span4">
                            </div>

                            <div class="span4 total clearfix">
                                <ul class="black">
                                    <li>Total:</li>
                                </ul>
                                <ul class="gray">
                                    <li><?= (!empty($total->total))?'$'.round($total->total):'$0.0'; ?></li>
                                </ul>
                                <?= (!empty($total->total))?'
                                    <a href="'. base_url().'checkout'.'" class="red-button">Proceder al checkout</a>':''; 
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <!-- PRODUCT-OFFER -->
                