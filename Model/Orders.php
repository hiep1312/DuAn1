<?php
class Orders extends Management{
    public function getAllDataOrders($mode = []){
        $this->sql = "SELECT od.order_id, od.user_id, us.name, us.email, us.phone, us.address, od.status, od.total_amount, od.created_at, od.updated_at, od.description, ot.item_id, ot.productVariant_id, pv.material, pv.color, pv.product_id, pd.name as title, ot.quantity, ot.price FROM `orders` as od
                LEFT JOIN `orderitems` as ot ON ot.order_id = od.order_id
                LEFT JOIN `users` as us ON us.user_id = od.user_id
                LEFT JOIN `productvariants` as pv ON pv.productVariant_id = ot.productVariant_id
                LEFT JOIN `products` as pd ON pd.product_id = pv.product_id";
        return $this->connect->executeSQL($this->sql, [], true, $mode);
    }
    public function getDataById($id, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `order_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function getDataByUserId($id, $mode = [])
    {
        //od.user_id, us.name, us.email, us.phone, us.address,
        $this->sql = "SELECT od.order_id, od.status, od.total_amount, od.created_at, od.updated_at, od.description, ot.item_id, ot.productVariant_id, pv.material, pv.color, pv.product_id, pd.name as title, ot.quantity, ot.price FROM `orders` as od
                LEFT JOIN `orderitems` as ot ON ot.order_id = od.order_id
                LEFT JOIN `users` as us ON us.user_id = od.user_id
                LEFT JOIN `productvariants` as pv ON pv.productVariant_id = ot.productVariant_id
                LEFT JOIN `products` as pd ON pd.product_id = pv.product_id
                WHERE od.user_id = ?";
        return $this->connect->executeSQL($this->sql, [$id], true, $mode);
    }
    public function getDataByOrderId($id, $mode = []){
        $this->sql = "SELECT od.order_id, od.user_id, us.name, us.email, us.phone, us.address, od.status, od.total_amount, od.created_at, od.updated_at, od.description, ot.item_id, ot.productVariant_id, pv.material, pv.color, pv.product_id, pd.name as title, ot.quantity, ot.price FROM `orders` as od
                LEFT JOIN `orderitems` as ot ON ot.order_id = od.order_id
                LEFT JOIN `users` as us ON us.user_id = od.user_id
                LEFT JOIN `productvariants` as pv ON pv.productVariant_id = ot.productVariant_id
                LEFT JOIN `products` as pd ON pd.product_id = pv.product_id
                WHERE od.order_id = ?";
        return $this->connect->executeSQL($this->sql, [$id], true, $mode);
    }
    public function addData($data, $mode = []){
        $this->sql = "INSERT INTO {$this->tableName}(`user_id`,`status`, `total_amount`, `created_at`, `updated_at`, `description`) VALUES (?,?,?,?,?,?)";
        $params = [$data['user_id'],$data['status'],$data['total_amount'],date("Y-m-d", time()), date("Y-m-d", strtotime("+3 day")), $data['description']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `user_id`=?,`status`=?,`total_amount`=?,`created_at`=?,`updated_at`=?,`description`=? WHERE `order_id`=?";
        $params = [$data['user_id'],$data['status'],$data['total_amount'],$data['created_at'],$data['updated_at'], $data['description'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `user_id`= null WHERE `order_id`=?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `order_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}
