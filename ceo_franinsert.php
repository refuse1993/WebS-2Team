<?php
        $conn=mysql_connect('localhost','root','dkxkfkrtldk');
        if(!$conn){
            die('could not connect:'.mysql_error());
        }

        $selDb=mysql_select_db('board');

                                  $name = $_POST['name'];
                                  $content = $_POST['content'];
                                  $phone = $_POST['phone'];
        											  	$lat = $_POST['lat'];
        											  	$lng = $_POST['lng'];

        											  	$result = mysql_query("INSERT INTO map
        											  	(id,name,phone,content,lat,lng)
        											  	VALUES ('','$name','$phone','$content','$lat','$lng')");
        											    if(!$result){
        											    die('Invalid query :'.mysql_error());
        											    }


        												    // 새 글 쓰기인 경우 리스트로..
        												    echo ("<meta http-equiv='Refresh' content='0; URL=ceo_franc.php'>");
        												    //1초후에 list.php로 이동함.
?>
