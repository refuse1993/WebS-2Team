<?php
  //데이터 베이스 연결하기
  include "db_connect.php";

    $name = strip_tags($_POST['name']);
    $phone = strip_tags($_POST['phone']);
    $message = strip_tags($_POST['message']);


    $result = mysql_query("INSERT INTO message
    (id, name, phone, message)
    VALUES ('', '$name', '$phone', '$message')");
    if(!$result){
    die('Invalid query :'.mysql_error());
    }


      // 새 글 쓰기인 경우 리스트로..
      echo ("<meta http-equiv='Refresh' content='0; URL=client_main.html'>");
      //1초후에 list.php로 이동함.
?>
