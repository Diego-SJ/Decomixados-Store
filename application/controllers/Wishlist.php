<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Category_model");
		$this->load->model("Cart_model");
		$this->load->model("Wishlist_model");
		if( $this->session->userdata('USER_ID') == NULL || 
			$this->session->userdata('USER_AT') == NULL) {  
            redirect(base_url().'login');  
        } 
    }

	public function index()
	{
		$iduser = $this->session->userdata('USER_ID');

		$cat = array (
			'categories' => $this->Category_model->getInfoCategories(),
			'items' => $this->Cart_model->getItemsCarHeader($iduser),
		);

		$productsWishlist = array(
			'products' => $this->Wishlist_model->getProductsWishlist($iduser),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('wishlist',$productsWishlist);
		$this->load->view('layout/footer',$cat);
	}

	public function add(){
		$idproduct = $this->input->get('idproduct');
		$iduser = $this->session->userdata('USER_ID');
		
		if($this->Wishlist_model->productExistInList($iduser,$idproduct)){
			echo 'ok';
		} else {
			$data = array(
				'iduser' => $iduser,
				'idproduct' => $idproduct,
			);
			if($this->Wishlist_model->addToWishlist($data)){
				// redirect(base_url()."wishlist");
				echo 'ok';
			} 
		}
	}

	public function remove($idsaves){
		if($this->Wishlist_model->deleteItemWishlist($idsaves)){
			redirect(base_url()."wishlist");
		} 
	}
}
