<?php
    include "index_be.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/3a6fbde6cc.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="parent">
        <div class="child">
            <div class="heading">
                <h1>To-Do List</h1>
            </div>
            <hr>
            <div class="body">
                <div class="sub-body">
                    <div class="form">
                        <form method="POST">
                            <center>
                                <input type="text" name="item" id="item" placeholder="Ex: Bring Groceries, Call Grand Pa, etc...">
                            </center>
                            <center>
                                <button type="submit" name="submit_item" id="submit_item">Add to List</button>
                            </center>
                        
                    </div>
                    <div class="list">
                        <br>
                        <h2>Your To-Do List: </h2>
                        <div>
                            <button type="submit" name="delete_all" id="delete_all" style="margin:0;border-radius: 0px;background-color: transparent;width:auto; height: 30px;float: right; border-bottom: solid 1px; cursor: pointer">Delete All</button>
                        </div>
                        </form>
                        <br>
                        <div class="scrollbar">
                            <!--<div class="card">
                                <div class="checkbox">
                                    <input type="checkbox" name="" id="">
                                </div>
                                <div class="content">
                                    <h4>OOPs Record</h4>
                                </div>
                                <div class="menu">
                                    <div class="icon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-trash"></i>
                                    </div>
                                </div>
                            </div>
                            <br>-->
                            <?php
                                show_list();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>