<?php
    require_once "Management.php";
    class Comments extends Management
    {
        public function getDataById($id, $mode = []){
            $this->sql = "SELECT * FROM {$this->tableName} WHERE `comment_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
        }
        public function addData($data, $mode = []){
            $this->sql = "INSERT INTO {$this->tableName}(`user_id`, `news_id`, `content`,`likes`,`parent_comment`,`created_at`) VALUES (?,?,?,?,?,?)";
            $params = [$data['user_id'], $data['news_id'], $data['content'], $data['likes'], $data['parent_comment'], date("Y-m-d", time())];
            return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = []){
        $this -> sql = "UPDATE {$this-> tablesName} SET `user_id`=?, `news_id`=?, `content`=?, `likes`=?, `parent_comment`=?, `created_at`=? WHERE `comment_id`=?";
        $params = [$data['user_id'], $data['news_id'], $data['content'], $data['likes'], $data['parent_comment'], $data['created_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = []){
        $this -> sql = "UPDATE {$this->tableName} SET `user_id`= NULL WHERE `comment_id`=?";
        $this -> connect->executeSQL($this->sql, [$id], false, $mode);
        $this -> sql = "UPDATE {$this->tableName} SET `new_id`= NULL WHERE `comment_id`=?";
        $this -> connect->executeSQL($this->sql, [$id], false, $mode);
        $this -> sql = "UPDATE {$this->tableName} SET `parent_comment`= NULL WHERE `comment_id`=?";
        $this -> connect->executeSQL($this->sql, [$id], false, $mode);
        $this -> sql = "DELETE FROM {$this->tableName} WHERE `comment_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}

$co = new Comments("comments");
// $co -> addData([
//     'user_id' => null,
//     'news_id' => null,
//     'content' => "Nhạc cụ Kalimba vipp",
//     'likes' => 200,
//     'parent_comment' => null
// ]);
echo "<pre>";
print_r($co->getAllData([1, 3]));
