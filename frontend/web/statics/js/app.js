$(function() {
	var $offset = 0;
	$('#homeheader').on('click', '.nav-link', function(event) {
		var _href = $(this).attr('href');
		var pos = _href.indexOf('#');
		var $position = $(_href.substr(pos)).offset().top;
		$('html, body').stop().animate({
			scrollTop: $position - $offset
		}, 600);
		event.preventDefault();
	});
	$(window).scroll(function() {
		if ($(window).scrollTop() > 60) {
			$('.header').addClass('header-fixed');
		} else {
			$('.header').removeClass('header-fixed');
		}
	});
	$(window).scroll(function() {
		$('.navbar-collapse.show').collapse('hide');
	});
	var m = $(".bg-img, .footer, section, div");
	m.each(function(t) {
		if ($(this).attr("data-background")) {
			$(this).css("background-image", "url(" + $(this).data("background") + ")")
		}
	});
	$(".home-carousel").owlCarousel({
		loop: true,
		margin: 0,
		nav: true,
		dots: false,
		animateOut: "fadeOut",
		animateIn: "fadeIn",
		active: true,
		autoplay: true,
		smartSpeed: 1000,
		autoplayTimeout: 5000,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			425: {
				items: 1
			},
			768: {
				items: 1
			},
			1024: {
				items: 1
			},
			1440: {
				items: 1
			}
		}
	});
	$(".client-items").owlCarousel({
		loop: true,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 3000,
		nav: false,
		dots: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			425: {
				items: 2
			},
			768: {
				items: 3
			},
			1024: {
				items: 4
			},
			1440: {
				items: 5
			}
		}
	});
	$(".counter").counterUp({
		delay: 10,
		time: 1000
	});
	if ($(".wow").length) {
		var s = new WOW({
			boxClass: "wow",
			animateClass: "animated",
			offset: 0,
			mobile: false,
			live: true
		});
		s.init()
	}
	
	$("#login-form").validate({
		rules:{
			'LoginForm[username]':{required:true},
			'LoginForm[password]':{required:true,rangelength:[5,20]},
		},
		messages:{
			'LoginForm[username]':{required:'请输入手机号码或邮箱'},
			'LoginForm[password]':{required:'请输入密码',rangelength:'密码应该为6-20位之间'},
		},
		submitHandler:function(form){
			$(form).find(":submit").attr("disabled", true);
			layer.load(2);
			form.submit();
		}
	});
	$("#form-signup").validate({
		rules:{
			'SignupForm[mobile]':{required:true,mobile:true,maxlength:11},
			'SignupForm[email]':{required:true,email:true},
			'SignupForm[password]':{required:true,rangelength:[6,20]},
			'SignupForm[verifyCode]':{required:true},
		},
		messages:{
			'SignupForm[mobile]':{required:'请输入手机号码',mobile:'手机号码格式不正确',maxlength:'手机号码长度不能超过11位数',},
			'SignupForm[email]':{required:'请输入邮箱地址',email:'邮箱地址格式不正确',},
			'SignupForm[password]':{required:'请输入密码',rangelength:'密码应该为6-20位之间'},
			'SignupForm[verifyCode]':{required:'请输入图形码',},
		},
		submitHandler:function(form){
			$(form).find(":submit").attr("disabled", true);
			layer.load(2);
			form.submit();
		}
	});
	$(document).on('click', '.logout', function(event) {
		var _href = $(this).attr('href');
		App.ajax({
			url: _href,
			type: 'post',
			success: function (data) {
				layer.msg('账号成功退出！', {icon: 1}, function(){
					location.reload();
				});
			}
		});
		event.preventDefault();
	});


});

