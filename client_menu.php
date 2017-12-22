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
		<link rel="stylesheet" href="assets/css/main.css?ver=1.0" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />


	</head>
	<body class="left-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li ><a href="client_main.html">청년족발</a></li>
									<li class="current">
										<a href="client_brand1.html">브랜드</a>
										<ul>
											<li><a href="client_brand1.html">청년족발</a></li>
											<li><a href="client_brand2.html">지점소개</a></li>
										</ul>
									</li>
									<li><a href="client_menu.php">메뉴</a></li>
									<li><a href="client_list.php">고객센터</a></li>
								</ul>
							</nav>

					</div>
				</div>

						<!-- Main -->
				<div class="wrapper style2">
					<div id="ssss" class="title">메뉴</div>
					<div id="main" class="container">
						<div class="row 150%">
							<div class="4u 12u(mobile)">

								<!-- Sidebar -->
									<div id="sidebar">
										<header>
										<img  src="images/menus.jpg" alt="" />
										</br>
										</header>
										<section class="box" style="overflow-x:hidden; height:500px;">
										<ul class="style2">
												<?php

										include "db_connect.php";

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
													<a href="#ssss"><img id="<?=$row[0]?>" onclick="chag(this.id);" src="data:image;base64,<?=$row[2]?>" alt="" width="250"></a>
													<input type="hidden" id="<?=$row[0]?>n" value="<?=$row[3]?>"/>
													<input type="hidden" id="<?=$row[0]?>d" value="<?=$row[4]?>"/>
													<input type="hidden" id="<?=$row[0]?>p" value="<?=$row[5]?>"/>
													</article>
													</li>
													<?php
												}
												?>
											</ul>
										</section>

										<script>
										function chag(id){
											var imgg = document.getElementById(id).src;
											var nm = document.getElementById(id+"n").value;
											var nd = document.getElementById(id+"d").value;
											var np = document.getElementById(id+"p").value;
											var re = document.getElementById("mainimagesa");
											var nn = document.getElementById("ssss");
											var dd = document.getElementById("mdes");
											var pp = document.getElementById("mpri");
											nn.innerHTML = nm;
											dd.innerHTML = nd;
											pp.innerHTML = np;
											re.src = imgg;
										}
										</script>

									</div>

							</div>

							<div class="8u 12u(mobile) important(mobile)">

								<!-- Content -->
									<div id="content">
										<article class="box post">
											<div>
												<img class="image featured" style="margin:auto;" id="mainimagesa" src="images/menu.png" alt="picture" />

													</br>
													<h1 id="mdes" style="margin:auto;"></h1>
													<h2 id="mpri" style="margin:auto;"></h2>
											</div>
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
																					<h3 class="icon fa-home">본점 주소</h3>
																					<p>
																						서울시 강서구<br />
																						내발산동<br />
																						강서로47길 86
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
																						02) 2666-8887
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

											<script src="assets/js/prototype.js"></script>
											<script src="assets/js/scriptaculous.js"></script>
										  <script src="assets/js/pic.js"></script>
											<script src="assets/js/jquery.min.js"></script>
											<script src="assets/js/jquery.dropotron.min.js"></script>
											<script src="assets/js/skel.min.js"></script>
											<script src="assets/js/skel-viewport.min.js"></script>
											<script src="assets/js/util.js"></script>
											<script src="assets/js/ie/respond.min.js"></script>
											<script src="assets/js/main.js"></script>
									</body>
