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

    public function index()
    {
        $this->questionnaireModel = new Questionnaire($this->config);
        $message = $this->message;
        $collection = $this->questionnaireModel->getAllQuestionnaires();
        
        //var_dump($colletion);
        view("questionnaires/index.php", compact("collection", "message"));
    }

}
}