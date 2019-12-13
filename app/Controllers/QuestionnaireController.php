<?php namespace MyApp\Controllers {

use MyApp\Models\Questionnaire;
use MyApp\Utils\Message;

class QuestionnaireController
{
    private $config = null;
    private $quetionnaireModel = null;
    private $message = null;

    public function __construct($config)
    {
        $this->config = $config;
        $this->message = new Message();
    }

    public function index(){
        $this->questionnaireModel = new Questionnaire($this->config);
        $id = $_SESSION['login']['id'];
        $message = $this->message;
        $collection = $this->questionnaireModel->getAllQuestionnairesByUser($id);
        view("questionnaires/index.php", compact("collection", "message"));
    }
    public function reply(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->questionnaireModel = new Questionnaire($this->config);
        $questionnaire = $this->questionnaireModel->getQuestionnaire($id);
        
        view("questionnaires/questionnaire.php", compact("questionnaire"));
    }
    public function maintenance(){
        $this->questionnaireModel = new Questionnaire($this->config);
        $message = $this->message;
        $collection = $this->questionnaireModel->getAllQuestionnaires();
        view("questionnaires/m_questionnaires.php", compact("collection", "message"));
    }
    public function see(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->questionnaireModel = new Questionnaire($this->config);
        $questionnaire = $this->questionnaireModel->getQuestionnaire($id);
        
        view("questionnaires/see.php", compact("questionnaire"));
    }
    public function edit(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->questionnaireModel = new Questionnaire($this->config);
        $questionnaire = $this->questionnaireModel->getQuestionnaire($id);
        view("questionnaires/edit.php", compact("questionnaire"));
    }
    public function update(){
        $message = new Message();

        //$id = isset($_GET['id']) ? $_GET['id'] : null;
        $id                 = $_POST["id"];
        $description        = $_POST["description"];
        $long_description   = $_POST["long_description"];
        var_dump($id);
        $questionnaireModel = new Questionnaire($this->config);
        // $result = $questionnaireModel->userExists($username);

        // Verificar que todos los inputs estén llenos
        if ((ltrim($description) == "") || (ltrim($long_description) == ""))
        {
            $message->setWarningMessage(null, "Todos los campos son requeridos", null, true);
            view("users/edit.php", compact("message","description", "long_description","id"));
            exit;
        }
        // Si pasó todas la verificaciones hago el update
        $questionnaireModel->update($description, $long_description,$id);
        
        $this->message->setSuccessMessage(null, "El registro se modificó correctamente", null, true);
        $this->maintenance();
    }
    public function destroy(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->questionnaireModel = new Questionnaire($this->config);

        if ($id != null)
        {
            // Si pasó todas la verificaciones hago el delete
            $this->questionnaireModel->delete($id);
            $this->message->setSuccessMessage(null, "Se eliminó el registro correctamente", null, true);
            $this->maintenance();
            // view("/questionnaires/index.php?action=maintenance");
        }
        else
        {
            $this->message->setWarningMessage(null, "No sé cuál registro borrar", null, true);
            $this->maintenance();
            // view("/questionnaires/index.php?action=maintenance");
        }
    }
    public function create(){
        view("questionnaires/create.php");
    }
    public function store(){
        $message = new Message();
        $description         = $_POST["description"];
        $long_description         = $_POST["long_description"];

        $questionnaireModel = new Questionnaire($this->config);
        

        // Verificar que todos los inputs estén llenos
        if ((ltrim($description) == "") || (ltrim($long_description) == ""))
        {
            $message->setWarningMessage(null, "Todos los campos son requeridos", null, true);
            view("questionnaires/create.php", compact("message", "description", "long_description"));
            exit;
        }
        // Si pasó todas la verificaciones hago el insert
        $questionnaireModel->insert($description, $long_description);
        $this->message->setSuccessMessage(null, "El registro se agregó correctamente", null, true);
        $this->maintenance();
    }
}
}