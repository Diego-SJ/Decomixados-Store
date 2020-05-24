<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart_model extends CI_Model {

    function addToCar($data){
        return $this->db->insert("car",$data);
    }

    function getProductsCar($iduser){
        $this->db->where('iduser',$iduser);
        $query = $this->db->get("vw_car");
        return $query->result();
    }

    function productExistInCar($iduser,$idproduct) {
        $this->db->where("iduser",$iduser);
        $this->db->where("idproduct",$idproduct);
        $query = $this->db->get("car");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function updateToCar($data,$idcar){
        $this->db->where("idcart",$idcar);
        return $this->db->update("car",$data);
    }

    function getQuantityProductCar($iduser,$idproduct){
        $this->db->where("iduser",$iduser);
        $this->db->where('idproduct',$idproduct);
        $query = $this->db->get("car",1);
        return $query->row_array();
    }

    function deleteItemCar($idcart){
        $this->db->where('idcart', $idcart);
        return $this->db->delete('car');
    }

    function getTotalCar($iduser){
        $this->db->where("iduser",$iduser);
        $this->db->select('TRUNCATE(SUM(sub_total),2) as total');
        $query = $this->db->get("vw_car",1);
        return $query->row();
    }

    function getItemsCar($iduser){
        $this->db->where("iduser",$iduser);
        $this->db->select('sum(quantity) as items');
        $query = $this->db->get("vw_car",1);
        return $query->row_array();
    }
    function getItemsCarHeader($iduser){
        $this->db->where("iduser",$iduser);
        $this->db->select('sum(quantity) as items');
        $query = $this->db->get("vw_car",1);
        return $query->row();
    }

    function carIsEmpty($iduser){
        $this->db->where("iduser",$iduser);
        $query = $this->db->get("car");
        if ($query->num_rows() > 0){
            return false;
        } else {
            return true;
        }
    }

    function dumpCar($iduser){
        $this->db->where('iduser', $iduser);
        return $this->db->delete('car');
    }
}