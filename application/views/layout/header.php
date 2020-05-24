<!doctype html>
<html lang="en-US"> 
		<head>
				<!-- META TAGS -->
				<meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width" />
                
                <!-- favicon -->
				<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo.png">
				
				<!-- Title -->
				<title>DECOMIXADOS</title>
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,600,800' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>

				<!-- Style Sheet-->
                <link rel="stylesheet" href="<?= base_url(); ?>assets/css/tooltipster.css">
                <link rel="stylesheet" href="<?= base_url(); ?>assets/css/ie.css" media="all">
                <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
                <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
				<link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css">
                <link rel="stylesheet" href="<?= base_url(); ?>assets/css/prettyPhoto.css">
                <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.min.css">

                <script src="<?= base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
		</head>
		<body>		
                <input id="base_url" type="text" value="<?= base_url(); ?>" readonly style="display: none;">		
				<!-- HEADER -->
				<div class="header-bar">
                    <div class="container">
                        <div class="row">
                            <div class="pric-icon span2">
                                <a href="#" class="fb"><i class="fa fa-phone"></i> (772) 543 6777</a>
                                <a href="#" class="twet"><i class="fa fa-facebook"></i></a>
                            </div>

                            <div class="span10 right">
                                <div class="social-strip">
                                    <ul>
                                        <?php 
                                        if($this->session->userdata('USER_ID') != NULL || 
                                        $this->session->userdata('USER_AT') != NULL){
                                            echo '<li><a href="'.base_url().'myAccount" class="account">Mi cuenta</a></li>';
                                            echo '<li><a href="'.base_url().'wishlist" class="wish">Favoritos</a></li>';
                                            echo '<li><a href="'.base_url().'home/logoutu" class="check">Cerrar sesión</a></li>';
                                        } else {
                                            echo '<li><a href="'.base_url().'login" class="account">Iniciar sesión</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>

                <div class="header-top">
                    <div class="container">
                        <div class="row">

                            <div class="span5">
                                <div class="logo">
                                    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo.png" alt=""></a>
                                    <h1><a href="<?= base_url() ?>">DECOMIX<span>ADOS</span></a></h1>
                                </div>
                            </div>

                            <div class="span5">
                                <form method="post" action="<?= base_url().'product/search' ?>">
                                    <input name="searchInput" minlength="1"  type="text" placeholder="Buscar productos" important>
                                    <input type="submit" value="">
                                </form>
                            </div>

                            <div class="span2">
                                <div class="cart">
                                    <ul>
                                        <li class="first"><a href="<?= base_url().'cart'; ?>"></a><span></span></li>
                                        <li id="tic"><?= (!empty($items->items))?$items->items:'0' ?> item(s)</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <header>
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <nav class="desktop-nav">
                                    <ul class="clearfix">
                                        <li>
                                            <a href="<?= base_url(); ?>">INICIO</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url().'category' ?>">Categorías</a>
                                            <ul class="clearfix sub-menu menu-three">
                                                <li class="clearfix">
                                                    <div class="links">
                                                        <p>
                                                        <?php 
                                                        if(!empty($categories)){
                                                            foreach($categories as $category){ 
                                                            echo '<a href="'.base_url().'category/detail/'.$category->idcategories.'">'.ucwords($category->name).'</a>'; 
                                                            }  
                                                        } ?>
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?= base_url().'home/aboutus'; ?>">nosotros </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url().'home/contact'; ?>">contacto</a>
                                        </li>
                                    </ul>
                                </nav>

                                <select>
                                    <option><a href="<?= base_url(); ?>">Inicio</a></option>
                                    <option><a href="<?= base_url().'category' ?>">Categorías</a></option>
                                    <option><a href="<?= base_url().'home/aboutus'; ?>">Nosotros</a></option>
                                    <option> <a href="<?= base_url().'home/contact'; ?>">Contacto</a></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </header>
				<!-- HEADER -->