<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Category_model");
		$this->load->model("Cart_model");
    }

	public function index()
	{
		$iduser = $this->session->userdata('USER_ID');
		$cat = null;
		if($iduser != NULL){
			$cat = array (
				'categories' => $this->Category_model->getInfoCategories(),
				'items' => $this->Cart_model->getItemsCarHeader($iduser),
			);
		} else {
			$cat = array (
				'categories' => $this->Category_model->getInfoCategories(),
			);
		}

		$home = array (
			'categories' => $this->Category_model->getInfoCategories(),
			'products' => $this->Category_model->getNewProducts(),
			'offer' => $this->Category_model->getAllOffers(),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('home',$home);
		$this->load->view('layout/footer',$cat);
	}

	public function aboutus()
	{
		$cat = array (
			'categories' => $this->Category_model->getInfoCategories(),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('aboutus');
		$this->load->view('layout/footer',$cat);
	}

	public function contact(){

		$cat = array (
			'categories' => $this->Category_model->getInfoCategories(),
		);

		$this->load->view('layout/header',$cat);
		$this->load->view('contact');
		$this->load->view('layout/footer',$cat);
	}

	public function logoutu(){  
		//SESSIONS DESTROY
		$session_data = array(
			'USER_ID',
			'USER_NAME',
			'USER_NAME_C',
			'USER_USER',
			'USER_PASS',
			'USER_PHONE',
			'USER_STATUS',
			'USER_AT',
		);
		$this->session->unset_userdata($session_data); 
		if($this->session->userdata('USER_ID') == NULL){
			redirect(base_url()); 
		}
	}
}
