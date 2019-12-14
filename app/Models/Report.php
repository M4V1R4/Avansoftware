<?php namespace MyApp\Models {
    
    use \EasilyPHP\Database\DBMySQL;

    class Report
    {
        private $db = null;

        public function __construct($config){
            $this->db = new DBMySQL(
                $config['server'], $config['database'], 
                $config['user'], $config['password']);
        }

        public function getAllQuestionnairesByUser($id){
            $this->db->connect();
            $result = $this->db->runSql("SELECT * FROM questionnaires WHERE id NOT IN
            (   SELECT users_questionnaires.id FROM users_questionnaires
                JOIN questionnaires ON (questionnaires.id = users_questionnaires.questionnaire_id)
                WHERE users_questionnaires.user_id = '". $id . "')" );
            $this->db->disconnect();
            return $this->db->getAll($result);
        }
        public function getAllUsers(){
            $this->db->connect();
            $result = $this->db->runSql("SELECT * FROM users_questionnaires");
            var_dump($result);
            $this->db->disconnect();
            return $this->db->getAll($result);
        }
        public function getQuestionnaire($id){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("SELECT * FROM questionnaires WHERE `id` = ?"))) {
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
                $this->db->prepareSql("DELETE FROM questionnaires WHERE `id` = ?"))) {
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
       
    }
}