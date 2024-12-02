<?php

class Carts extends Management
{
    
    public function getDataById($id, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `cart_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function getDataByUser($userId, $mode = []){
        $this->sql = "SELECT cts.cart_id, cts.user_id, cts.created_at, cti.item_id, cti.product_id, cti.quantity, cti.price, pd.name FROM `carts` as cts LEFT JOIN `cartitems` as cti on cti.cart_id = cts.cart_id LEFT JOIN `products` as pd on pd.product_id = cti.product_id WHERE cts.user_id = ?";
        return $this->connect->executeSQL($this->sql, [$userId], true, $mode);
    }

    public function addData($data, $mode = []){
        $this->sql = "INSERT INTO {$this->tableName}(`user_id`, `created_at`) VALUES (?, ?)";
        $params = [$data['user_id'], date("Y-m-d", time())];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `user_id` = ?, `created_at` = ? WHERE `cart_id` = ?";
        $params = [$data['user_id'], $data['created_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `user_id` = NULL WHERE `cart_id` = ?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);

        $this->sql = "DELETE FROM {$this->tableName} WHERE `cart_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}

?>