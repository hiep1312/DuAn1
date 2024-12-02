<?php
class Mypromotions extends Management
{

    public function getDataById($id, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `mypromotion_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }

    public function getVouchersById($id, $mode = []){
        $this->sql = "SELECT mp.mypromotion_id, mp.promo_id, mp.user_id, pr.code, pr.discount, pr.start_date, pr.end_date, pr.usage_limit FROM `mypromotions` as mp LEFT JOIN `promotions` as pr on pr.promo_id = mp.promo_id LEFT JOIN `users` as us on us.user_id = mp.user_id WHERE mp.user_id = ?";
        return $this->connect->executeSQL($this->sql, [$id], true, $mode);
    }

    public function addData($data, $mode = []){
        $this->sql = "INSERT INTO {$this->tableName}(`promo_id`, `user_id`) VALUES (?,?)";
        $params = [$data['promo_id'], $data['user_id']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `promo_id`=?,`user_id`=? WHERE `mypromotion_id`= ?";
        $params = [$data['promo_id'], $data['user_id'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `promo_id` = NULL WHERE `mypromotion_id` = ?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "UPDATE {$this->tableName} SET `user_id` = NULL WHERE `mypromotion_id` = ?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `mypromotion_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}