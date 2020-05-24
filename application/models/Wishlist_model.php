<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wishlist_model extends CI_Model {

    function addToWishlist($data){
        return $this->db->insert("saves",$data);
    }

    function getProductsWishlist($iduser){
        $this->db->where('iduser',$iduser);
        $query = $this->db->get("vw_wishlist");
        return $query->result();
    }

    function productExistInList($iduser,$idproduct) {
        $this->db->where("iduser",$iduser);
        $this->db->where("idproduct",$idproduct);
        $query = $this->db->get("saves");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function deleteItemWishlist($idsaves){
        $this->db->where('idsaves', $idsaves);
        return $this->db->delete('saves');
    }
}