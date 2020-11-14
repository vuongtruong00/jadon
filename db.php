<?php

// Khởi tạo phiên kết nối
session_start();

// Báo lỗi lập trình nếu có
// 0: ẩn các lỗi đi
// 1: hiện các lỗi lập trình 
error_reporting(1);

$host = "localhost";
$user = "root";
$pass = "";
$db   = "Test";

$link = mysqli_connect($host, $user, $pass);
if(!$link) 
    echo "\n\n Lỗi kết nối cơ sở dữ liệu. Nguyên nhân: ".mysqli_error($link);

function db_init()
{
    global $link;
   
    $sql = " 
        CREATE DATABASE  IF NOT EXISTS `Test`; 
        USE `Test`;

        DROP TABLE IF EXISTS `home_slideshow`;
        CREATE TABLE `home_slideshow` (
            `id` int(11) NOT NULL,
              `img_url` text NOT NULL,
              `title` varchar(100) DEFAULT NULL,
              `caption` text DEFAULT NULL,
              `img_order` int(11) NOT NULL,
              `created_at` datetime DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                    );
                ";
   
    $q = mysqli_multi_query($link,$sql);    

    if(!$q)
    {
        echo "\n Thất bại trong việc tạo cơ sở dữ liệu ! Nguyên nhân: ".mysqli_error($link);
    }
    else
        echo "\n Đã tạo cơ sở dữ liệu thành công !";
}

function db_q($sql)
{
     global $link, $db;
    
     mysqli_set_charset($link,'utf8');    
     mysqli_select_db($link, $db);

    $q = mysqli_query($link, $sql);

    if(!$q) 
        echo "\n\n Lỗi truy vấn cơ sở dữ liệu. Nguyên nhân: ".mysqli_error($link);

    if($q===true)
        return null;
    
    $result = array();
    while($row = mysqli_fetch_array($q))
    {
        $result[] = $row;
    }
    
    return $result;   
}

function db_row($sql)
{
    global $link;

    $table = db_q($sql);

    if(!is_array($table) || empty($table))
        return null;

    return $table[0];
}

function db_one($sql)
{    
    $row = db_row($sql);
    return $row[0];
}

function db_escape($str)
{
    global $link;
    
    if ($link) 
        return mysqli_real_escape_string($link,$str);
    
    
    return $str;
}

function db_lastId()
{
    global $link;
    return mysqli_insert_id($link);
}