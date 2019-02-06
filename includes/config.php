<?php

        $connect = mysqli_connect("localhost", "root", "", "inventory_management");
        ob_start();
        date_default_timezone_set('Asia/Calcutta');

        function secure($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }





?>
