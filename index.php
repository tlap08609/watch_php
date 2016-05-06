<?php include('header.php');?>
<!-- 這邊是投影片slider -->
<div class="container">
	<div class="row">
		<div class="col-md-12 tt1">
			<div id="carousel-example-generic" class="carousel slide"
				data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0"
						class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="images/slider/slide1.jpg" height="708" width="1170"
							alt="...">
						<div class="carousel-caption"></div>
					</div>
					<div class="item">
						<img src="images/slider/slide2.jpg" height="708" width="1170"
							alt="...">
						<div class="carousel-caption"></div>
					</div>
					<div class="item">
						<img src="images/slider/slide3.jpg" height="708" width="1170"
							alt="...">
						<div class="carousel-caption"></div>
					</div>
					<div class="item">
						<img src="images/slider/slide4.jpg" height="708" width="1170"
							alt="...">
						<div class="carousel-caption"></div>
					</div>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic"
					role="button" data-slide="prev"> <span
					class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a> <a class="right carousel-control" href="#carousel-example-generic"
					role="button" data-slide="next"> <span
					class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- slider以下 -->
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>最新消息</h1>
			<hr>
		</div>
	</div>
</div>




<div class="container tt">
	<div class="row">
		<div class="col-md-4 portfolio-item com-box1">
			<a href="scroll.html" target="_blank"> <img
				class="img-responsive" src="images/main/conboximg1.png" alt="">
				<div class="text">
					<h5 class="text-center">見證精準的時刻</h5>
					<h5 class="text-center">Le Locle Automatic Chronometer</h5>
				</div>
			</a>
		</div>
		<div class="col-md-4 portfolio-item com-box2">
			<a href="choose.jsp"> <img class="img-responsive"
				src="images/main/conboximg2.png" alt="">
				<div class="text">
					<h5 class="text-center">試戴您的情人節腕錶</h5>
					<h5 class="text-center">LONGINES系列</h5>
				</div>
			</a>
		</div>
		<div class="col-md-4 portfolio-item com-box3">
			<a href="service.jsp"> <img class="img-responsive"
				src="images/main/conboximg3.png" alt="">
			
			<div class="text">
				<h5>新增會員服務</h5>
				<h5>維修服務說明（需要先登入會員）</h5>
			</div>
			</a>
		</div>
	</div>
</div>
<?php include('footer.php');?>
