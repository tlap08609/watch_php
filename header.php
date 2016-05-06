<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>MS機械錶專賣店</title>
<link href='http://fonts.googleapis.com/css?family=Aldrich'
	rel='stylesheet' type='text/css'>
<!-- min=壓縮檔 cdn-->
<link rel="stylesheet"
	href="css/bootstrap.css">
<!-- slider專用-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/form.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/jquery.zoom.js"></script>

<!-- ckeidtor -->
<script src="ckeditor/ckeditor.js"></script>

<!-- form -->
<link rel="stylesheet"
	href="css/form.css">
<!-- 全部css -->
<link rel="stylesheet"
	href="css/header.css">
<link rel="stylesheet"
	href="css/footer.css">
<link rel="stylesheet"
	href="css/style.css">

</head>

<body>
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 topbar">
					<c:if test="${ ! empty LoginOK }">
						<div class="col-md-2 col-md-offset-7 text-center"
							style="color: white">，你好！
						</div>
					</c:if>
					<c:if test="${ ! empty LoginOK }">
						<div class="col-md-2 text-center" style="color: white">
							<a href="MemberSelfManage?memberId=${LoginOK.id}"><span
								class="glyphicon glyphicon-folder-open"></span> 會員專區</a>
						</div>
					</c:if>
					<c:if test="${ ! empty LoginOK }">
						<div class="col-md-1">
							<a href="logOut.jsp"><span
								class="glyphicon glyphicon-new-window"></span> 登出</a>

						</div>
					</c:if>
					<c:if test="${ empty LoginOK }">
						<div class="col-md-2  col-md-offset-10">
							<a href="#" role="button" data-toggle="modal"
								data-target="#login-modal"><span
								class="glyphicon glyphicon-user"></span> 會員登入</a>
						</div>
					</c:if>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-11">
					<ul class="row menu">
						<li class="col-md-3 logogroup"><a href="index.jsp">
								<p class=" logopic">MS</p>
								<p class="logotext">機械錶專賣店</p>
						</a></li>
						<li class="col-md-2 aboutus"><a href="aboutUs.jsp">關於我們</a></li>
						<li class="col-md-2"><a href="ShowProductIndex">購物商城</a></li>
						<li class="col-md-2"><a href="MessangeBoard.jsp">留言板</a></li>
						<li class="col-md-2"><a href="address.jsp">會員服務</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!--隱藏表單     -->
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img class="img-circle" id="img_logo"
						src="images/watch_logo.png">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>

				<!-- Begin # DIV Form -->
				<div id="div-forms">

					<!-- Begin # Login Form -->
					<form action="login.do" method="post" id="login-form">
						<div class="modal-body">
							<div id="div-login-msg">
								<div id="icon-login-msg"
									class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-login-msg">請輸入你的帳號跟密碼</span>
							</div>
							<input id="login_username" class="form-control" type="text"
								name="userId" placeholder="帳號" required> <input
								id="login_password" class="form-control" type="password"
								name="pswd" placeholder="密碼" required> <input
								id="Check_ver" class="form-control" type="text" name="userId"
								placeholder="驗證碼" required>

							<div class="checkbox">
								<label> <input type="checkbox" name="rememberMe">
									記得我
								</label>
							</div>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">登入</button>
							</div>
							<div>
								<button id="login_lost_btn" type="button" class="btn btn-link">忘記密碼？</button>
								<button id="login_register_btn" type="button"
									class="btn btn-link">註冊</button>
							</div>
						</div>
					</form>
					<!-- End # Login Form -->

					<!-- Begin | Lost Password Form -->
					<form action="Forgetpassword" method="post" id="lost-form"
						style="display: none;">
						<div class="modal-body">
							<div id="div-lost-msg">
								<div id="icon-lost-msg"
									class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-lost-msg">忘記密碼？請填寫你的帳號跟email</span>
							</div>
							<input id="12345" name="fId" class="form-control" type="text"
								placeholder="帳號" required> <input id="lost_email"
								name="fEmail" class="form-control" type="text"
								placeholder="email" required>

						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">送出</button>
							</div>
							<div>
								<button id="lost_login_btn" type="button" class="btn btn-link">登入</button>
								<button id="lost_register_btn" type="button"
									class="btn btn-link">註冊</button>
							</div>
						</div>
					</form>
					<!-- End | Lost Password Form -->

					<!-- Begin | Register Form -->
					<form action="test.do" method="post" id="register-form"
						style="display: none;">
						<div class="modal-body">
							<div id="div-register-msg">
								<div id="icon-register-msg"
									class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-register-msg">註冊一個帳號</span>
							</div>
							<input id="register_username" name="iId" class="form-control"
								type="text" placeholder="請輸入使用者名稱 " required> <input
								id="register_password" name="iPs" class="form-control"
								type="password" placeholder="請輸入密碼" required> <input
								id="register_password" name="iCheckPs" class="form-control"
								type="password" placeholder="密碼確認" required> <input
								id="register_email" name="iEmail" class="form-control"
								type="text" placeholder="E-Mail" required>

						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">註冊</button>
							</div>
							<div>
								<button id="register_login_btn" type="button"
									class="btn btn-link">登入</button>
								<button id="register_lost_btn" type="button"
									class="btn btn-link">忘記密碼？</button>
							</div>
						</div>
					</form>
					<!-- End | Register Form -->

				</div>
				<!-- End # DIV Form -->

			</div>
		</div>
	</div>