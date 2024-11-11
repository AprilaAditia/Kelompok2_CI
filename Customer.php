
<?php
class CustomerContactInfo {
    public $name;
    public $address;
    public $phone;

    public function __construct($name, $address, $phone) {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }
}

class Customers {
    public $id;
    public $contactInfo;

    public function __construct($id, CustomerContactInfo $contactInfo) {
        $this->id = $id;
        $this->contactInfo = $contactInfo;
    }

    public function saveCustomerDataToDatabase() {
        $db = $this->getConnection();
        $this->executeInsertQuery($db);
    }

    private function getConnection() {
        return (new DBConnection())->connect();
    }

    private function executeInsertQuery($db) {
        $query = "INSERT INTO customers (name, address, phone) VALUES (:name, :address, :phone)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $this->contactInfo->name);
        $stmt->bindParam(':address', $this->contactInfo->address);
        $stmt->bindParam(':phone', $this->contactInfo->phone);
        $stmt->execute();
    }
}
?>
