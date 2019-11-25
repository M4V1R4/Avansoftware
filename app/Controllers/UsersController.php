<?php namespace MyApp\Controllers {
    use MyApp\Models\User;
    use MyApp\Utils\Message;

    class UsersController
    {
        private $config = null;
        private $login = null;
        private $userModel = null;

        public function __construct($config, $login)
        {
            $this->config = $config;
            $this->login  = $login;
        }

        public function index()
        {
            $this->userModel = new User($this->config);
            $collection = $this->userModel->getAllUsers();
            $login = $this->login;
            //var_dump($colletion);
            view("users/index.php", compact("collection","login"));
        }
        public function create(){
            $login = $this->login;
            view("users/create.php", compact("login"));
        }
        
        public function store()
        {
            $login = $this->login;
            $message = new Message();

            //var_dump($_POST);
            $fullname         = $_POST["fullname"];
            $username         = $_POST["username"];
            $password         = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            $role             = $_POST["role"];

            $userModel = new User($this->config);
            $result = $userModel->userExists($username);

            // Verificar que todos los inputs estén llenos
            if (($fullname == "") || ($username == "") || ($password == ""))
            {
                $message->setWarningMessage(null, "Todos los campos son requeridos", null, true);
                view("users/create.php", compact("message", "login", "fullname", "username", "password", "confirm_password", "role"));
                exit;
            }

            // Verifico si el usuario ya existe
            if ($result["exists"] == 1)
            {
                $message->setWarningMessage(null, "Nombre de usuario ya existe", null, true);
                view("users/create.php", compact("message", "login", "fullname", "username", "password", "confirm_password", "role"));
                exit;
            }
            
            // Verifico si las contraseñas coinciden
            if ($password != $confirm_password)
            {
                $message->setWarningMessage(null, "Las contraseñas no coinciden", null, true);
                view("users/create.php", compact("message", "login", "fullname", "username", "password", "confirm_password", "role"));
                exit;
            }

            // Si pasó todas la verificaciones hago el insert
            $userModel->insert($fullname, $username, $password, $role);
            header("Location: /users/index.php");
        }

        public function edit(){
            $login = $this->login;
            view("users/edit.php", compact("login"));
        }
        public function update(){

        }
        public function destroy(){

        }
    }
}