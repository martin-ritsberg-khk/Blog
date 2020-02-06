<?php


class Users extends Controller
{

    public $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
            if(empty($data['email']) || !filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                $data['email_error']='Please enter a valid email';
            } else if ($this->userModel->findUserByEmail($data['email'])){
                $data['email_error']='Email is already in use';
            }
            if(empty($data['password']) || strlen($data['password']) < PASSWORD_LEN){
                $data['password_error']='Please enter a password with at least '.PASSWORD_LEN.' characters';
            }
            if((empty($data['confirm_password']) || $data['password'] !== $data['confirm_password']) && !empty($data['password'])){
                $data['confirm_password_error']='Passwords do not match, please repeat password';
            }
            if( empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error']) ){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->userModel->registerUser($data)){
                    header('Location:'.URLROOT.'/'.'users/login');
                } else {
                    die('Database write unsuccessful');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            $this->view('users/register');
        }
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email'=>trim($_POST['email']),
                'password'=>$_POST['password'],

                'email_error'=>'',
                'password_error'=>''
            ];
            if(empty($data['email'])){
                $data['email_error']='Please enter an email';
            } else if (!$this->userModel->findUserByEmail($data['email'])){
                $data['email_error']='Email not found';
            }
            if(empty($data['password'])){
                $data['password_error']='Please enter a password';
            }
            if( empty($data['email_error']) && empty($data['password_error']) ){
                $loggedInUser = $this->userModel->loginUser($data);
                if($loggedInUser){
                    echo "Login ok";
                } else {
                    $data['password_error']='Invalid password';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $this->view('users/login');
        }
    }
}