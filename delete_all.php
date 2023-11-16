<?php
    include "index_be.php";

    $delete_all_query = "DROP TABLE to_do";
    $delete_all = mysqli_query($conn, $delete_all_query);
    if($delete_all){
        echo "<script>window.location.href = 'index.php'</script>";
    }
?>