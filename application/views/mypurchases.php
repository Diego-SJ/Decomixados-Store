
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="title-bar">
                                    <h1>MIS COMPRAS</h1>
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
                                    
                                    <table class="table table-bordered">
                                        <thead class="">
                                            <tr>
                                            <th>#</th>
                                            <th>Fecha y hora</th>
                                            <th>Estado</th>
                                            <th>Total</th>
                                            <th>Forma de pago</th>
                                            <th>Acción</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php 
                                        if(!empty($shopping)){
                                            $index = 1; 
                                            foreach($shopping as $shopp){ 

                                            if($shopp->status == 'cancelado'){
                                                echo '
                                                <tr>
                                                <td>'.$index.'</td>
                                                <td>'.$shopp->date.'</td>
                                                <td>'.$shopp->status.'</td>
                                                <td>$'.$shopp->total.'</td>
                                                <td>'.$shopp->way2pay.'</td>
                                                <td>
                                                   <span class="text-error">cancelaste esta compra</span>
                                                </td>
                                                </tr>
                                                '; 
                                            } else {
                                                echo '
                                                <tr>
                                                <td>'.$index.'</td>
                                                <td>'.$shopp->date.'</td>
                                                <td>'.$shopp->status.'</td>
                                                <td>$'.$shopp->total.'</td>
                                                <td>'.$shopp->way2pay.'</td>
                                                <td>
                                                    <a href="'.base_url().'myAccount/purchase?idsales='.$shopp->idsales.'"><i class="fa fa-plus" style="font-size: 20px;"></i> ver compra</a>
                                                </td>
                                                </tr>
                                                ';  
                                            }
                                            $index++; 
                                            }
                                        }?>
                                        </tbody>
                                    </table>
                                        
                                    <a href="<?= base_url() ?>" class="red-button">Continuar comprando</a>
                                        
                                    
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <!-- PRODUCT-OFFER -->
                