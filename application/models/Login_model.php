<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    function userExist($user) {
        $this->db->where("user",$user);
        $query = $this->db->get("user");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function emailExist($email) {
        $this->db->where('access_type',1);
        $this->db->where('status',1);
        $this->db->where("email",$email);
        $query = $this->db->get("user");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    function registerUser($data) {
        return $this->db->insert("user",$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


    //forget

    function getLogin($user_email){
        $this->db->where("(email = '$user_email' OR user = '$user_email')");
        $this->db->where('access_type',1);
        $this->db->where('status',1);
        $query = $this->db->get("user",1);
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return false;
        }
    }

    function updateUserTokenPass($email,$data) {
        $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }

    function deleteUserTokenPass($token,$data) {
        $this->db->where('token_password', $token);
        return $this->db->update('user', $data);
    }

    function forgetPassword($token,$data){
        $this->db->where('token_password', $token);
        return $this->db->update('user', $data);
    }

    function verifyToken($token){
        $this->db->where("token_password",$token);
        $query = $this->db->get("user");
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}