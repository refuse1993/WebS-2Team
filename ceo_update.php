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
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="ceo_franc.php">지점관리</a></li>
									<li class="current"><a href="ceo_list.php">FAQ 관리</a></li>
									<li><a href="ceo_messageshow.php">고객 메시지 확인</a></li>
									<li><a href="ceo_menu.php">메뉴 관리</a></li>
									<li><a href="ceo_logout.php">로그아웃</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">FAQ</div>
					<div id="main" class="container">

						<!-- Content -->
							<div id="content">
								<article class="box post">
											<?php

												if(!isset($_SESSION["member_id"]) || !isset($_SESSION["member_password"])){
																header('Location: ceo_login.php');
																break;
												}
												//데이터 베이스 연결
												include "db_connect.php";

												if(!isset($_GET['id'])) die('ERROR :에러에러');
												$id = (int)$_GET['id'];
												$paa = sha1($_POST['pass']);
												$pass = substr($paa,0,12);

												// 글 비밀번호 가져오기
												$result=mysql_query('select pass from board where id='.$id.'');
												$row= mysql_fetch_array($result);


												//입력된 값과 비교
												if ($pass==$row[pass]) { //비밀번호 일치

													$name = strip_tags($_POST['name']);
													$title = strip_tags($_POST['title']);
													$content = strip_tags($_POST['content']);

													$result=mysql_query("UPDATE board SET name='$name',
													title='$title', content='$content' WHERE id=$id");
													if(!$result){
													die('Invalid query :'.mysql_error());
													}
												}
												else { // 비밀번호 불일치
													?>
													<script>
													alert('비밀번호가 틀립니다.');
													history.go(-1);
													</script>
													<?php
													exit;
												}

												//데이터 베이스 연결종료
												mysql_close();
												header('Location: ceo_read.php');
												break;
											?>

										</article>
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
