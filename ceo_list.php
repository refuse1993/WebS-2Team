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

													<table width=580 border=0 cellpadding=2 cellspacing=1
													bgcolor=#89410b class="table-striped">
															<tr height=20 bgcolor=#999999>
																	<td width=30 align=center>
																			<font color=white>번호</font>
																	</td>
																	<td width=370 align=center>
																			<font color=white>제 목</font>
																	</td>
																	<td width=50 align=center>
																			<font color=white>분 류</font>
																	</td>
																	<td width=60 align=center>
																			<font color=white>날 짜</font>
																	</td>
																	<td width=50 align=center>
																			<font color=white>조회수</font>
																	</td>
															</tr>
													<?php

													if(!isset($_SESSION["member_id"]) || !isset($_SESSION["member_password"])){
																header('Location: ceo_login.php');
																break;
													}

													include "db_connect.php";

													$selDb=mysql_select_db('board');


													$page_size=10;

													$page_list_size = 10;
													$no = $_GET[no];
													if (!$no || $no <0) $no=0;

													$queryData=mysql_query('select * from board order by id desc limit '.$no.', '.$page_size.'');
													if(!$queryData){
															echo('query error! :'.mysql_error());
													}

													$result_count=mysql_query('select count(*) FROM board');
													$result_row=mysql_fetch_row($result_count);
													$total_row = $result_row[0];

													if ($total_row <= 0) $total_row = 0;
													$total_page = ceil($total_row / $page_size);


													$current_page = ceil(($no+1)/$page_size);



													while($row=mysql_fetch_array($queryData)){

															?><tr>
																	<td height=20 bgcolor=white align=center>
																	<?=$row[id]?>
																	</td>
																	<td height=20 bgcolor=white>
																		<a href="ceo_read.php?id=<?=$row[id]?>"><?=$row[title]?></a></td>
																		<td align=center height=20 bgcolor=white>
																			<font color=black><?=$row[name]?></td>
																		<td align=center height=20 bgcolor=white>
																			<font color=black><?=substr($row[wdate],2,9)?></td>
																		<td align=center height=20 bgcolor=white>
																			<font color=black><?=$row[view]?></td>
									<?php
													}
												?>
											</tr>
											</table>
											<!-- 게시물 리스트를 보이기 위한 테이블 끝-->
											<!-- 페이지를 표시하기 위한 테이블 -->
											<table border=0 class="pagination">
											<tr>
													<td width=600 height=20 align=center rowspan=4 >
													<font color=gray>

									<?php
													$start_page = floor(($current_page - 1) / $page_list_size) * $page_list_size + 1;

													$end_page = $start_page + $page_list_size - 1;

													if ($total_page <$end_page) $end_page = $total_page;
																	if ($start_page >= $page_list_size) {
																			$prev_list = ($start_page - 2)*$page_size;?>
																			<a href="<?=$PHP_SELF?>?no=<?=$prev_list?>">◀</a>
																			<?php
																	}
													 ?>
									<?php
													for ($i=$start_page;$i <= $end_page;$i++) {
															$page= ($i-1) * $page_size;
															if ($no!=$page){
															?>
																	<a href="<?=$PHP_SELF?>?no=<?=$page?>">
															<?php
															}
															?>
															<?=$i?>
															<?php
															if ($no!=$page){?>
																	</a>
															<?php
															}
													}
													if($total_page >$end_page)
													{
															$next_list = $end_page * $page_size;?>
															<a href="<?=$PHP_SELF?>?no=<?=$next_list?>">▶</a><p>
																<?php
													}
											?>
															</font>
															</td>
													</tr>
													</table>

													<a style="margin:auto;" href = "ceo_write.php" class = "button style1"><font color = white>글쓰기</font></a>
												</article>
								</article>
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
