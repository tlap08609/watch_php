<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>MS機械錶專賣店－後台介面</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/jquery-ui.min.css">
<link href="../css/simple-sidebar.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Aldrich'
	rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- /#wrapper -->






<style>
.logogroup {
	color: white;
	position: relative;
}

.logopic {
	font-family: 'Aldrich', sans-serif;
	font-size: 50px;
	font-weight: 600;
	color: white;
}

.logotext {
	font-size: 14px;
	position: absolute;
	left: 81px;
	top: 10px;
}
</style>
</head>
<body>
	<div id="wrapper">
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand logogroup"><a href="index.jsp">
						<p class=" logopic">MS</p>
						<p class="logotext">機械錶專賣店</p>
				</a></li>
				<li><a href="adminQueryMember">管理員權限管理</a></li>
				<li><a href="usr.php">會員管理</a></li>
				<li><a href="admin_manageSlider.jsp">廣告管理</a></li>
				<li><a href="ShowProductAdmin">商城管理</a></li>
				<li><a href="adminQueryOrder">訂單管理</a></li>
				<li><a href="#">會員留言管理</a></li>

			</ul>
		</div>
		<!-- /#sidebar-wrapper -->