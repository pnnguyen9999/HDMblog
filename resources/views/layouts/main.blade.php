
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
	#grad4 {
		background-color: #212121;
		background-position: relative;
		background-repeat: no-repeat;
		background-size: 100% 100% ;
	}
	.input-field input[type=text] + label, .materialize-textarea:focus:not([readonly]) + label {
		color: #1a237e !important;
	}

	.input-field input[type=text], .materialize-textarea:focus:not([readonly]) {
		border-bottom: 1px solid #1a237e !important;
		box-shadow: 0 1px 0 0 #1a237e !important;
	}


	.input-field input[type=text]:focus + label, .materialize-textarea:focus:not([readonly]) + label {
		color: #EEEEEE !important;
	}

	.input-field input[type=text]:focus, .materialize-textarea:focus:not([readonly]) {
		border-bottom: 1px solid #9E9E9E !important;
		box-shadow: 0 1px 0 0 #9E9E9E !important;
	}
</style>

@yield('css')

<title>HDM Confessions</title>
</head>
<body id="grad4" style="color: #ffffff;text-align: center;font-family: 'Nunito', sans-serif;">
	<!-- PART1 -->
	<div class="col-sm-12">
		<div class="row" style="">
			<div class="col-xl-3 col-lg-2">
			</div>
			<div class="fixed-top right" style="padding: 15px;z-index: 1">
				<div style="padding:10px">
					<div class="row desktopPanel" style="">
						<div class="col-xl-12 col-lg-12 col-sm-3 col-3" style="padding: 5px;">
							<a href="{{ route('home') }}" class="waves-effect waves-block waves-light" style="width:100px;height: 100px;padding:10px;border: #7bc6cc dashed 3px;float: right;color:#ffffff;justify-content: center;align-items: center;text-decoration: none;background-color: #263238">
								<i class="fas fa-feather-alt txt-grad1" style="font-size: 32pt;"></i><br>
								<h6 style="padding-top:10px" class="txt-grad1"><b>nhà</b></h6>
							</a>
						</div>
						<div class="col-xl-12 col-lg-12 col-sm-3 col-3" style="padding: 5px;">
							<a href="#" class="waves-effect waves-block waves-light" style="width:100px;height: 100px;padding:10px;border: #7bc6cc dashed 3px;float: right;color:#ffffff;justify-content: center;align-items: center;text-decoration: none;background-color: #37474F">
								<i class="fas fa-book txt-grad2" style="font-size: 32pt;"></i><br>
								<h6 style="padding-top:10px">đã đăng</h6>
							</a>
						</div>
						<div class="col-xl-12 col-lg-12 col-sm-3 col-3" style="padding: 5px;">
							<a href="#" class="waves-effect waves-block waves-light" style="width:100px;height: 100px;padding:10px;border: #7bc6cc dashed 3px;float: right;color:#ffffff;justify-content: center;align-items: center;text-decoration: none;background-color: #37474F">
								<!-- <i class="fas fa-feather-alt txt-grad2" style="font-size: 32pt;"></i><br> -->
								<span class="txt-grad2" style="font-size: 24pt;font-family: 'hdm', cursive;" href="#"><b>HDM</b></span>
								<h6 style="padding-top:10px">hội hdm :*</h6>
							</a>
						</div>
						<div class="col-xl-12 col-lg-12 col-sm-3 col-3" style="padding: 5px;">
							<a href="/pre_login" class="waves-effect waves-block waves-light" style="width:100px;height: 100px;padding:10px;border: #7bc6cc dashed 3px;float: right;color:#ffffff;justify-content: center;align-items: center;text-decoration: none;background-color: #37474F">
								<i class="fas fa-atom txt-grad2" style="font-size: 32pt;"></i><br>
								<h6 style="padding-top:10px">quản trị</h6>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="mainContent" style="z-index:99;width: 620px;margin: 0 auto;position: relative;" ><!-- blue-grey darken-2 -->
				<div class="card blue-grey darken-2" style="display: block;overflow: auto;">
					<div class="card-image waves-effect waves-block waves-light">
						<img class="img1 activator" src="{{ URL::asset('sources/images/background.jpg') }}">
					</div>
					<div class="card-title card-content" style="text-align: center;padding-bottom: 0px">
						<a class="hdmmainTitle txt-grad2" style="letter-spacing: 0px;color: #ffffff;font-size: 37pt;font-family: 'hdm', cursive;" href="#"><b>HDM Confessions</b></a><br>
						<img src="/funny/heart2.gif" width="30px" height="30px">
					<!-- <marquee scrollamount="5">
						<h6>chào mừng các bạn đến với ngôi nhà mới của chúng tớ ^^</h6>
					</marquee> -->

						<div class="mobilePanel col-sm-12" style="display: none">
							<hr>
							<h6><kbd style="font-family: Nunito">này là menu nè :3</kbd></h6>
							<div class="row" style="padding: 5px;">
								<a href="/" class="col-3 waves-effect waves-block waves-light" style="width:35px;height: 35px;border: #7bc6cc dashed 1px;color:#ffffff;text-decoration: none;background-color: #263238;display: flex;justify-content: center;align-items: center">
									<i class="fas fa-feather-alt txt-grad1" style="font-size: 15pt;"></i>
								</a>
								<a href="#" class="col-3 waves-effect waves-block waves-light" style="width:35px;height: 35px;border: #7bc6cc dashed 1px;color:#ffffff;text-decoration: none;background-color: #37474F;display: flex;justify-content: center;align-items: center">
									<i class="fas fa-book txt-grad2" style="font-size: 15pt;"></i>
								</a>
								<a href="#" class="col-3 waves-effect waves-block waves-light" style="width:35px;height: 35px;border: #7bc6cc dashed 1px;color:#ffffff;text-decoration: none;background-color: #37474F;display: flex;justify-content: center;align-items: center">
									<span class="txt-grad2 hdmiconMob" style="font-size: 15pt;font-family: 'hdm', cursive;margin-top: -3px"><b>HDM</b></span>
								</a>
								<a href="/login" class="col-3 waves-effect waves-block waves-light" style="width:35px;height: 35px;border: #7bc6cc dashed 1px;color:#ffffff;text-decoration: none;background-color: #37474F;display: flex;justify-content: center;align-items: center">
									<i class="fas fa-atom txt-grad2" style="font-size: 15pt;"></i>
								</a>
							</div>
							<hr>
						</div>
					</div>

				@yield('mainpage-load')
				&nbsp;<hr>
				<div style="text-align: center; padding-bottom: 27px;">
					<a href="https://www.facebook.com/huongdaumuanh/" target="_blankd" style="cursor: pointer;"><img src="/sources/images/hdm2011_blue.png" width="20%"><a>
					<a href="https://www.facebook.com/hdmconfessions/" target="_blankd" style="cursor: pointer;"><img src="/sources/images/hdm2017.png" width="20%"></a><br>
					<p><i class="txt-grad2" style="font-size: 10pt">HDM Confessions 2019 - Hương Đầu Mùa</i><br>
					<i class="txt-grad2" style="font-size: 10pt">THPT Nguyễn Huệ - Huế &nbsp;</i></p>	
				</div>
				<div class="card-reveal black-text" style="background-color: #e5ddda;padding: 0px">
					<span class="card-title grey-text text-darken-3" style="font-size: 25pt">×</span>
					<img src="/sources/images/hdmpanel.png" width="100%">
					<img src="/sources/images/hdm2011.png" width="25%"><br>
					<a href="http://hdmcfs.com/" style="letter-spacing: 5px;color: #304d7e;font-size: 12pt">hdmcfs.com</a>
				</div>
				<!-- insert -->
			</div>
		</div>
		<div class="col-xl-1 col-lg-2" style="margin: 0 auto;position: relative;" >
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#acceptAll").hide();
		$('select').formSelect();
		//$('textarea#textarea2').characterCounter();
		$('#textarea2').keyup(function () {
			var max = 500;
			var len = $(this).val().length;
			$('#charNum').text(len);
		});
		var $checkboxes = $('#form1 input[type="checkbox"]');

		$checkboxes.change(function(){
			var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        	$('#countText').val(countCheckedCheckboxes);
        	if (countCheckedCheckboxes != 0) {
        		$("button.accept").attr("disabled", true);
        		$("#acceptAll").show();
        	} else {
        		$("button.accept").attr("disabled", false);
        		$("#acceptAll").hide();
        	}
    	});
	});
</script>
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
@yield('js')
</body>
</html>
