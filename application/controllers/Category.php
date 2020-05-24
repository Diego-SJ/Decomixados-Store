<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
				'offer' => $this->Category_model->getAllOffers(),
			);
		} else {
			$cat = array (
				'categories' => $this->Category_model->getInfoCategories(),
				'offer' => $this->Category_model->getAllOffers(),
			);
		}

		$this->load->view('layout/header',$cat);
		$this->load->view('categories',$cat);
		$this->load->view('layout/footer',$cat);
	}

    public function detail($idcategories){
        $order_by = $this->input->post('sort_by');

        switch($order_by){
			case 1:
				$data = array (
                    'category' => $this->Category_model->getInfoCategory($idcategories),
					'products' => $this->Category_model->getCategoryProducts($idcategories),
					'total_products' => $this->Category_model->getCategoryTotalProducts($idcategories),
				);
			break;

			case 2:
				$data = array (
                    'category' => $this->Category_model->getInfoCategory($idcategories),
					'products' => $this->Category_model->getCategoryProductsNameZA($idcategories),
					'total_products' => $this->Category_model->getCategoryTotalProducts($idcategories),
					'sort_selected' => $order_by,
				);
			break;

			case 3:
				$data = array (
                    'category' => $this->Category_model->getInfoCategory($idcategories),
					'products' => $this->Category_model->getCategoryProductsNameAZ($idcategories),
					'total_products' => $this->Category_model->getCategoryTotalProducts($idcategories),
					'sort_selected' => $order_by,
				);
			break;

			case 4:
				$data = array (
                    'category' => $this->Category_model->getInfoCategory($idcategories),
					'products' => $this->Category_model->getCategoryProductsPriceEC($idcategories),
					'total_products' => $this->Category_model->getCategoryTotalProducts($idcategories),
					'sort_selected' => $order_by,
				);
			break;

			case 5:
				$data = array (
                    'category' => $this->Category_model->getInfoCategory($idcategories),
					'products' => $this->Category_model->getCategoryProductsPriceCE($idcategories),
					'total_products' => $this->Category_model->getCategoryTotalProducts($idcategories),
					'sort_selected' => $order_by,
				);
			break;

			default:
				$data = array (
                    'category' => $this->Category_model->getInfoCategory($idcategories),
					'products' => $this->Category_model->getCategoryProducts($idcategories),
					'total_products' => $this->Category_model->getCategoryTotalProducts($idcategories),
				);
			break;
		}
		
		$iduser = $this->session->userdata('USER_ID');
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
        
		$this->load->view('layout/header',$cat);
		$this->load->view('product_grid',$data);
		$this->load->view('layout/footer');
    }
}
