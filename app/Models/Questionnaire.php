<?php namespace MyApp\Models {
    
    use \EasilyPHP\Database\DBMySQL;

    class Questionnaire
    {
        private $db = null;

        public function __construct($config)
        {
            $this->db = new DBMySQL(
                $config['server'], $config['database'], 
                $config['user'], $config['password']);
        }

        public function getAllQuestionnaires(){
            $this->db->connect();
            $result = $this->db->runSql("SELECT * FROM questionnaires");
            $this->db->disconnect();
            return $this->db->getAll($result);
        }        
       
    }
}