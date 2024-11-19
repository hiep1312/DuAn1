<?php
class Users extends Management{
    public function getDataById($id, $mode = [])
    {
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `user_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode); 
    }
    public function addData($data, $mode = [])
    {
        $this->sql = "INSERT INTO {$this->tableName}(`name`, `email`, `password`, `phone`, `address`, `bio`, `avatar`, `role_id`, `created_at`, `updated_at`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $params = [$data['name'],$data['email'],$data['password'],$data['phone'],$data['address'],$data['bio'],$data['avatar'],$data['role_id'],date("Y-m-d", time()), null,$data['status']];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function updateData($id, $data, $mode = [])
    {
        $this->sql = "UPDATE {$this->tableName} SET `name`=?,`email`=?,`password`=?,`phone`=?,`address`=?,`bio`=?,`avatar`=?,`role`=?,`created_at`=?,`updated_at`=? WHERE `user_id`=?";
        $params = [$data['name'],$data['email'],$data['password'],$data['phone'],$data['address'],$data['bio'],$data['avatar'],$data['role'],$data['created_at'],$data['updated_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }
    public function deleteDataById($id, $mode = [])
    {
         $this->sql = "UPDATE {$this->tableName} SET `email`= null WHERE `user_id`=?";
         $this->connect->executeSQL($this->sql, [$id], false, $mode);
         $this->sql = "UPDATE {$this->tableName} SET `role_id`= null WHERE `user_id`=?";
         $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `user_id`=?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    
}
$co = new Users("users");
$co->addData([
    "name" => 'Lê Văn Khánh',
    "email" => 'oksds324@gmail.com',
    "password" => 'Duy16902346',
    "phone" => '0909123456',
    "address" => 'Hà Tây',
    "bio" => 'Tôi thích cây đàn kalimba loại nhỏ này',
    "avatar" => 'https://harpstore.vn/wp-content/uploads/2020/10/dan-kalimba-rabi-rc09.jpg',
    "role" => 0 
]
);
echo "<pre>";
print_r ($co->getAllData());
// echo "<pre>";
// // print_r ($co->getAllData([1, 5]));
// $co->updateData(1, [
//     "user_id" => null,
//     "name" => 'Lê Văn Nam',
//     "email" => 'namvcl@gmail.com',
//     "phone" => '0909123456',
//     "message" => 'Xin tư vấn cho tôi loại đàn phù hợp để bắt đầu ',
//     "created_at" => "2023-12-21",
// ], [0]);