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
		<link rel="stylesheet" href="assets/css/main.css?ver=1.3" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
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
										<form action=ceo_insert.php method=post>
										<table class="style1" width=780 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
											<tr>
												<td height=20 align=center bgcolor=#eeeeee>
												<B>글쓰기</B>
												</td>
											</tr>

											<tr>
												<td bgcolor=white>&nbsp;
												<table>
													<tr>
														<td align=center >
															<INPUT type=text name=name size=20 maxlength=10 placeholder="분류">
														</td>
													</tr>
														<tr height=10></tr>
													<tr>
														<td align=center >
															<INPUT type=password name=pass size=8 placeholder = "비밀번호">
															(수정, 삭제시 반드시 필요)
														</td>
													</tr>
														<tr height=10></tr>
													<tr>
														<td align=center >
															<INPUT type=text name=title size=60 maxlength=35 placeholder="제목">
														</td>
													</tr>
														<tr height=10></tr>
													<tr>
														<td align=center >
															<TEXTAREA name=content cols=65 rows=15 placeholder="내용"></TEXTAREA>
														</td>
													</tr>
													<tr>
														<tr height=10></tr>
														<td colspan=10 align=center>
															<INPUT type=submit class="style1" value="글 저장하기">
															&nbsp;&nbsp;
															<INPUT type=reset class="style1" value="다시쓰기">
															&nbsp;&nbsp;
															<INPUT type=button class="style1" value="되돌아가기"
															onclick="history.back(-1)">
														</td>
													</tr>
												</TABLE>
										</td>
										</tr>
										</table>
										</form>
								</article>
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
