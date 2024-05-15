<?php echo form_open('','role="form"'); ?>
<div class="login-form-container">
	<div class="login top0 formAccount" id="updateInfoForm">
		<h1>Đăng ký tài khoản</h1>

		<div class="login-form">
			<div class="login-email login-inputtext">
				<div><span></span></div>
				<input autocomplete="username" class="textEntry" id="UserName" maxlength="64" required name="email" placeholder="Email" type="text" value="">
			</div>

			<div class="login-password login-inputtext">
				<div><span></span></div>
				<input autocomplete="current-password" class="pass-blind" id="Password" name="password" placeholder="Mật khẩu" type="password" required value="">
				<!--				<input class="pass-visible" id="ShowPassword" name="ShowPassword" placeholder="Mật khẩu" type="text" value="">-->
				<!--				<div class="eye-close"></div>-->
				<!--				<div class="eye-open"></div>-->
			</div>
			<div class="login-username login-inputtext">
				<div><span></span></div>
				<input autocomplete="current-name" class="pass-blind" id="full-name" name="full-name" placeholder="Họ tên" type="text" required value="">
				<!--				<input class="pass-visible" id="ShowPassword" name="ShowPassword" placeholder="Mật khẩu" type="text" value="">-->
				<!--				<div class="eye-close"></div>-->
				<!--				<div class="eye-open"></div>-->
			</div>
			<button class="login-button" name="btn_reg" type="submit" id="btnRegister"><i class="fa fa-spinner fa-spin"></i>Đăng ký</button>
			<?php echo $msg; ?>
			<div class="clear"></div>
			<div class="login-or">
				<div class="or-left"></div>Hoặc
				<div class="or-right"></div>
			</div>
			<div class="login-social">
				<div class="login-facebook" id="loginByFacebook">
					<div class="fa fa-facebook-square"></div><?php echo $url_facebook; ?>
				</div>
				<div class="login-google">
					<!--CongDV login hệ thống MSV-->
					<!--CongDV login hệ thống batdongsan cũ-->
					<div class="fa fa-google-plus-square"></div><a href="/dang-nhap-qua-google">Đăng ký qua Google</a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="login-reg">
			Bạn đã là thành viên? <a href="/dang-nhap" id="showRegister">Đăng nhập</a>
		</div>
	</div>
</div>
<?php echo form_close();?>
