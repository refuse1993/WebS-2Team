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

													if(!isset($_GET['id'])) die('ERROR : 에러에러');
													$id = $_GET['id'];
												?>

												<form action=ceo_update.php?id=<?=$_GET[id]?> method=post>
												<table width=780 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
													<tr>
														<td height=20 align=center bgcolor=#eeeeee>
															<font color=white><B>글 수정하기</B></font>
														</td>
													</tr>
												<?php
													// 데이터 베이스 연결하기
													include "db_connect.php";

													// 먼저 쓴 글의 정보를 가져온다.
													$result=mysql_query('select * from board where id='.$id.'');
													$row= mysql_fetch_array($result);
												?>
												<!-- 입력부분 -->
													<tr>
														<td bgcolor=white>&nbsp;
														<table>
															<tr>
																<td align=left >
																	<INPUT type=text name=name size=20
																	value=<?=$row['name']?> placeholder="분류">
																</td>
															</tr>
																<tr height=10></tr>
															<tr>
																<td align=left >
																	<INPUT type=password name=pass size=8 placeholder="비밀번호">
																	(비밀번호가 맞아야 수정 가능)
																</td>
															</tr>
																<tr height=10></tr>
															<tr>
																<td align=left >
																	<INPUT type=text name=title size=60
																	value=<?=$row['title']?> placeholder="제목">
																</td>
															</tr>
																<tr height=10></tr>
															<tr>
																<td align=left >
																	<TEXTAREA name=content cols=65 rows=15 placeholder="내용"><?=$row['content']?></TEXTAREA>
																</td>
															</tr>
																<tr height=10></tr>
															<tr>
																<td colspan=10 align=center>
																	<INPUT type=submit class="style1" value="글 저장하기">
																	&nbsp;&nbsp;
																	<INPUT type=reset class="style1" value="다시 쓰기">
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
