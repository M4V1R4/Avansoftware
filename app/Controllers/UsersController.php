<?php namespace MyApp\Controllers {

use MyApp\Models\User;
use MyApp\Utils\Message;

class UsersController
{
    private $config = null;
    private $userModel = null;
    private $message = null;

    public function __construct($config)
    {
        $this->config = $config;
        $this->message = new Message();
    }

    public function index()
    {
        $this->userModel = new User($this->config);
        $message = $this->message;
        $collection = $this->userModel->getAllUsers();
        
        //var_dump($colletion);
        view("users/index.php", compact("collection", "message"));
    }

    public function create(){
        view("users/create.php");
    }

    public function store(){
        $message = new Message();

        //var_dump($_POST);
        $fullname         = $_POST["fullname"];
        $username         = $_POST["username"];
        $password         = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $role             = $_POST["role"];
        $blocked          = $_POST['blocked'];

        $userModel = new User($this->config);
        $result = $userModel->userExists($username);

        // Verificar que todos los inputs estén llenos
        if ((ltrim($fullname) == "") || (ltrim($username) == "") || (ltrim($password) == ""))
        {
            $message->setWarningMessage(null, "Todos los campos son requeridos", null, true);
            view("users/create.php", compact("message", "fullname", "username", "password", "confirm_password", "role", "blocked"));
            exit;
        }

        // Verifico si el usuario ya existe
        if ($result["exists"] == 1)
        {
            $message->setWarningMessage(null, "Nombre de usuario ya existe", null, true);
            view("users/create.php", compact("message", "fullname", "username", "password", "confirm_password", "role", "blocked" ));
            exit;
        }
        
        // Verifico si las contraseñas coinciden
        if ($password != $confirm_password)
        {
            $message->setWarningMessage(null, "Las contraseñas no coinciden", null, true);
            view("users/create.php", compact("message", "fullname", "username", "password", "confirm_password", "role", "blocked"));
            exit;
        }

        // Si pasó todas la verificaciones hago el insert
        $userModel->insert($fullname, $username, $password, $role, $blocked);
        
        //header("Location: /users/index.php");
        $this->message->setSuccessMessage(null, "El registro se agregó correctamente", null, true);
        $this->index();
    }
    public function register(){
        $message = new Message();

        //var_dump($_POST);
        $fullname         = $_POST["fullname"];
        $username         = $_POST["username"];
        $password         = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $role             = "S";

        $userModel = new User($this->config);
        $result = $userModel->userExists($username);

        // Verificar que todos los inputs estén llenos
        if ((ltrim($fullname) == "") || (ltrim($username) == "") || (ltrim($password) == ""))
        {
            $message->setWarningMessage(null, "Todos los campos son requeridos", null, true);
            view("users/register.php", compact("message", "fullname", "username", "password", "confirm_password", "role"));
            exit;
        }

        // Verifico si el usuario ya existe
        if ($result["exists"] == 1)
        {
            $message->setWarningMessage(null, "Nombre de usuario ya existe", null, true);
            view("users/register.php", compact("message", "fullname", "username", "password", "confirm_password", "role"));
            exit;
        }
        
        // Verifico si las contraseñas coinciden
        if ($password != $confirm_password)
        {
            $message->setWarningMessage(null, "Las contraseñas no coinciden", null, true);
            view("users/register.php", compact("message", "fullname", "username", "password", "confirm_password", "role"));
            exit;
        }

        // Si pasó todas la verificaciones hago el insert
        $userModel->insert($fullname, $username, $password, $role);
        
        //header("Location: /users/index.php");
        $this->message->setSuccessMessage(null, "El registro se agregó correctamente", null, true);
        $this->index();
    }
    public function see($login){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->userModel = new User($this->config);
        $user = $this->userModel->getUser($id);
        
        view("users/see.php", compact("user"));
    }
    public function edit($login){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->userModel = new User($this->config);
        $user = $this->userModel->getUser($id);
        
        view("users/edit.php", compact("user"));
    }

    public function update(){
        $message = new Message();

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $fullname         = $_POST["fullname"];
        $username         = $_POST["username"];
        $password         = $_POST["password"];
        $role             = $_POST["role"];
        $blocked          = $_POST['blocked'];

        $userModel = new User($this->config);
        // $result = $userModel->userExists($username);

        // Verificar que todos los inputs estén llenos
        if ((ltrim($fullname) == "") || (ltrim($username) == "") || (ltrim($password) == ""))
        {
            $message->setWarningMessage(null, "Todos los campos son requeridos", null, true);
            view("users/edit.php", compact("message", "fullname", "username", "password", "role", "blocked"));
            exit;
        }

        // Verifico si el usuario ya existe
        // if ($result["exists"] == 1){
        //     $message->setWarningMessage(null, "Nombre de usuario ya existe", null, true);
        //     view("users/create.php", compact("message", "fullname", "username", "password", "role", "blocked" ));
        //     exit;
        // }

        // Si pasó todas la verificaciones hago el update
        $userModel->update($id,$fullname, $username, $password, $role, $blocked);
        
        //header("Location: /users/index.php");
        $this->message->setSuccessMessage(null, "El registro se modificó correctamente", null, true);
        $this->index();
    }

    public function destroy($login){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->userModel = new User($this->config);

        if ($id != null)
        {
            // Verificar si el usuario tiene permisos para borrar el registro
            if (!$this->userModel->isSuperuser($login['id'])){
                $this->message->setDangerMessage(null, "Usted no tiene permisos para eliminar el registro", null, true);
                $message = $this->message;
                view("auth/forbidden.php", compact("message"));
                exit;
            }

            // Si pasó todas la verificaciones hago el delete
            $this->userModel->delete($id);
            $this->message->setSuccessMessage(null, "Se eliminó el registro correctamente", null, true);
            $this->index();
        }
        else
        {
            $this->message->setWarningMessage(null, "No sé cuál registro borrar", null, true);
            $this->index();
        }
    }
}
}