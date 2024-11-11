
<?php
// Mengimpor kelas yang diperlukan
require_once 'DBConnection.php';
require_once 'Customer.php';
require_once 'Order.php';
require_once 'Inventory.php';

/* use OrderSystem\Customer;
use OrderSystem\OrderProcessor;
use OrderSystem\Order; */


// Membuat objek Customer
$customerInfo = new CustomerContactInfo("Nama Pelanggan", "Alamat Pelanggan", "08123456789");
$customer = new Customers(1, $customerInfo);

// Menyimpan data pelanggan ke database
$customer->saveCustomerDataToDatabase();

// Membuat objek Order dan memproses pesanan
$order = new Order();
$orderProcessor = new OrderProcessor();
$orderItems = ["Item 1", "Item 2", "Item 3"]; // Daftar item dalam pesanan
$orderProcessor->processOrder($customer, $orderItems);

// Menambah stok barang di inventaris
$inventory = new Inventory();
$inventory->updateStock(1, 5, 'add'); // Menambah 5 unit ke item dengan ID 1

echo "<p>Pesanan berhasil diproses dan stok telah diperbarui.</p>";
?>
