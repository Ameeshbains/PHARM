<?php



class Admin extends User {
    
    protected $adminLevel;

    public function __construct($username, $password, $adminLevel) {
        parent::__construct($username, $password, $adminLevel);
        $this->adminLevel = $adminLevel;
    }

    public function getAdminLevel() {
        return $this->adminLevel;
    }
}





$admin = new Admin("admin1", "adminpass", 2);
echo "Admin Username: " . $admin->getUsername() . "\n";
echo "Admin Level: " . $admin->getAdminLevel() . "\n";





?>