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

        public function authenticate($username, $password) {
            $sql = "SELECT `id`, `username`, `fullname`, `role`, `blocked` FROM users".
                   " WHERE `username` ='" . $username . "'".
                   "   AND `password` ='" . $password . "'";
            
            $this->db->connect();
            $result = $this->db->runSql($sql);
            $this->db->disconnect();
            return $this->db->nextResultRow($result);
        }
        public function insert($fullname, $username, $password, $role)
        {
            $this->db->connect();

            /* Prepared statement, stage 1: prepare */
            if (!($stmt = 
                $this->db->prepareSql("INSERT INTO users(`fullname`, `username`, `password`, `role`) 
                    VALUES (?, ?, ?, ?)"))) {
                echo "Prepare failed: (" .  $this->db->getError() . ") " . $this->db->getErrorMessage();
            }

            /* Prepared statement, stage 2: bind and execute */
            if (!$stmt->bind_param("ssss", $fullname, $username, $password, $role)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $this->db->disconnect();
        }

        public function userExists($username)
        {
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
            return $this->db->nextResultRow($result);
        }


    }
}