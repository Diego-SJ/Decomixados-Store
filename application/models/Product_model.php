<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {

    function getInfoProduct($idproduct){
        $this->db->where("idproduct",$idproduct);
        $result = $this->db->get("product");
        return $result->row();
    }

    function getSimilarProducts($idcategories){
        $this->db->where('idcategories',$idcategories);
        $query = $this->db->get("product",5);
        return $query->result();
    }

    function getIdCategory($idproduct){
        $this->db->where("idproduct",$idproduct);
        $query = $this->db->get("product");
        if($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }

    function getInfoProductArray($idproduct){
        $this->db->where("idproduct",$idproduct);
        $result = $this->db->get("product");
        return $result->row_array();
    }

    function updateStockProduct($data,$idproduct){
        $this->db->where("idproduct",$idproduct);
        return $this->db->update("product",$data);
    }

    function searchProducts($string){
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get('vw_products');
        return $query->result();
    }

    function searchProductsNameZA($string){
        $this->db->order_by('name', 'ASC');
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get('vw_products');
        return $query->result();
    }

    function searchProductsNameAZ($string){
        $this->db->order_by('name', 'DESC');
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get('vw_products');
        return $query->result();
    }

    function searchProductsPriceEC($string){
        $this->db->order_by('price_v', 'ASC');
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get('vw_products');
        return $query->result();
    }

    function searchProductsPriceCE($string){
        $this->db->order_by('price_v', 'DESC');
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get('vw_products');
        return $query->result();
    }

    function searchProductsCategoryZA($string){
        $this->db->order_by('category', 'ASC');
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get('vw_products');
        return $query->result();
    }
    function searchProductsCategoryAZ($string){
        $this->db->order_by('category', 'DESC');
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get('vw_products');
        return $query->result();
    }

    function getTotalResults($string) {
        $this->db->select('count(*) as total');
        $this->db->from('vw_products');
        $this->db->where("(name LIKE '%$string%' OR description LIKE '%$string%' OR provider LIKE '%$string%' OR category LIKE '%$string%')");
        $query = $this->db->get();
        return $query->row();
    }
}