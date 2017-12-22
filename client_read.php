<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>청년족발</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="client_main.html">청년족발</a></li>
									<li>
										<a href="client_brand1.html">브랜드</a>
										<ul>
											<li><a href="client_brand1.html">청년족발</a></li>
											<li><a href="client_brand2.html">지점소개</a></li>
										</ul>
									</li>
									<li><a href="client_menu.php">메뉴</a></li>
									<li class="current"><a href="client_list.php">고객센터</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">FAQ</div>
					<div id="main" class="container">
						<div class="row 150%">
							<div class="4u 12u(mobile)">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="box">
											<header>
											</header>
											<img class="image featured centered" src="images/question.png" alt="" />
											<h3>청년족발에 궁금하신 점을 확인하세요!!</h3>
										</section>
									</div>

							</div>
							<div class="8u 12u(mobile) important(mobile)">

								<!-- Content -->
									<div id="content">
										<article class="box post">

											<?php
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
												<td width=50 height=20 align=center bgcolor=#EEEEEE>분 류</td>
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
															<a href=client_list.php?no=<?=$no?>>
															[목록보기]</a>
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
													<a href=client_read.php?id=<?=$prev_id[id]?>>[다음]</a>
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
													<a href=client_read.php?id=<?=$next_id['id']?>>[이전]</a>
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
				</div>

							<!-- Footer -->
								<div id="footer-wrapper" class="wrapper">
									<div class="title">+++</div>
									<div id="footer" class="container">
										<header class="style1">
											<h2>청년족발에 대해 더 알고 싶으신가요?</h2>
											<p>
												청년족발과 함께라면 어느새 어엿한 사장님으로!!<br />
												젊음의 패기와 열정으로 진정한 족발을!!
											</p>
										</header>
										<hr />
										<div class="row 150%">
											<div class="6u 12u(mobile)">

												<!-- Contact Form -->
													<section>
														<form method="post" action="save.php">
															<div class="row 50%">
																<div class="6u 12u(mobile)">
																	<input type="text" name="name" id="contact-name" placeholder="Name" />
																</div>
																<div class="6u 12u(mobile)">
																	<input type="text" name="phone" id="contact-email" placeholder="phone" />
																</div>
															</div>
															<div class="row 50%">
																<div class="12u">
																	<textarea name="message" id="contact-message" placeholder="Message" rows="4"></textarea>
																</div>
															</div>
															<div class="row">
																<div class="12u">
																	<ul class="actions">
																		<li><input type="submit" class="style1" value="Send" /></li>
																		<li><input type="reset" class="style2" value="Reset" /></li>
																	</ul>
																</div>
															</div>
														</form>
													</section>

											</div>
											<div class="6u 12u(mobile)">

												<!-- Contact -->
													<section class="feature-list small">
														<div class="row">
															<div class="6u 12u(mobile)">
																<section>
																	<h3 class="icon fa-home">Mailing Address</h3>
																	<p>
																		Untitled Corporation<br />
																		1234 Somewhere Rd #987<br />
																		Nashville, TN 00000-0000
																	</p>
																</section>
															</div>
															<div class="6u 12u(mobile)">
																<section>
																	<h3 class="icon fa-comment">Social</h3>
																	<p>
																		<a href="#">@untitled-corp</a><br />
																		<a href="#">linkedin.com/untitled</a><br />
																		<a href="#">facebook.com/untitled</a>
																	</p>
																</section>
															</div>
														</div>
														<div class="row">
															<div class="6u 12u(mobile)">
																<section>
																	<h3 class="icon fa-envelope">Email</h3>
																	<p>
																		<a href="#">info@untitled.tld</a>
																	</p>
																</section>
															</div>
															<div class="6u 12u(mobile)">
																<section>
																	<h3 class="icon fa-phone">Phone</h3>
																	<p>
																		(000) 555-0000
																	</p>
																</section>
															</div>
														</div>
													</section>

											</div>
										</div>
										<hr />
									</div>
									<div id="copyright">
										<ul>
											<li>&copy; 한국항공대 웹프로그래밍 2조 </li><li>Design: 김영환</a></li>
										</ul>
									</div>
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
