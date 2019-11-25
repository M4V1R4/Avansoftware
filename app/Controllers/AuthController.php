<?php namespace MyApp\Controllers {

    use MyApp\Models\User;
    use MyApp\Utils\Message;
    
    class AuthController
    {
        private $config = null;
        private $login = null;

        public function __construct($config, $login)
        {
            $this->config = $config;
            $this->login  = $login;
        }

        public function login() {
            $dataToView = ["login" => $this->login];
            return view("auth/login.php", $dataToView);
        }

        public function auth() {
            $userModel = new User($this->config);
            $login = $userModel->authenticate($_POST["username"], $_POST["password"]);
        
            if (!is_null($login)) {
                $_SESSION['login'] = $login;
                header("Location: /index.php");
            } else {
                $message = new Message();
                $message->setWarningMessage(null, "Usuario o contraseña son inválidos", null, true);
                view("auth/login.php", compact("message", "login"));
            }
        }

        public function logout() {
            session_destroy();
            header("Location: /index.php");
        }




    }

}