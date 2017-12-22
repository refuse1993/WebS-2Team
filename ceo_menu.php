<?php session_start(); ?>

<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>청년족발 - 관리자</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="right-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Nav -->
							<nav id="nav">
								<nav id="nav">
									<ul>
										<li><a href="ceo_franc.php">지점관리</a></li>
										<li><a href="ceo_list.php">FAQ 관리</a></li>
										<li><a href="ceo_messageshow.php">고객 메시지 확인</a></li>
										<li class="current"><a href="ceo_menu.php">메뉴 관리</a></li>
										<li><a href="ceo_logout.php">로그아웃</a></li>
									</ul>
								</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">메뉴 관리</div>
					<div id="main" class="container">
						<div class="row 150%">
							<div class="8u 12u(mobile)">

								<!-- Content -->
									<div id="content">
										<article class="box post">
											<form method="post" enctype="multipart/form-data" autocomplete="off">
											<br/>
												<input type="file" name="image" />
												<br/><br/>
												<p>제목 : <input type="text" name="title" /></p>
												<p>설명 : <textarea name="description" id="" cols="30" rows="10"></textarea></p>
												<p>가격 : <input type="text" name="price" /></p>
												<br/></br/>
												<input type="submit" name="sumit" class="style1" value="완료" />
											</form>

											<?php
												if(!isset($_SESSION["member_id"]) || !isset($_SESSION["member_password"])){
														header('Location: ceo_login.php');
														break;
												}

												include "db_connect.php";


												if(isset($_POST['sumit']))
												{
													if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
													{
														echo "Please select an image.";
													}
													else
													{
														$image= addslashes($_FILES['image']['tmp_name']);
														$name= addslashes($_FILES['image']['name']);
														$image= file_get_contents($image);
														$image= base64_encode($image);
														saveimage($name,$image);
													}
												}

												function saveimage($name,$image)
												{

													$selDb=mysql_select_db('board');

													$qry="insert into images (name,image,title,description,price) values ('$name','$image','".mysql_real_escape_string($_POST['title'])."','".mysql_real_escape_string($_POST['description'])."', '".mysql_real_escape_string($_POST['price'])."')";
													$result=mysql_query($qry);
													if($result)
													{
														echo "<br/>Image uploaded.";
													}
													else
													{
														echo "<br/>Image not uploaded.";
													}
												}

											?>
										</article>
									</div>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Sidebar -->
									<div id="sidebar">
									<section class="box" style="overflow-x:hidden; height:800px;">
									<ul class="style2">
											<?php

											function clearBrowserCache() {
													header("Pragma: no-cache");
													header("Cache: no-cache");
													header("Cache-Control: no-cache, must-revalidate");
													header("Expires:Mon, 26 Jul 1997 05:00:00 GMT");
												}

												clearBrowserCache();

										$selDb=mysql_select_db('board');
											$qry="select * from images";
											$result=mysql_query($qry);
											while($row = mysql_fetch_array($result))
											{
												?>
												<li>
												<article class="box post-excerpt">
												<br/><h3><?=$row[3]?></h3>
												<img class="image left" src="data:image;base64,<?=$row[2]?>" alt="">
												<p><?=$row[4]?></p>
												<p><?=$row[5]?></p>

												<form action="ceo_menudel.php?id=<?=$row[0]?>" method="POST">
												<input type="hidden" name="id" value=<?=$row[0]?>/>
												<input type="submit" class="style1" value="삭제하기"/>
												</form>
												</article>
												</li>
												<?php
											}
											?>
										</ul>
									</section>
									</div>

							</div>
						</div>
					</div>
				</div>

							<!-- Footer -->
								<div id="footer-wrapper" class="wrapper">
								</div>

						</div>

						<!-- Scripts -->

							<script src="assets/js/jquery.min.js"></script>
							<script src="assets/js/jquery.dropotron.min.js"></script>
							<script src="assets/js/skel.min.js"></script>
							<script src="assets/js/skel-viewport.min.js"></script>
							<script src="assets/js/util.js"></script>
							<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
							<script src="assets/js/main.js"></script>

					</body>
				</html>
