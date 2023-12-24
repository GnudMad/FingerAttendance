<!DOCTYPE html>
<html>

<head>
	<title>Manage Users</title>
	<link rel="stylesheet" type="text/css" href="css/manageusers.css">

	<script>
		$(window).on("load resize ", function() {
			var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
			$('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>

	<script src="https://code.jquery.com/jquery-3.3.1.js"
			integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			crossorigin="anonymous">
	</script>

	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/manage_users.js"></script>

	<script>
		$(document).ready(function(){
			$.ajax({
				url: "manage_users_up.php"
				}).done(function(data) {
				$('#manage_users').html(data);
			});
			setInterval(function(){
				$.ajax({
					url: "manage_users_up.php"
					}).done(function(data) {
					$('#manage_users').html(data);
				});
			},5000);
		});
	</script>
</head>

<body>

	<?php include'header.php';?>

	<main>
		<h1 class="slideInDown animated">QUẢN LÝ DANH SÁCH NHÂN VIÊN</h1>
		<div class="form-style-5 slideInDown animated">
			<div class="alert">
			<label id="alert"></label>
			</div>
			<form>
				<fieldset>
				<legend><span class="number">1</span> Finger ID</legend>
					<label>Nhập 1 số ID từ 1 - 127:</label>
					<input type="number" name="fingerid" id="fingerid" placeholder="Nhập số vào đây">
					<button type="button" name="fingerid_add" class="fingerid_add">Xác nhận</button>
				</fieldset>
				<fieldset>
					<legend><span class="number">2</span> Thông tin nhân viên</legend>
					<input type="text" name="name" id="name" placeholder="Họ tên...">
					<input type="text" name="number" id="number" placeholder="CCCD...">
					<input type="email" name="email" id="email" placeholder="Email...">
					<input type="radio" name="gender" class="gender" value="Female">Nữ
					<input type="radio" name="gender" class="gender" value="Male" checked="checked">Nam
				</fieldset>
				<fieldset>
				<!--<legend><span class="number">3</span> Thông tin khác</legend>-->
				<label>
					<!--Time In:
					<input type="time" name="timein" id="timein">
					<input type="radio" name="gender" class="gender" value="Female">Nữ
					<input type="radio" name="gender" class="gender" value="Male" checked="checked">Nam-->
				</label >
				</fieldset>
				<button type="button" name="user_add" class="user_add">Thêm nhân viên</button>
				<button type="button" name="user_upd" class="user_upd">Chỉnh sửa</button>
				<button type="button" name="user_rmo" class="user_rmo">Xoá nhân viên</button>
			</form>
		</div>

		<div class="section">
		<!--User table-->
			<div class="tbl-header slideInRight animated">
				<table cellpadding="0" cellspacing="0" border="0">
				<thead>
					<tr>
					<th>Finger ID</th>
					<th>Họ tên</th>
					<th>Giới tính</th>
					<th>CCCD</th>
					<th>Email</th>
					</tr>
				</thead>
				</table>
			</div>
			<div class="tbl-content slideInRight animated">
				<table cellpadding="0" cellspacing="0" border="0">
				<div id="manage_users"></div>
			</div>
		</div>
	</main>
</body>
</html>