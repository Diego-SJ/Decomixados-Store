<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Category_model");
		$this->load->model("Cart_model");
		$this->load->model("Product_model");

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

		$productsCar = array(
			'products' => $this->Cart_model->getProductsCar($iduser),
			'total' => $this->Cart_model->getTotalCar($iduser),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('cart',$productsCar);
		$this->load->view('layout/footer',$cat);
	}

	public function add(){
		$idproduct = $this->input->get('idproduct');
		$iduser = $this->session->userdata('USER_ID');

		if($this->Cart_model->productExistInCar($iduser,$idproduct)){

			$row = $this->Cart_model->getQuantityProductCar($iduser,$idproduct);
			$idcar = $row['idcart'];
			$data = array(
				'quantity' => ($row['quantity']+1),
			);
			if($this->Cart_model->updateToCar($data,$idcar)){
				// redirect(base_url()."cart");
				$items = $this->Cart_model->getItemsCar($iduser);

				echo $items['items'].'';
			} 
		} else {
			$data = array(
				'iduser' => $iduser,
				'idproduct' => $idproduct,
			);
			if($this->Cart_model->addToCar($data)){
				$items = $this->Cart_model->getItemsCar($iduser);

				echo $items['items'].'';
			} 
		}
	}

	public function remove($idcar){
		if($this->Cart_model->deleteItemCar($idcar)){
			redirect(base_url()."cart");
		} 
	}

	public function update(){
		
		$num_items = $this->input->post('num_items');

		for($i = 1; $i < $num_items; $i++){
			$idcar = $this->input->post('idcart_'.$i);
			$data = array(
				'quantity'  => $this->input->post('quantity_'.$i),
			);

			$this->Cart_model->updateToCar($data,$idcar);
		}
		redirect(base_url()."cart");
	}
}
