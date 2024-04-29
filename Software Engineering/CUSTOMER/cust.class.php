<?php 

require_once("../user/user.config.php");

class Customer extends User {
    protected $customerId;

    public function __construct($username, $password, $customerId,$dbCnx) {
        parent::__construct($username, $password, $dbCnx);
        $this->customerId = $customerId;
    }

    public function getCustomerId() {
        return $this->customerId;
    }

    public function loginAccess() {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE firstName = :username AND pwd = :password");
            $stm->bindParam(':username', $this->username);
            $stm->bindParam(':password', $this->password);
            $stm->execute();

            $result = $stm->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // Login successful
                return true;
            } else {
                // Login failed
                return false;
                
            }
        } catch(PDOException $e) {
            return $e->getMessage();
            echo"<script>alert('credentials wrong!!!!');</script>";
        }
    }
}


?>