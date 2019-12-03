<?php namespace MyApp\Models {
    
    use \EasilyPHP\Database\DBMySQL;

    class User
    {
        private $db = null;

        public function __construct($config)
        {
            $this->db = new DBMySQL(
                $config['server'], $config['database'], 
                $config['user'], $config['password']);
        }

        public function getAllUsers()
        {
            $this->db->connect();
            $result = $this->db->runSql("SELECT * FROM users");
            $this->db->disconnect();
            return $this->db->getAll($result);
        }

        public function getUser($id){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("SELECT * FROM users WHERE `id` = ?"))) {
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

        public function authenticate($username, $password) {
            $sql = "SELECT `id`, `username`, `fullname`, `role`, `blocked` FROM users".
                   " WHERE `username` ='" . $username . "'".
                   "   AND `passwd` ='" . $password . "'";
            
            $this->db->connect();
            $result = $this->db->runSql($sql);
            $this->db->disconnect();
            return $this->db->nextResultRow($result);
        }

        public function insert($fullname, $username, $password, $role, $blocked){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("INSERT INTO users(`fullname`, `username`, `passwd`, `role`,`blocked`) VALUES (?, ?, ?, ?, ?)"))) {
                echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            }

            /* Prepared statement, stage 2: bind and execute */
            if (!$stmt->bind_param("sssss", $fullname, $username, $password, $role, $blocked)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $this->db->disconnect();
        }

        public function update($id,$fullname, $username, $password, $role, $blocked){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("UPDATE users SET `fullname` = ?, `username` = ?, `passwd` = ?, `role` = ?,`blocked` = ? WHERE `id` = ?"))) {
                echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            }

            /* Prepared statement, stage 2: bind and execute */
            if (!$stmt->bind_param("isssss",$id, $fullname, $username, $password, $role, $blocked)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $this->db->disconnect();
        }
        public function delete($id){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("DELETE FROM users WHERE `id` = ?"))) {
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

        public function userExists($username){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("SELECT count(1) as `exists` FROM users WHERE `username` = ?"))) {
                echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            }

            /* Prepared statement, stage 2: bind and execute */
            if (!$stmt->bind_param("s", $username)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $result = $stmt->get_result();
            $this->db->disconnect();
            return $this->db->nextResultRow($result);
        }

        public function isSuperuser($id){
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("SELECT count(1) as `issuper` FROM users WHERE `id` = ? AND `role` = 'S'"))) {
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
            $this->db->disconnect();
            return ($this->db->nextResultRow($result)['issuper'] == '1') ? true : false;
        }
    }
}