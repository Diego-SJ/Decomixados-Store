<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyAccount extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Category_model");
		$this->load->model("MyAccount_model");
		$this->load->model("Product_model");
		$this->load->model("Login_model");
		$this->load->model("Cart_model");
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

		$myaccount = array(
			'profile'   => $this->MyAccount_model->getMyProfile($iduser),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('myaccount',$myaccount);
		$this->load->view('layout/footer',$cat);
	}

	public function orderDetail($idsales){
        $data = array( 
			'products' => $this->MyAccount_model->getMyShoppingDetail($idsales),
			'sale' => $this->MyAccount_model->getInfoSale($idsales),
		);
        $this->load->view("popup/detail", $data);
	}
	
	public function cancelOrder(){
		$response   = false;
		$iduser     = $this->session->userdata('USER_ID');
		$idsales    = trim($this->input->post('fco_idsales'));
		$totalItems = trim($this->input->post('fco_totalitems'));

		for($i = 1; $i <= $totalItems; $i++){
			$idproduct = $this->input->post('fco_idproduct_'.$i);
			$quantity  = $this->input->post('fco_cuantity_'.$i);

			$row = $this->Product_model->getInfoProductArray($idproduct);
			$updateStock = array(
				'stock' => (($row['stock'])+$quantity),
			);

			if($this->Product_model->updateStockProduct($updateStock,$idproduct)){
				$response = true;
			} else {
				$response = false;
			}
		}

		if($response){
			if($this->MyAccount_model->cancelOrder($idsales)){
				$this->session->set_flashdata('success', 'Pedido cancelado con éxito.');  
				redirect(base_url().'myAccount/myPurchases');  
			}
		}
	}

	public function updateProfile(){
		$iduser = $this->session->userdata('USER_ID');

		$data = array(
			'name'   => trim($this->input->post('fp_name')),
			'lname'  => trim($this->input->post('fp_lname')),
			'user'   => trim($this->input->post('fp_user')),
			'email'  => trim($this->input->post('fp_email')),
			'phone'  => trim($this->input->post('fp_phone')),
		);

		if($this->MyAccount_model->updateMyProfile($data,$iduser)){
			if($this->Login_model->getLogin($iduser)){
				$row = $this->Login_model->getLogin($user_email);
	
				$id        = $row['iduser'];
				$name      = $row['name'];
				$name_complete = $row['name']." ".$row['lname'];
				$user      = $row['user'];
				$password  = $row['password'];
				$phone     = $row['phone'];
				$status    = $row['status'];
				$acces_type = $row['access_type'];
	
				//SESSIONS STRAT
				$session_data = array(
					'USER_ID'      => $id,
					'USER_NAME'    => $name,
					'USER_NAME_C'  => $name_complete,
					'USER_USER'    => $user,
					'USER_PASS'    => $password,
					'USER_PHONE'   => $phone,
					'USER_STATUS'  => $status,
					'USER_AT' => $acces_type,
				);
				$this->session->set_userdata($session_data); 
			}
			$this->session->set_flashdata('ups', 'Perfil actualizado con éxito.');  
			redirect(base_url().'myAccount');  
		}
	}

	public function updatePassword(){
		$iduser = $this->session->userdata('USER_ID');
		$currentPassword = $this->session->userdata('USER_PASS');
		$mypass = trim($this->input->post('fup_current_pass'));
		$mynewpass = trim($this->input->post('fup_new_pass'));

		if(password_verify(base64_encode(hash('sha256', $mypass, true)),$currentPassword)){
			$pass_hash = password_hash(base64_encode(hash('sha256', $mynewpass, true)),PASSWORD_DEFAULT);
			$data = array(
				'password' => $pass_hash,
			);
			if($this->MyAccount_model->updateMyProfile($data,$iduser)){
				$session_data = array(
					'USER_PASS' => $pass_hash,
				);
				$this->session->set_userdata($session_data); 
				$this->session->set_flashdata('ups', 'Contraseña actualizada.');  
				redirect(base_url().'myAccount');  
			}
		} else {
			$this->session->set_flashdata('upe', 'La contraseña actual es incorrecta.');  
			redirect(base_url().'myAccount');  
		}
	}

	public function sendMessage(){
		$data = array(
			'name' => $this->input->post('customerName'),
			'email' => $this->input->post('customerEmail'),
			'subject' => $this->input->post('contactSubject'),
			'message' => $this->input->post('contactMessage'),
			'date' =>date('Y-m-d'),
		);

		if($this->MyAccount_model->newMessage($data)){
			$this->session->set_flashdata('success', 'Mensaje enviado.');  
			redirect(base_url().'home/contact');  
		} else {
			$this->session->set_flashdata('error', 'No hemos podido enviar tu mensaje.');  
			redirect(base_url().'home/contact');  
		}
	}

	public function myPurchases(){
		$iduser = $this->session->userdata('USER_ID');

		$cat = array (
			'categories' => $this->Category_model->getInfoCategories(),
			'items' => $this->Cart_model->getItemsCarHeader($iduser),
		);

		$myaccount = array(
			'shopping'  => $this->MyAccount_model->getMyShoppings($iduser),
			'profile'   => $this->MyAccount_model->getMyProfile($iduser),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('mypurchases',$myaccount);
		$this->load->view('layout/footer',$cat);
	}

	public function Purchase(){
		$idsales = $this->input->get('idsales');

		$iduser = $this->session->userdata('USER_ID');

		$cat = array (
			'categories' => $this->Category_model->getInfoCategories(),
			'items' => $this->Cart_model->getItemsCarHeader($iduser),
		);

		$myaccount = array(
			'products' => $this->MyAccount_model->getMyShoppingDetail($idsales),
			'sale' => $this->MyAccount_model->getInfoSale($idsales),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('purchase',$myaccount);
		$this->load->view('layout/footer',$cat);
	}

}
