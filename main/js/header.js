header =' <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">\
		<a class="navbar-brand" href="../overView.php">\
			<span class="h3 mx-1">FLAX</span>\
			<img src="../image/Pornlogo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">\
		</a>\
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">\
			<ul class="navbar-nav mr-auto">\
				<li class="nav-item">\
					<a class="nav-link" href="../project.php">專案列表</a>\
				</li>\
				<li class="nav-item">\
					<a class="nav-link" href="../newProject.php">新增專案</a>\
				</li>\
				<li class="nav-item dropdown">\
					<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">帳戶</a>\
					<div class="dropdown-menu" aria-labelledby="dropdown01">\
						<a class="dropdown-item" href="#">個人資料</a>\
						<a class="dropdown-item" href="../logout.php">登出</a>\
					</div>\
				</li>\
			</ul>\
			<form class="form-inline my-2 my-lg-0">\
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">\
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>\
			</form>\
		</div>\
	</nav>';
document.write(header);
	