<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE user_email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->getOne();

        return $this->db->rowCount() > 0;
    }

    public function registerUser($data){
        $this->db->query('INSERT INTO users (user_name, user_email, user_password) values (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        }
        return false;
    }
    public function loginUser($data){
        $this->db->query('SELECT * FROM users WHERE user_email = :email');
        $this->db->bind(':email', $data['email']);
        $row = $this->db->getOne();

        if(password_verify($data['password'],$row->user_password)){
            return $row;
        }
        return false;
    }
}