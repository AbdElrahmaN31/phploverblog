<?php
    class Database{
        public $user_name = DB_USER;
        public $host = DB_HOST;
        public $password = DB_PASSWORD;
        public $db_name = DB_NAME;

        public $link;
        public $error;

        public function __construct() {
            $this->connect();
        }

        private function connect() {
            $this->link = new mysqli($this->host, $this->user_name, $this->password, $this->db_name);
            if (!$this->link) {
                $this->error = "Connection Failed: " . $this->link->connect_error;
                return false;
            }
        }

        /*
         * Select
         */
        public function select($query) {
            $result = $this->link->query($query) or die($this->link->error . __LINE__);

            if ($result->num_rows > 0) {
                return $result;
            } else {
                return false;
            }
        }

        /*
         * Insert
         */
        public function insert($query) {
            $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
            //Validate Insert
            if ($insert_row) {
                header('Location: index.php?msg=' . urldecode('Record Added'));
                exit();
            } else {
                die('Error: (' . $this->link->errno . ') ' . $this->link->error);

            }
        }

        /*
        * Update
        */
        public function update($query) {
            $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
            //Validate Insert
            if ($update_row) {
                header('Location: index.php?msg=' . urldecode('Record Updated'));
                exit();
            } else {
                die('Error: (' . $this->link->errno . ') ' . $this->link->error);

            }
        }

        /*
        * Delete
        */
        public function delete($query) {
            $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
            //Validate Insert
            if ($delete_row) {
                header('Location: index.php?msg=' . urldecode('Record Deleted'));
                exit();
            } else {
                die('Error: (' . $this->link->errno . ') ' . $this->link->error);
            }
        }
    }