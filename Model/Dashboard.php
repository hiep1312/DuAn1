<?php
$config = "./Model/env.php";
require_once "./Model/ConnectDatabase.php";
class Dashboard{
    protected $connect = null, $sql = null;
    public function __construct(){
        $this->connect = new ConnectDatabase();
    }
    public function getAllOrdersPending(){
        $this->sql = "Select * from `orders` where `status` = 0";
        return $this->connect->executeSQL($this->sql);
    }
    public function getAllOrdersAccepted(){
        $this->sql = "Select * from `orders` where `status` = 1";
        return $this->connect->executeSQL($this->sql);
    }
    public function getAlltotalsOrders(){
        $this->sql = "SELECT SUM(total) AS totals FROM ( SELECT SUM(ot.price * ot.quantity) 
                        AS total FROM `orders` 
                        AS od LEFT JOIN `orderitems` 
                        AS ot ON ot.order_id = od.order_id WHERE od.status = 1 GROUP BY od.status ) AS totals;";
        return $this->connect->executeSQL($this->sql);
    }
    public function getAllCurrentMonth(){
        $this->sql = "
                        SELECT SUM(ot.price * ot.quantity) AS total
                        FROM `orders` AS od
                        LEFT JOIN `orderitems` AS ot ON ot.order_id = od.order_id
                        WHERE od.status = 1 AND YEAR(od.created_at) = YEAR(CURRENT_DATE) AND MONTH(od.created_at) = MONTH(CURRENT_DATE);
                    ";
        return $this->connect->executeSQL($this->sql);

    }public function getAllCurrentYear(){
        $this->sql = "
                        SELECT SUM(ot.price * ot.quantity) AS total
                        FROM `orders` AS od
                        LEFT JOIN `orderitems` AS ot ON ot.order_id = od.order_id
                        WHERE od.status = 1 AND YEAR(od.created_at) = YEAR(CURRENT_DATE);
                    ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getdaylyOrders()
    {
        $this->sql = "
            SELECT SUM(ot.price * ot.quantity) AS total, od.created_at AS order_date FROM `orders` AS od
            LEFT JOIN `orderitems` AS ot ON ot.order_id = od.order_id
            WHERE od.status = 1
            GROUP BY od.created_at;  
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getMonthOrders()
    {
        $this->sql = "
            SELECT SUM(total) AS monthly_total, MONTH(order_date) AS order_month FROM (
            SELECT SUM(ot.price * ot.quantity) AS total, DATE(od.created_at) AS order_date
            FROM `orders` AS od
            LEFT JOIN `orderitems` AS ot ON ot.order_id = od.order_id
            WHERE od.status = 1
            GROUP BY DATE(od.created_at)
            ) AS monthly_totals
            GROUP BY MONTH(order_date);
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function layphoneContacts()
    {
        $this->sql = "
        SELECT phone, 
        COUNT(phone) AS contact_count FROM  contacts GROUP BY  phone
        ORDER BY  contact_count DESC;
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getPromotions()
    {
        $this->sql = "
        SELECT code, usage_limit FROM promotions
        ORDER BY usage_limit ASC;
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getDUsers()
    {
        $this->sql = "
             SELECT DATE(created_at) AS registration_date, 
            COUNT(user_id) AS user_count FROM users GROUP BY DATE(created_at)
        ORDER BY registration_date;
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getMUsers()
    {
        $this->sql = "
             SELECT MONTH(created_at) AS registration_month, COUNT(user_id) AS user_count
            FROM users GROUP BY MONTH(created_at) ORDER BY registration_month;
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getYUsers()
    {
        $this->sql = "
             SELECT YEAR(created_at) AS registration_year, COUNT(user_id) AS user_count
            FROM users GROUP BY YEAR(created_at) ORDER BY registration_year;
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getYearOrders() {
        $this->sql = "
        SELECT YEAR(order_date) AS order_year, SUM(total) AS yearly_total 
        FROM (
            SELECT SUM(ot.price * ot.quantity) AS total, DATE(od.created_at) AS order_date
            FROM `orders` AS od
            LEFT JOIN `orderitems` AS ot ON ot.order_id = od.order_id
            WHERE od.status = 1
            GROUP BY DATE(od.created_at)
        ) AS yearly_totals
        GROUP BY YEAR(order_date)
        ORDER BY order_year;
    ";
        return $this->connect->executeSQL($this->sql);
    }

    public function chartdanhmucSp()
    {
        $this->sql = "
            SELECT 
                p.brand AS product_brand, SUM(p.stock_quantity) AS Tongptonkho
                FROM  products AS p
                GROUP BY p.brand
                ORDER BY p.brand;
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function countLikes()
    {
        $this->sql = "
           SELECT content, likes 
            FROM comments ORDER BY  likes ASC ;
        ";
        return $this->connect->executeSQL($this->sql);
    }
    public function getAmountMoneyFromOrdersAccepted(){
        $orders = $this->getAllOrdersAccepted();
        $this->sql = "Select `order_id`, SUM(price) as `total_money` from `orderitems`";
        $id = [];
        foreach($orders as $order){
            array_push($id, $order->order_id);
        }
        $this->sql .= " where `order_id` in(".implode(",", $id).")";
        $this->sql .= " GROUP BY `order_id`";
        return $this->connect->executeSQL($this->sql);
    }
}