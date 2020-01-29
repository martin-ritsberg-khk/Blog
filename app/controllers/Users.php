<?php


class Users extends Controller
{

    public function __construct()
    {
        $userModel = $this->model('user');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
//            $_POST = filter_input(INPUT_POST, FILTER_SANITIZE_STRING); todo:fix filter
            $data = [
                'name'=>trim($_POST['name']),
                'email'=>trim($_POST['email']),
                'password'=>$_POST['password'],
                'confirm_password'=>$_POST['confirm_password'],

                'name_error'=>'',
                'email_error'=>'',
                'password_error'=>'',
                'confirm_password_error'=>''
            ];
            if(empty($data['name']) || strlen($data['name']) < 6){
                $data['name_error']='Please enter a name with at least 6 characters';
            }
            if(empty($data['email'])){
                $data['email_error']='Please enter a valid email';
            }
            if(empty($data['password']) || strlen($data['password']) < 6){
                $data['password_error']='Please enter a password with at least 6 characters';
            }
            if((empty($data['confirm_password']) || $data['password'] !== $data['confirm_password']) && !empty($data['password'])){
                $data['confirm_password_error']='Password needs to be repeated here';
            }
            $this->view('users/register', $data);
        } else {
            $this->view('users/register');
        }


    }
}