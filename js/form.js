$(function() {

	var $formLogin = $('#login-form');
	var $formLost = $('#lost-form');
	var $formRegister = $('#register-form');
	var $divForms = $('#div-forms');
	var $modalAnimateTime = 300;
	var $msgAnimateTime = 150;
	var $msgShowTime = 3000;

	$("form")
			.submit(
					function() {
						switch (this.id) {
//						case "memberCheck":
//							var $Check_ver = $('#Check_ver').val();
//							if ($Check_ver !== "java001Class") {
//								$('#Check_ver').css('border-color', 'red');
//								$('#id_info').text('錯誤驗證碼');
//								return false;
//							} else {
//
//								$('#Check_ver').css('border-color', '#ddd');
//								$('#id_info').text('正確!!');
//								return true;
//							}
//							return false;

						case "login-form":
							var $lg_username = $('#login_username').val();
							var $lg_password = $('#login_password').val();
							 var $Check_ver = $('#Check_ver').val();
							 if ($lg_username == "ERROR") {
							 msgChange($('#div-login-msg'),
							 $('#icon-login-msg'),
							 $('#text-login-msg'), "error",
							 "glyphicon-remove", "Login error");
							 } else {
							 msgChange($('#div-login-msg'),
							 $('#icon-login-msg'),
							 $('#text-login-msg'), "success",
							 "glyphicon-ok", "Login OK");
							 }
							 if ($Check_ver !== "java001Class") {
							 msgChange($('#div-login-msg'),
							 $('#icon-login-msg'),
							 $('#text-login-msg'), "error",
							 "glyphicon-remove", "驗證錯誤");
							
							 return false;
							 } else {
							 msgChange($('#div-login-msg'),
							 $('#icon-login-msg'),
							 $('#text-login-msg'), "success",
							 "glyphicon-ok", "驗證中....");
							 return true;
							 }
							return false;
							//							
							// return false;
							// break;
						case "lost-form":
							var $ls_email = $('#lost_email').val();
							if ($ls_email == "ERROR") {
								msgChange($('#div-lost-msg'),
										$('#icon-lost-msg'),
										$('#text-lost-msg'), "error",
										"glyphicon-remove", "Send error");
							} else {
								msgChange($('#div-lost-msg'),
										$('#icon-lost-msg'),
										$('#text-lost-msg'), "success",
										"glyphicon-ok", "已寄出！！");
							}
							return true;
//							break;
						case "register-form":
							var tim = true;
							var $rg_username = $('#register_username').val();
							var $rg_password = $('#register_password').val();
							var $rg_email = $('#register_email').val();
							var $pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
							if ($rg_username.trim().length == 0
									|| $rg_password.trim().length == 0
									|| $rg_email.trim().length == 0) {
								msgChange($('#div-register-msg'),
										$('#icon-register-msg'),
										$('#text-register-msg'), "error",
										"glyphicon-remove", "內容不可包括空白字元");
								return false;
							}
							if (!$pattern.test($rg_email)) {
								msgChange($('#div-register-msg'),
										$('#icon-register-msg'),
										$('#text-register-msg'), "error",
										"glyphicon-remove", "請輸入正確的Email帳號");
								return false;
							} else {
								msgChange($('#div-register-msg'),
										$('#icon-register-msg'),
										$('#text-register-msg'), "success",
										"glyphicon-ok", "格式正確，驗證信已經寄到你信箱囉！");
								return true;
							}

						case "adminCheck":
							var $tt = "java001";
							var $ad_username = $('#admin_username').val();
							var $ad_userpassword = $('#admin_password').val();
							console.log($ad_userpassword);
							// if ($ad_username.trim().length == 0
							// || $ad_userpassword.trim().length == 0) {
							if ($ad_username.trim().length == 0) {
								$('#admin_username').css('border-color', 'red');
								$('#id_info').text('請填寫帳號，或內容有空白字元');
								return false;
							}
							if ($ad_userpassword.trim().length == 0) {
								$('#admin_password').css('border-color', 'red');
								$('#ps_info').text('密碼錯誤，或內容有空白字元');
								return false;

							}

							// return false;
							// }
							if ($ad_username.trim().length !== 0
									&& $ad_userpassword.trim().length !== 0) {
								$('#admin_username')
										.css('border-color', '#ddd');
								$('#id_info').text('');
								$('#admin_password')
										.css('border-color', '#ddd');
								$('#ps_info').text('');

								if ($ad_username == $tt
										&& $ad_userpassword == $tt) {

									alert('正確，進入管理者頁面');
									return true;
								}
							}

							// return false;
						case "hiddencart":
							return true;
						case "OrderConfirm-form":
							return true;
						case "serviceForm":
							return true;
						case "queryProductForm":
							return true;
						case "updateUsername":
							return true;
						case "memberUpdateSelfMemberForm":
							
							return true;
						case "board":
							return true;
							
							
							
						default:
							return false;
						}
						// return true;
					});

	$('#login_register_btn').click(function() {
		modalAnimate($formLogin, $formRegister)
	});
	$('#register_login_btn').click(function() {
		modalAnimate($formRegister, $formLogin);
	});
	$('#login_lost_btn').click(function() {
		modalAnimate($formLogin, $formLost);
	});
	$('#lost_login_btn').click(function() {
		modalAnimate($formLost, $formLogin);
	});
	$('#lost_register_btn').click(function() {
		modalAnimate($formLost, $formRegister);
	});
	$('#register_lost_btn').click(function() {
		modalAnimate($formRegister, $formLost);
	});

	function modalAnimate($oldForm, $newForm) {
		var $oldH = $oldForm.height();
		var $newH = $newForm.height();
		$divForms.css("height", $oldH);
		$oldForm.fadeToggle($modalAnimateTime, function() {
			$divForms.animate({
				height : $newH
			}, $modalAnimateTime, function() {
				$newForm.fadeToggle($modalAnimateTime);
			});
		});
	}

	function msgFade($msgId, $msgText) {
		$msgId.fadeOut($msgAnimateTime, function() {
			$(this).text($msgText).fadeIn($msgAnimateTime);
		});
	}

	function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass,
			$msgText) {
		var $msgOld = $divTag.text();
		msgFade($textTag, $msgText);
		$divTag.addClass($divClass);
		$iconTag.removeClass("glyphicon-chevron-right");
		$iconTag.addClass($iconClass + " " + $divClass);
		setTimeout(function() {
			msgFade($textTag, $msgOld);
			$divTag.removeClass($divClass);
			$iconTag.addClass("glyphicon-chevron-right");
			$iconTag.removeClass($iconClass + " " + $divClass);
		}, $msgShowTime);
	}
});
