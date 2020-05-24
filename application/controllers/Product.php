<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
        parent:: __construct();
        $this->load->model("Category_model");
        $this->load->model("Product_model");
		$this->load->model("Cart_model");
    }
    

	public function detail($idproduct)
	{
        $res = $this->Product_model->getIdCategory($idproduct);
        $idcategory = $res['idcategories'];

        $iduser = $this->session->userdata('USER_ID');
		$cat = null;
		if($iduser != NULL){
			$cat = array (
                'categories' => $this->Category_model->getInfoCategories(),
                'product' => $this->Product_model->getInfoProduct($idproduct),
                'items' => $this->Cart_model->getItemsCarHeader($iduser),
            );
		} else {
			$cat = array (
                'categories' => $this->Category_model->getInfoCategories(),
                'product' => $this->Product_model->getInfoProduct($idproduct),
            );
		}
        

        $this->load->view('layout/header',$cat);
        $this->load->view('single_product',$cat);
        $this->load->view('layout/footer',$cat);
    }
    
    public function search(){
        $string = $this->input->post('searchInput');
        $order_by = $this->input->post('sort_by');

        switch($order_by){

            case 1:
				$fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProducts($string),
                    'string' => $string,
                );
            break;
            
			case 2:
				$fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProductsNameZA($string),
                    'string' => $string,
                    'sort_selected' => $order_by,
                );
			break;

			case 3:
				$fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProductsNameAZ($string),
                    'string' => $string,
                    'sort_selected' => $order_by,
                );
			break;

			case 4:
				$fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProductsPriceEC($string),
                    'string' => $string,
                    'sort_selected' => $order_by,
                );
			break;

			case 5:
				$fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProductsPriceCE($string),
                    'string' => $string,
                    'sort_selected' => $order_by,
                );
			break;

			case 6:
				$fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProductsCategoryAZ($string),
                    'string' => $string,
                    'sort_selected' => $order_by,
                );
            break;
            
            case 7:
				$fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProductsCategoryZA($string),
                    'string' => $string,
                    'sort_selected' => $order_by,
                );
			break;

			default:
                $fetch = array(
                    'total_products' => $this->Product_model->getTotalResults($string),
                    'categories' => $this->Category_model->getInfoCategories(),
                    'products' => $this->Product_model->searchProducts($string),
                    'string' => $string,
                );
			break;
        }
        $cat = array (
			'categories' => $this->Category_model->getInfoCategories(),
		);
		$this->load->view('layout/header',$cat);
		$this->load->view('product_results',$fetch);
		$this->load->view('layout/footer',$cat);
    }
}
