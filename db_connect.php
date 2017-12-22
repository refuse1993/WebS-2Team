<?php
        $conn=mysql_connect('localhost','root','dkxkfkrtldk');
        if(!$conn){
            die('could not connect:'.mysql_error());
        }

        $selDb=mysql_select_db('board');

?>
