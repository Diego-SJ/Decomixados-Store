<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MyAccount_model extends CI_Model {

    function addToCar($data){
        return $this->db->insert("car",$data);
    }

    function getMyShoppings($iduser){
        $this->db->where('iduser',$iduser);
        $query = $this->db->get("sales");
        return $query->result();
    }

    function getMyShoppingDetail($idsales){
        $this->db->where('idsales',$idsales);
        $query = $this->db->get("vw_purchase");
        return $query->result();
    }

    function cancelOrder($idsales){
        $this->db->where('idsales', $idsales);
        $result = $this->db->delete('detail_sale');
        if($result){
            $data = array(
                'status' => 'cancelado',
                'date'   => date('Y-m-d H:i:s'),
            );
            $this->db->where('idsales', $idsales);
            if($this->db->update('sales', $data)){
                return true;
            } else {
                return false;
            }
        }
    }

    function getInfoSale($idsales){
        $this->db->where("idsales",$idsales);
        $result = $this->db->get("sales");
        return $result->row();
    }

    function getMyProfile($iduser){
        $this->db->where("access_type",1);
        $this->db->where('iduser',$iduser);
        $query = $this->db->get("user");
        return $query->row();
    }

    function updateMyProfile($data,$iduser){
        $this->db->where("access_type",1);
        $this->db->where("iduser",$iduser);
        return $this->db->update("user",$data);
    }

    function newMessage($data){
        return $this->db->insert("messages",$data);
    }
}