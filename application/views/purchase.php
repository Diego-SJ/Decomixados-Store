
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>DETALLES DE MI COMPRA</h1>
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
                            <form id="form-cancel-order" method="post" action="<?= base_url().'myAccount/cancelOrder'; ?>">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="pro-thumbnail">Imagen</th>
                                        <th>Prodcuto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(!empty($products)){ ?>
                                    <?php $index = 1; ?>
                                    <?php foreach($products as $product){ ?>
                                        <tr>
                                            <input name="fco_idsales" value="<?= $product->idsales; ?>" class="sr-only" hidden="hidden" type="text">
                                            <input name="fco_idproduct_<?= $index; ?>" value="<?= $product->idproduct; ?>" class="sr-only" hidden="hidden" type="text">
                                            <input name="fco_cuantity_<?= $index; ?>" value="<?= $product->quantity; ?>" class="sr-only" hidden="hidden" type="text">
                                            <input name="fco_totalitems" value="<?= $index; ?>" class="sr-only" hidden="hidden" type="text">
                                        </tr>
                                        <tr>
                                            <td class="pro-thumbnail">
                                                <a href="<?= base_url().'product/detail/'.$product->idproduct; ?>"><img src="<?= $product->image; ?>" style="width:100px;" alt="Product"></a>
                                            </td>
                                            <td class="pro-price"><?= $product->name; ?></td>
                                            <td class="pro-price"><?= $product->quantity; ?></td>
                                            <td class="pro-price"><?= $product->price_v; ?></td>
                                            <td class="pro-price">$<?= ($product->price_v * $product->quantity); ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'product/detail/'.$product->idproduct; ?>" class="sin-btn">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $index++; ?>
                                    <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <?php 
                                    if(!(empty($sale)) && strtolower($sale->status) == 'en proceso'){
                                        echo '
                                    <button onclick="myFunction()" type="button" class="btn btn--primary btn-cancel-order">
                                        <span class="icon-circle-with-cross"></span> Cancelar pedido
                                    </button>
                                        ';
                                    }
                                ?>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <!-- PRODUCT-OFFER -->
                <script>
                    function myFunction() {
                        if (window.confirm("Estas a punto de cancelar tu pedido ¿Estas seguro?")) { 
                            document.getElementById("form-cancel-order").submit(); 
                        }
                    }
                </script>
                