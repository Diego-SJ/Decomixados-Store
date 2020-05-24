<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout_model extends CI_Model {

    function saveAddress($data){
        $this->db->insert("address",$data);
        return $this->db->insert_id();
    }

    function getAddresses($iduser){
        $this->db->where('iduser',$iduser);
        $query = $this->db->get("address");
        return $query->result();
    }

    function getAddress($idaddress){
        $this->db->where('idaddress',$idaddress);
        $query = $this->db->get("address");
        return $query->row();
    }

    function saveSale($data){
        $this->db->insert("sales",$data);
        return $this->db->insert_id();
    }

    function saveSaleProduct($data){
        return $this->db->insert("detail_sale",$data);
    }
}