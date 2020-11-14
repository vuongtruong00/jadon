
    
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
        
        <br class="clear_float">
        
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