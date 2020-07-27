<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

// Initialize variable for database credentials
$user = 'user';
$password = 'password';
$db = 'database';
$host = 'host';
$port = 3306;

//Connection
try{
    $conn = new PDO(
        "mysql:host=$host; 
    dbname=$db; 
    port=$port",
        $user,
        $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = [];

    //Query SQL
    $stmt = $conn->query("SELECT user_id,motivation_text,user_date 
                                   FROM ban_table
                                   WHERE user_date BETWEEN DATE_SUB(NOW(), INTERVAL 10 DAY) AND NOW()
                                   ORDER BY user_id ASC;");

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    //JSON Array
    echo json_encode($result);

}catch (PDOException $e) {
    echo 'Connection failed!';
}