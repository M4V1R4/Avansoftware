<?php
    // Esta es el "dispatcher" de cuestionarios

    // En cada script hay que cargar el init.php
    include_once $_SERVER['DOCUMENT_ROOT']."/../app/init.php";

    // Se cargan las clases que se ocupan
    include_once MODELS."/Questionnaire.php";
    include_once CONTROLLERS."/QuestionnaireController.php";

    // Se hace el "use" de las clases que se utilizaran en este script
    use MyApp\Controllers\QuestionnaireController;
    $controller = new QuestionnaireController($config, $login);

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                $controller->create();
                break;
            case 'store':
                $controller->store();
                break;
            case 'reply':
                $controller->reply();
                break;
            case 'see':
                $controller->see();
                break;
            case 'maintenance':
                $controller->maintenance();
                break;
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
   