
<?php
require_once "DBConnection.php";
class Customers {
    public $id;
    public $name;
    public $address;
    public $phone;

    public function __construct($id, $contactInfo) {
        $this->id = $id;
        $this->name = $contactInfo->name;
        $this->address = $contactInfo->address;
        $this->phone = $contactInfo->phone;
    }

    public function saveCustomerDataToDatabase() {
        // Membuat koneksi ke database
        $db = new DBConnection();
        $conn = $db->connect();
    
        // Query untuk menyimpan data pelanggan tanpa menyertakan id
        $sql = "INSERT INTO customers (name, address, phone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $this->name, $this->address, $this->phone);
    
        // Mengeksekusi query dan menangani hasil
        if ($stmt->execute()) {
            echo "Data pelanggan berhasil disimpan.";
        } else {
            echo "Gagal menyimpan data pelanggan: " . $stmt->error;
        }
    
        // Menutup statement dan koneksi
        $stmt->close();
        $conn->close();
    }
    
}

class OrderDetailsPrinter {
    public function printDetails($order) {
        echo "Order ID: " . $order->orderId;
    }
}

class OrderProcessor {
    public function processOrder(Customers $customer, $itemList) {
        echo "Processing order for: " . $customer->name;
        foreach ($itemList as $item) {
            echo "Item: " . $item;
        }
    }
}

class Order {
    public $orderId;
    public $customerId;
    public $orderDate;
    public $items = [];
}
?>
