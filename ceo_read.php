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
																					//데이터 베이스 불러오기
																					include "db_connect.php";

																					if (!isset($_GET['id'])) die('ERROR : 에러에러');
																					$id = (int)$_GET['id'];
																					$no =0;
																					if(isset($_GET['no'])) $no = (int)$_GET['no'];

																					// 글 정보 가져오기
																					$result=mysql_query('select * from board where id='.$id.'');
																					if(!$result){
																							echo('query error :'.mysql_error());
																					}

																					$row=mysql_fetch_array($result);
																				?>
																				<table width=780 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
																				<tr>
																					<td height=20 colspan=4 align=center bgcolor=#eeeeee>
																						<B><?=$row[title]?></B>
																					</td>
																				</tr>
																				<tr>
																					<td width=50 height=20 align=center bgcolor=#EEEEEE>분류</td>
																					<td	width=240 bgcolor=white><?=$row[name]?></td>
																				</tr>
																				<tr>
																					<td width=50 height=20 align=center bgcolor=#EEEEEE>
																					날&nbsp;&nbsp;&nbsp;짜</td><td width=240
																					bgcolor=white><?=$row[wdate]?></td>
																					<td width=50 height=20 align=center bgcolor=#EEEEEE>조회수</td>
																					<td	width=240 bgcolor=white><?=$row[view]?></td>
																				</tr>
																				<tr height=150>
																					<td bgcolor=white colspan=4 valign=top>
																						<table width=95% height=95% border=0 cellpadding=5>
																						<tr><td>
																						<pre><?=$row[content]?></pre>
																						</td></tr>
																						</table>
																					</td>
																				</tr>
																				<!-- 기타 버튼들 -->
																				<tr>
																					<td colspan=4 bgcolor=#eeeeee>
																					<table width=100%>
																						<tr>
																							<td width=200 align=left height=20>
																								<a href=ceo_list.php?no=<?=$no?>>
																								[목록보기]</a>
																								<a href=ceo_write.php>
																								[글쓰기]</a>
																								<a href=ceo_edit.php?id=<?=$id?>>
																								[수정]</a>
																								<a href=ceo_predel.php?id=<?=$id?>>
																								[삭제]</a>
																							</td>
																							<!-- 기타버튼 끝 -->
																							<!-- 이전 다음 표시 -->
																							<td align=right>
																				<?php
																					// 현재 글보다 id값이 큰 글 중 가장 작은 것을 가져온다. 삭제됬을 떄를 위해 구현
																					$result_pid = mysql_query('select id from board where id > '.$id.' limit 1');
																					$prev_id = mysql_fetch_array($result_pid);

																					if ($prev_id['id']) // 이전 글이 있다면
																					{?>
																						<a href=ceo_read.php?id=<?=$prev_id[id]?>>[다음]</a>
																					<?php
																					}
																					else
																					{?>
																						<font color=grey>[다음]</font>
																						<?php
																					}

																					$result_nid = mysql_query('select id from board where id < '.$id.' order by id desc limit 1');
																					$next_id = mysql_fetch_array($result_nid);

																					if ($next_id['id'])
																					{?>
																						<a href=ceo_read.php?id=<?=$next_id['id']?>>[이전]</a>
																					<?php
																					}
																					else
																					{?>
																						<font color=grey>[이전]</font>
																					<?php
																					}
																				?>
																							</td>
																						</tr>
																					</table>
																					</b></font>
																					</td>
																				</tr>
																				</table>
																				<?php
																					// 조회수 업데이트
																					$result=mysql_query('update board set view=view+1 where id='.$id.'');
																					mysql_close();
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
