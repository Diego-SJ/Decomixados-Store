<div class="modal-content">
    <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
        aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="product-details-modal">
        <div class="myaccount-table table-responsive text-center">
            <form id="form-cancel-order" method="post" action="<?= base_url().'myAccount/cancelOrder'; ?>">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="pro-thumbnail">Imagen</th>
                        <th>Prodcuto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acción</th>
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
                                    <span class="icon-eye"></span>
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
<script>
    function myFunction() {
        if (window.confirm("¿Seguro qué quieres cancelar tu pedido?")) { 
            document.getElementById("form-cancel-order").submit(); 
        }
    }
</script>