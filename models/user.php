<?php

class UserModel extends Model{
    
    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $password = md5($_POST['password']);
        
        if($post['submit']){
            //insert into db
            $this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password');
            $this->bind(':name', $_POST['name']);
            $this->bind(':email', $_POST['email']);
            $this->bind(':password', $password);
            
            $this->execute();
            
            if($this->lastInsertId()){
                header('Location: ' . ROOT_URL . 'users/login');
            }
            return;
        }
    }
}