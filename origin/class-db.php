<?php
class DB {
    private $dbHost     ;
    private $dbUsername ;
    private $dbPassword ;
    private $dbName     ;
    
    
    public function __construct(){
        $this->init();
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
  
    public function init(){
        $this->dbHost = 'localhost';
        $this->dbUsername = 'root';
        $this->dbPassword = '';
        $this->dbName = 'google-sheet-apis';
    }

    public function is_table_empty() {
        $result = $this->db->query("SELECT id FROM google_oauth WHERE provider = 'google'");
        if($result->num_rows) {
            return false;
        }
  
        return true;
    }
  
    public function get_access_token() {
        $sql = $this->db->query("SELECT provider_value FROM google_oauth WHERE provider = 'google'");
        $result = $sql->fetch_assoc();
        return json_decode($result['provider_value']);
    }
  
    public function get_refersh_token() {
        $result = $this->get_access_token();
        return $result->refresh_token;
    }
  
    public function update_access_token($token) {
        if($this->is_table_empty()) {
            $this->db->query("INSERT INTO google_oauth(provider, provider_value) VALUES('google', '$token')");
        } else {
            $this->db->query("UPDATE google_oauth SET provider_value = '$token' WHERE provider = 'google'");
        }
    }
}