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
		<?php
				if(!isset($_SESSION["member_id"]) || !isset($_SESSION["member_password"])){
							header('Location: ceo_login.php');
							break;
				}
		?>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="ceo_franc.php">지점관리</a></li>
									<li><a href="ceo_list.php">FAQ 관리</a></li>
									<li><a href="ceo_messageshow.php">고객 메시지 확인</a></li>
									<li><a href="ceo_menu.php">메뉴 관리</a></li>
									<li><a href="ceo_logout.php">로그아웃</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">지점 관리</div>
					<div id="main" class="container">
						<div class="row 150%">
							<div class="8u 12u(mobile)">

								<!-- Content -->
									<div id="content">
										<article class="box post">
												<div id="map"></div>
										</article>
									</div>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="box">
										<form>
												<input id="address" width="200" type="text" value="서울시">
												<br>
												<input id="submit" type="button" value="주소변경" class="style1">
											</form>
										    <form id="forma"method=post autocomplete="off">
										      <input id="lat" type = "hidden" name="lat">
										      <input id="lng" type = "hidden" name="lng">
													<input id="fname" type=text name="name" size=20 maxlength=10 placeholder="지점명">
													<br>
													<TEXTAREA id="fcont" name="content" cols=55 rows=9 placeholder="내용"></TEXTAREA>
										      <br>
													<input id="fphone" type=text name="phone" size=20 maxlength=13 placeholder="전화번호">
													<br>
													<input type = "button" value="저장" class="style1" onclick="save();">
										    </form>
												<form id="formb" method="post" autocomplete="off">
													<input id="fid" type="hidden" name="id">
													<input type = "button" value="삭제" class="style1" onclick="del();">
												</form>
										    <script async defer
										    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBbmP46-xaAk4MXNvb0Zg7E28eCOPVxcc&callback=initMap">
										    </script>
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
			<script src="assets/js/mapp.js?ver=1.0"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
