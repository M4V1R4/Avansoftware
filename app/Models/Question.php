<?php namespace MyApp\Models {
    
    use \EasilyPHP\Database\DBMySQL;

    class Question
    {
        private $db = null;

        public function __construct($config){
            $this->db = new DBMySQL(
                $config['server'], $config['database'], 
                $config['user'], $config['password']);
        }

        // Use the id from questionnaire
        public function getAllQuestions($id){
            $this->db->connect();
            $result = $this->db->runSql("SELECT * FROM questions WHERE questionnaire_id = $id");
            $this->db->disconnect();
            return $this->db->getAll($result);
        }
        public function getQuestion($id){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            // if (!($stmt = 
            //     $this->db->prepareSql("SELECT `questionnaires.description`,`questions.id`, `questions.question_text` FROM questionnaires 
            //     JOIN questions ON `questionnaires.id` =  `questions.questionnaires_id` AND id = ?"))) {
            //     echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            // }
            if (!($stmt = 
                $this->db->prepareSql("SELECT * FROM questions WHERE id = ?"))) {
                echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            }

            /* Prepared statement, stage 2: bind and execute */
            if (!$stmt->bind_param("i", $id)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $result = $stmt->get_result();
            //var_dump($this->db->nextResultRow($result));
            $this->db->disconnect();
            return $this->db->nextResultRow($result);
        }
        public function delete($id){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("DELETE FROM questions WHERE `id` = ?"))) {
                echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            }

            /* Prepared statement, stage 2: bind and execute */
            if (!$stmt->bind_param("i", $id)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $this->db->disconnect();
        }
        public function insert($description, $long_description){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("INSERT INTO questionnaires(`description`, `long_description`) VALUES (?, ?)"))) {
                echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            }

            /* Prepared statement, stage 2: bind and execute */
            if (!$stmt->bind_param("ss", $description, $long_description)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $this->db->disconnect();
        }     
       
    }
}