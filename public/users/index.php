<?php
    // Esta es el "dispatcher" de usuarios

    // En cada script hay que cargar el init.php
    include_once $_SERVER['DOCUMENT_ROOT']."/../app/init.php";

    // Se cargan las clases que se ocupan
    include_once MODELS."/User.php";
    include_once CONTROLLERS."/UsersController.php";

    // Se hace el "use" de las clases que se utilizaran en este script
    use MyApp\Controllers\UsersController;
    $controller = new UsersController($config, $login);
    
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                $controller->create();
                break;
            case 'store':
                $controller->store();
                break;
            case 'register':
                $controller->register();
                break;
            case 'see':
                $controller->see($login);
                break;
            case 'edit':
                $controller->edit($login);
                break;
            case 'update':
                $controller->update($login);
                break;
            case 'destroy':
                $controller->destroy($login);
                break;
            default:
                $controller->index();
                break;
        }
    }else{
        $controller->index();
    }
    
    


