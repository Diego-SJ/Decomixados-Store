<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model {

    function getInfoCategory($idCategory){
        $this->db->where("idcategories",$idCategory);
        $result = $this->db->get("categories");
        return $result->row();
    }

    function getNewProducts(){
        $query = $this->db->get("vw_newproducts",12);
        return $query->result();
    }

    function getInfoCategories(){
        $result = $this->db->get("categories");
        return $result->result();
    }

    function getCategoryProducts($idCategory) {
        $this->db->where("idcategories",$idCategory);
        $result = $this->db->get("product");
        return $result->result();
    }
    // order by name from A to Z
    function getCategoryProductsNameAZ($idCategory) {
        $this->db->order_by('name', 'DESC');
        $this->db->where("idcategories",$idCategory);
        $result = $this->db->get("product");
        return $result->result();
    }
    // order by name from Z to A
    function getCategoryProductsNameZA($idCategory) {
        $this->db->order_by('name', 'ASC');
        $this->db->where("idcategories",$idCategory);
        $result = $this->db->get("product");
        return $result->result();
    }
    // order by price from cheap to expensive
    function getCategoryProductsPriceCE($idCategory) {
        $this->db->order_by('price_v', 'DESC');
        $this->db->where("idcategories",$idCategory);
        $result = $this->db->get("product");
        return $result->result();
    }
    // order by name from expensive to cheap
    function getCategoryProductsPriceEC($idCategory) {
        $this->db->order_by('price_v', 'ASC');
        $this->db->where("idcategories",$idCategory);
        $result = $this->db->get("product");
        return $result->result();
    }

    function getCategoryTotalProducts($idCategory) {
        $this->db->select('count(*) as total');
        $this->db->from('product');
        $this->db->where('idcategories',$idCategory);
        $query = $this->db->get();
        return $query->row();
    }

    function getAllOffers(){
        $query = $this->db->get("vw_offers");
        return $query->result();
    }
}