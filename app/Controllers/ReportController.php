<?php namespace MyApp\Controllers {

use MyApp\Models\Report;
use MyApp\Utils\Message;

class ReportController
{
    private $config = null;
    private $reportModel = null;
    private $message = null;

    public function __construct($config)
    {
        $this->config = $config;
        $this->message = new Message();
    }

    public function index(){
        $this->reportModel = new Report($this->config);
        //$id = isset($_GET['id']) ? $_GET['id'] : null;
        $message = $this->message;
        $collection = $this->reportModel->getAllUsers();
        view("reports/index.php", compact("collection", "message"));
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
   
}
}