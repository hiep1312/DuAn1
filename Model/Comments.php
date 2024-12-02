<?php
    class Comments extends Management
    {
        public function getAllByNews($id, $mode = []){
            $this->sql = "SELECT cm.comment_id, cm.user_id, us.name, us.avatar, cm.news_id, cm.content, cm.likes, cm.parent_comment, cm.created_at FROM `comments` as cm
                        LEFT JOIN `users` as us ON cm.user_id = us.user_id
                        WHERE cm.news_id = ?
                        ORDER BY cm.comment_id DESC";
            return $this->connect->executeSQL($this->sql, [$id], true, $mode);
        }
        public function getDataById($id, $mode = []){
            $this->sql = "SELECT * FROM {$this->tableName} WHERE `comment_id` = ?";
            return $this->connect->executeSQL($this->sql, [$id], false, $mode);
        }
        public function getDataByIdParents($id, $mode = []){
            $this->sql = "SELECT * FROM {$this->tableName} WHERE parent_comment = ?";
            return $this->connect->executeSql($this->sql, [$id], true, $mode);
        }
        public function addData($data, $mode = []){
            $this->sql = "INSERT INTO {$this->tableName}(`user_id`, `news_id`, `content`,`likes`,`parent_comment`,`created_at`) VALUES (?,?,?,?,?,?)";
            $params = [$data['user_id'], $data['news_id'], $data['content'], $data['likes'], $data['parent_comment'], date("Y-m-d", time())];
            return $this->connect->executeSQL($this->sql, $params, false, $mode);
        }
        public function updateData($id, $data, $mode = []){
            $this -> sql = "UPDATE {$this-> tableName} SET `user_id`=?, `news_id`=?, `content`=?, `likes`=?, `parent_comment`=?, `created_at`=? WHERE `comment_id`=?";
            $params = [$data['user_id'], $data['news_id'], $data['content'], $data['likes'], $data['parent_comment'], $data['created_at'], $id];
            return $this->connect->executeSQL($this->sql, $params, false, $mode);
        }
        public function deleteDataById($id, $mode = []){
            $this -> sql = "UPDATE {$this->tableName} SET `user_id`= NULL WHERE `comment_id`=?";
            $this -> connect->executeSQL($this->sql, [$id], false, $mode);
            $this -> sql = "UPDATE {$this->tableName} SET `news_id`= NULL WHERE `comment_id`=?";
            $this -> connect->executeSQL($this->sql, [$id], false, $mode);
            $this -> sql = "UPDATE {$this->tableName} SET `parent_comment`= NULL WHERE `comment_id`=?";
            $this -> connect->executeSQL($this->sql, [$id], false, $mode);
            $this -> sql = "DELETE FROM {$this->tableName} WHERE `comment_id`=?";
            return $this->connect->executeSQL($this->sql, [$id], false, $mode);
        }
    }