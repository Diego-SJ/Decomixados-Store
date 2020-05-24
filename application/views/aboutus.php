
                <!-- BAR -->
                <div class="bar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="">
                                <div class="title-bar">
                                    <h1>NOSOTROS</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BAR -->

                <br>
                <!-- PRODUCT-OFFER -->
                <div class="blog_wrap">
                    <div class="container">
                        <div class="row">
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

                            <div class="span9 blog">

                                <article class="clearfix">
                                    <h2 class="tag">Objetivo</h2>
                                    <p>Ofrecer tanto para minoristas y mayoristas la venta de comics y 
                                        merchandising de productos relacionados al mundo de los comics, 
                                        donde no solo el cliente compre si no también pueda recibir 
                                        asesoramientos acerca de los productos que se ofrecen.
                                    </p>
                                    <hr>
                                    <h2 class="tag">Misión</h2>
                                    <p>Somos una empresa destinada al comercio de cómics, con el fin de promover el 
                                        arte visual en dibujo en los jóvenes del país con una amplia gama de géneros 
                                        orientados a la diversificación de gustos y preferencias.
                                    </p>
                                    <hr>
                                    <h2 class="tag">Visión</h2>
                                    <p>
                                    Ser líderes y distribuidores en el mercado de la industria del comic de carácter
                                     local, pero con una proyección global, satisfaciendo las necesidades y gustos 
                                     alternativos de los lectores y personas, que gusten de este arte con una amplia
                                      gama de productos de buena calidad.
                                    </p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT-OFFER -->
                