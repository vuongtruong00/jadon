<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thêm Mới</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
include 'db.php';

// Nếu dữ liệu được post lên
// đừng dùng if($_POST) vì hay bị lỗi, nhất là lúc delete
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // thì lưu vào db
    $sql = "
        INSERT INTO `SinhVien`
        SET `name`='{$_POST["input_name1"]}',
            `so_thich`='{$_POST["input_name2"]}',
            `phone`='{$_POST["input_name3"]}'
    ";
    
    //echo $sql;
    //die();
    
    db_q($sql);
    
    $_SESSION["SUCCESS_MSG"] = "Đã thêm mới thành công !";
    
    // điều hướng sang trang home.php
    header("location: home.php");
    
    // chấm dứt kịch bản hiện tại
    die();
}
?>

<form method="post" action="add.php">
    <fieldset>
        <legend>Form Add</legend>
        
        <label>Thông_Tin_1:</label>
        <input type="text" name="input_name1" value="" placeholder="..."/>
        

        <label>Thông_Tin_2:</label>
        <input type="text" name="input_name2" value="" placeholder="..."/>
        
        <label>Thông_Tin_3:</label>
        <input type="text" name="input_name3" value="" placeholder="..."/>
        
        <br class="clear_f  loat">
        
        <button>Lưu</button>
    </fieldset>

    <!--
    <div class="error_msg">
        Lỗi có thể xảy ra ...
    </div>
    -->
</form>
</body>
</html>