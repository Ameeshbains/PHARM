<?php



class User {
    protected $username;
    protected $password;
    protected $dbCnx;

    public function __construct($username, $password, $dbCnx) {
        $this->username = $username;
        $this->password = $password;
        $this->dbCnx = $dbCnx;
    }

    public function getUsername() {
        return $this->username;
    }
}

// Example usage



?>

