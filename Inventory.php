
<?php
class Inventory {
    public function updateStock($itemId, $quantity, $operation = 'add') {
        $db = (new DBConnection())->connect();
        $query = ($operation === 'add')
            ? "UPDATE inventory SET quantity = quantity + :quantity WHERE item_id = :item_id"
            : "UPDATE inventory SET quantity = quantity - :quantity WHERE item_id = :item_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':item_id', $itemId);
        $stmt->execute();
    }
}
?>
