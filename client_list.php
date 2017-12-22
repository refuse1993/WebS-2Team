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
		<link rel="stylesheet" href="assets/css/main.css?ver=211" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Logo -->
							<div id="logo">
							</div>

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
											<header class="style1">
											</header>

											        <table width=580 border=0 cellpadding=2 cellspacing=1
											        bgcolor=#89410b class="table-striped">
											            <tr height=20 bgcolor=#999999>
											                <td width=30 align=center>
											                    <font color=white>번호</font>
											                </td>
											                <td width=50 align=center>
											                    <font color=white>분 류</font>
											                </td>
											                <td width=370 align=center>
											                    <font color=white>제 목</font>
											                </td>
											                <td width=60 align=center>
											                    <font color=white>날 짜</font>
											                </td>
											                <td width=50 align=center>
											                    <font color=white>조회수</font>
											                </td>
											            </tr>
											        <?php

											        include "db_connect.php";

											        $page_size=10;

											        $page_list_size = 10;
											        $no = $_GET[no];
											        if (!$no || $no <0) $no=0;

											        $selDb=mysql_select_db('board');
											        $queryData=mysql_query('select * from board order by id desc limit '.$no.', '.$page_size.'');
											        if(!$queryData){
											            echo('query error :'.mysql_error());
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
																			<td align=center height=20 bgcolor=white>
											                    <font color=black><?=$row[name]?></td>
											                <td height=20 bgcolor=white>
											                  <a href="client_read.php?id=<?=$row[id]?>"><?=$row[title]?></a></td>

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
