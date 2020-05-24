<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Category_model");
		$this->load->model("Cart_model");
		$this->load->model('Checkout_model');
		$this->load->model("Product_model");

		if( $this->session->userdata('USER_ID') == NULL || 
			$this->session->userdata('USER_AT') == NULL) {  
            redirect(base_url().'login');  
		} 
		
		$iduser = $this->session->userdata('USER_ID');
		if($this->Cart_model->carIsEmpty($iduser) == true){
			$this->session->set_flashdata('success', '¡Primero agrega productos a tu carrito!');  
			redirect(base_url().'Cart');  
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
			'addresses' => $this->Checkout_model->getAddresses($iduser),
		);

		if(!$this->Cart_model->carIsEmpty($iduser)){
			$this->load->view('layout/header',$cat);
			$this->load->view('checkout',$productsCar);
			$this->load->view('layout/footer',$cat);
		} else {
			$this->session->set_flashdata('success', '¡Primero agrega productos a tu carrito!');  
			redirect(base_url().'Cart');  
		}

		
	}

	public function saveSale(){
		
			$iduser = $this->session->userdata('USER_ID');
			
			$address_frm =  ucwords(trim($this->input->post('cho_name'))).' '.
						ucwords(trim($this->input->post('cho_lname'))).', '.
						ucwords(trim($this->input->post('cho_address'))).', '.
						ucwords(trim($this->input->post('cho_city'))).', '.
						ucwords(trim($this->input->post('cho_state'))).', '.
						trim($this->input->post('cho_zip')).'. '.
						trim($this->input->post('cho_phone')).' - '.
						trim($this->input->post('cho_email'));
			$w2p         = trim($this->input->post('pm_w2p'));
			$total       = trim($this->input->post('pm_total'));
			$totalItems  = trim($this->input->post('pm_items'));

			$saleSaves = array(
				'date'    => date('Y-m-d H:i:s'),
				'total'   => $total,
				'address' => $address_frm,
				'way2pay' => $w2p,
				'iduser'  => $iduser,
			);

			if($idsale = $this->Checkout_model->saveSale($saleSaves)){
				for($i = 1; $i < $totalItems; $i++){
					$idproduct = $this->input->post('pm_idproduct_'.$i);
					$quantity  = $this->input->post('pm_quantity_'.$i);
		
					$row = $this->Product_model->getInfoProductArray($idproduct);
					$updateStock = array(
						'stock' => (($row['stock'])-$quantity),
					);

					if($this->Product_model->updateStockProduct($updateStock,$idproduct)){
						$data2 = array(
							'idsales'  => $idsale,
							'idproduct' => $this->input->post('pm_idproduct_'.$i),
							'quantity' => $this->input->post('pm_quantity_'.$i),
						);

						if($this->Checkout_model->saveSaleProduct($data2)){
							if($this->Cart_model->dumpCar($iduser)){
								$response = true;
							}
						} else {
							$response = false;
						}
					}
				}
			} else {
				$this->session->set_flashdata('success', 'No se pudo guardar la compra');  
				redirect(base_url().'cart');  
			}

			if($response){
				$this->session->set_flashdata('success', '¡Gracias por tu compra, tu pedido está en proceso! Puedes revisar los detalles aquí abajo.');  
				redirect(base_url().'myAccount/myPurchases');  
			} else {
				$this->session->set_flashdata('success', '¡No hemos podido enviar tus prodyctos, intenta mas tarde!');  
				redirect(base_url().'myAccount/myPurchases');  
			}

	}
	
	public function payment_method($idaddress){
		$iduser = $this->session->userdata('USER_ID');
		$cat = array (
			'categories' => $this->Category_model->getInfoCategories(),
		);

		$productsCar = array(
			'products' => $this->Cart_model->getProductsCar($iduser),
			'total' => $this->Cart_model->getTotalCar($iduser),
			'address' => $this->Checkout_model->getAddress($idaddress),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('payment_method',$productsCar);
		$this->load->view('layout/footer',$cat);
	}

	public function finishPurchase(){
		$iduser      = $this->session->userdata('USER_ID');
		$total       = trim($this->input->post('pm_total'));
		$w2p         = trim($this->input->post('pm_w2p'));
		$address     = trim($this->input->post('pm_address'));
		$totalItems  = trim($this->input->post('pm_items'));
		$response    = false;

		$data = array(
			'date'    => date('Y-m-d H:i:s'),
			'total'   => $total,
			'address' => $address,
			'way2pay' => $w2p,
			'iduser'  => $iduser,
		);

		if($idsale = $this->Checkout_model->saveSale($data)){
			for($i = 1; $i < $totalItems; $i++){
				$idproduct = $this->input->post('pm_idproduct_'.$i);
				$quantity  = $this->input->post('pm_quantity_'.$i);
	
				$row = $this->Product_model->getInfoProductArray($idproduct);
				$updateStock = array(
					'stock' => (($row['stock'])-$quantity),
				);

				if($this->Product_model->updateStockProduct($updateStock,$idproduct)){
					$data2 = array(
						'idsales'  => $idsale,
						'idproduct' => $this->input->post('pm_idproduct_'.$i),
						'quantity' => $this->input->post('pm_quantity_'.$i),
					);

					if($this->Checkout_model->saveSaleProduct($data2)){
						if($this->Cart_model->dumpCar($iduser)){
							$response = true;
						}
					} else {
						$response = false;
					}
				}
			}
		} else {
			$this->session->set_flashdata('error', '¡Algo salió mal durante la compra, intenta más tarde!');  
			redirect(base_url().'checkout');  
		}

		if($response){
			$this->session->set_flashdata('success', '¡Gracias por tu compra, tu pedido está en proceso! Puedes revisar los detalles aquí abajo.');  
			redirect(base_url().'myAccount');  
		} else {
			$this->session->set_flashdata('error', '¡Algo salió mal durante la compra, intenta más tarde!');  
			redirect(base_url().'checkout');  
		}
	}
}
