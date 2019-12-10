<?php namespace MyApp\Controllers {

use MyApp\Models\Question;
use MyApp\Utils\Message;

class QuestionController
{
    private $config = null;
    private $quetionModel = null;
    private $message = null;

    public function __construct($config)
    {
        $this->config = $config;
        $this->message = new Message();
    }

    public function index(){
        $this->questionModel = new Question($this->config);
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $message = $this->message;
        $collection = $this->questionModel->getAllQuestions($id);
        view("questions/index.php", compact("collection", "message"));
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
        $this->questionModel = new Question($this->config);
        $question = $this->questionModel->getQuestion($id);
        view("questions/see.php", compact("question"));
    }
    public function edit(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->questionnaireModel = new Questionnaire($this->config);
        $questionnaire = $this->questionnaireModel->getQuestionnaire($id);
        view("questionnaires/edit.php", compact("questionnaire"));
    }
    public function destroy(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $this->questionModel = new Question($this->config);

        if ($id != null)
        {
            // Si pasó todas la verificaciones hago el delete
            $this->questionModel->delete($id);
            $this->message->setSuccessMessage(null, "Se eliminó el registro correctamente", null, true);
            $this->index();
        }
        else
        {
            $this->message->setWarningMessage(null, "No sé cuál registro borrar", null, true);
            $this->index();
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