<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    //Create Database
    $create_db_query = "CREATE DATABASE IF NOT EXISTS to_do";
    $create_db = mysqli_query($conn, $create_db_query);
    if($create_db){
        echo "";
    }else{
        echo "Error Creating Database";
    }

    //Select Database
    $select_db = mysqli_select_db($conn, "to_do");

    //Create Table
    $create_table_query = "CREATE TABLE IF NOT EXISTS to_do (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        item VARCHAR(255) NOT NULL
    );";
    $create_table = mysqli_query($conn, $create_table_query);
    if($create_table){
        echo "";
    }else{
        echo "Error Creating to_do Table";
    }

    //Variables
    $item="";

    //Evaluate Input
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //On Submit
    if(isset($_POST['submit_item'])){
        //assign to variable
        if(!empty($_POST['item'])){
            $item = test_input($_POST['item']);
            //Upload to Database
            $insert_into_todo_query = "INSERT INTO to_do (item) VALUES ('".$item."');";
            $insert_into_todo = mysqli_query($conn, $insert_into_todo_query);
            if($insert_into_todo){
                echo "<script>/*alert('Added ".$item." to the List');*/</script>";
            }else{
                echo "<script>alert('Cannot Add Item to List');</script>";
            }
        }else{
            echo "<script>alert('The Input Field Cannot be Empty');</script>";
        }
    }

    function show_list(){
        global $conn;
        $get_list_query = "SELECT * FROM to_do";
        $get_list = mysqli_query($conn, $get_list_query);
        if(mysqli_num_rows($get_list) > 0){
            while($row = mysqli_fetch_assoc($get_list)){
                echo "
                <div class='card'>
                    <div class='checkbox'>
                        <input type='checkbox' style='font: inherit; width:1.15em; height:1.15em; border: 0.15em solid currentColor; border-radius: 0.15em; transform: translateY(-0.075em);' name='".$row['id']."' id='".$row['id']."' onchange='strikeThrough(this)'>
                    </div>
                    <div class='content' strike=".$row['id'].">
                        <h3>".$row['item']."</h3>
                    </div>
                    <div class='menu'>
                        <div class='icon'>
                            <i class='fa fa-edit' style='cursor: pointer; color: yellow' name='".$row['id']."' id='".$row['id']."'></i>
                        </div>
                        <div class='icon'>
                            <i class='fa fa-trash' style='cursor: pointer; color: red' name='".$row['id']."' id='".$row['id']."'></i>
                        </div>
                    </div>
                </div>
                <br>";
            }
        }else{
            echo "<h3 style='color: red'>Nothing on your List!</h3>
            <script>document.getElementById('delete_all').hidden = true;</script>";
        }
    }

    //On Delete
    if(isset($_POST['delete_all'])){
        echo "<script>
        const response = confirm('Are you sure you want to Delete all the Items from the List?'); 
        if(response == true){
            window.location.href = 'delete_all.php';
        }else{

        }
        </script>";
    }
?>