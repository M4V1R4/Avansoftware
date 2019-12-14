<?php
    // Esta es el "dispatcher" de cuestionarios

    // En cada script hay que cargar el init.php
    include_once $_SERVER['DOCUMENT_ROOT']."/../app/init.php";

    // Se cargan las clases que se ocupan
    include_once MODELS."/Report.php";
    include_once CONTROLLERS."/ReportController.php";

    // Se hace el "use" de las clases que se utilizaran en este script
    use MyApp\Controllers\ReportController;
    $controller = new ReportController($config, $login);

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'destroy':
                $controller->destroy();
                break;
            default:
                $controller->index();
                break;
        }
    }else{
        $controller->index();
    }
   