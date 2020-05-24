
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>CHECKOUT</h1>
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
                                <form class="clearfix"  method="post" action="<?= base_url().'Checkout/saveSale'; ?>">
                                <div id="check-accordion">

                                    <h5><small>PASO 1</small><a href="#">DIRECCIÓN DE ENVÍO</a></h5>

                                    <div class="clearfix">
                                        <div class="span8" style="background: #f0f0f0 !important; border: 0px;">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label>Nombre</label>
                                                    </td>
                                                    <td style="padding-left: 20px;">
                                                        <input name="cho_name" type="text"  placeholder="Nombre(s)" required><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Teléfono</label>
                                                    </td>
                                                    <td style="padding-left: 20px;">
                                                        <input name="cho_phone" type="text" pattern="\d*" minlength="10" maxlength="10" class="on" required><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <label>Apellidos</label>
                                                    </td>
                                                    <td style="padding-left: 20px;">
                                                    <input name="cho_lname" type="text" placeholder="Apellidos" required/><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <label>Correo</label>
                                                    </td>
                                                    <td style="padding-left: 20px;">
                                                    <input name="cho_email" type="email" placeholder="Correo" required><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <label>Address</label>
                                                    </td >
                                                    <td style="padding-left: 20px;">
                                                    <input name="cho_address" type="text" maxlength="500" placeholder="Dirección" required><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <label>Ciudad</label>
                                                    </td>
                                                    <td style="padding-left: 20px;">
                                                    <input id="kkkkk" name="cho_city" type="text" placeholder="Ciudad" required><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <label>Código postal</label>
                                                    </td>
                                                    <td style="padding-left: 20px;">
                                                    <input name="cho_zip" type="text" pattern="\d*" minlength="5" maxlength="5" class="on" required><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <label>Estado</label>
                                                    </td>
                                                    <td style="padding-left: 20px;">
                                                    <input name="cho_state" type="text" placeholder="Estado" required><br>
                                                    </td>
                                                </tr>
                                            </table>
                                           
                                        </div>
                                    </div>

                                    <h5><small>PASO 2</small><a href="#">MÉTODO DE PAGO</a></h5>

                                    <div class="clearfix">
                                        <div class="payment">
                                            <p>Por favor selecciona tu método de pago preferido para esta orden..</p>

                                            <div>
                                                <div class="radio-btn">
                                                    <input value="tarjeta de credito" name="pm_w2p" type="radio" required>
                                                    <label>Tarjeta de credito</label>
                                                </div>
                                                <div class="radio-btn">
                                                    <input value="paypal" name="pm_w2p" type="radio" required>
                                                    <label>Paypal</label>
                                                </div>
                                                <div class="radio-btn">
                                                    <input value="pago por oxxo" name="pm_w2p" type="radio" required>
                                                    <label>Oxxo</label>
                                                </div>
                                                <div class="radio-btn">
                                                    <input value="efectivo" name="pm_w2p" type="radio" required>
                                                    <label>Efectivo</label>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <h1><small>CONFIRMAR ORDEN</small></h1><br>
                                    
                                    <div class="clearfix">
                                    <input class="sr-only" hidden="hidden" type="text" name="pm_total" value="<?= (!empty($total->total))?round(($total->total)*1.16,2):'0.0'; ?>">
                                        <div class="billing">
                                            <ul class="title">
                                                <li>Producto</li>
                                                <li>Cantidad</li>
                                                <li>Precio</li>
                                                <li class="last">Total</li>
                                            </ul>

                                            <?php 
                                            if(!empty($products)){ 
                                                $index = 1; 
                                                foreach($products as $product){ 
                                                    echo '
                                                    <ul>
                                                        <li>'.strtolower($product->name).'</li>
                                                        <li>'.($product->quantity).'</li>
                                                        <li>$'.($product->price_v).'</li>
                                                        <li class="last">$'.($product->price_v*$product->quantity).'</li>
                                                    </ul>';
                                                    echo '<input class="sr-only" hidden="hidden" type="text" name="pm_idproduct_'.$index.'" value="'.$product->idproduct.'">';
                                                    echo '<input class="sr-only" hidden="hidden" type="text" name="pm_quantity_'.$index.'" value="'.$product->quantity.'">';
                                                    $index++; 
                                                }
                                                echo '<input class="sr-only" hidden="hidden" type="text" name="pm_items" value="'.$index.'">';
                                            }?>
                                            

                                            <div class="totle">
                                                <ul>
                                                    <li>Sub-Total: <span><?= (!empty($total->total))?'$'.$total->total: '$0.0'; ?></span></li>
                                                    <li>IVA: <span><?= (!empty($total->total))?'$'.round(($total->total)*0.16,2):'$0.0'; ?></span></li>
                                                    <li>Total: <span><?= (!empty($total->total))?'$'.round(($total->total)*1.16,2):'$0.0'; ?></span></li>
                                                </ul>
                                                
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <button type="submit" class="red-button" >Finalizar pedido</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
<script>
    $(document).ready(function(){
        console.log('ready');
        $('.on').on('input', function () { 
            if($(this).val() == '0000000000'){
                alert('Ingresa un número valido')
            } else {
                this.value = this.value.replace(/[^0-9]/g,'');
            }
        });
    });
</script>