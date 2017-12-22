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
					<div class="title">FAQ</div>
					<div id="main" class="container">

						<!-- Content -->
							<div id="content">
								<article class="box post">
																						<?

																							if(!isset($_SESSION["member_id"]) || !isset($_SESSION["member_password"])){
																							header('Location: ceo_login.php');
																								break;
																							}
																							if(!isset($_GET['id'])) die('ERROR : 에러에러');
																							$id = $_GET['id'];
																						?>
																						<form action=ceo_delete.php?id=<?=$_GET['id']?> method=post>
																						<table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
																						<tr>
																							<td height=20 align=center bgcolor=#eeeeee>
																								<font color=white><B>비 밀 번 호 확 인</B></font>
																							</td>
																						</tr>
																						<tr>
																							<td align=center >
																								<font color=white><B>비밀번호 : </b>
																								<INPUT type=password name=pass size=8>
																								<INPUT type=submit class="style1" value="확 인">
																								<INPUT type=button value="취 소" onclick="history.back(-1)">
																							</td>
																						</tr>
																						</table>

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
