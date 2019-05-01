<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
</head>
<body id="grad4" style="color: #ffffff;text-align: center;">
	<!-- PART1 -->
	<div class="col s12" style="width: 700px;margin: 0 auto;position: relative;" >
		<div class="card blue-grey darken-2" style="display: block;overflow: auto;">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="img1" src="https://i.imgur.com/kLSiSR6.jpg">
				<!-- <img class="img1" src="https://scontent.fsgn5-6.fna.fbcdn.net/v/t1.0-9/55529906_2216158175074102_8978448254035296256_o.jpg?_nc_cat=106&_nc_oc=AQnJf9q5yA-SXZXHgtQjgCrHJqW1iMsPrqKqYtVz4TcI-JbWneNJu3A1H1-ttsHw17s&_nc_ht=scontent.fsgn5-6.fna&oh=ab8f72fb57cdda1a6dc58d179deb6439&oe=5D38FDF1"> -->
			</div>
			<div class="card-title card-content" style="text-align: center;">
				<a class="txt-grad2" style="letter-spacing: 0px;color: #ffffff;font-size: 25pt" href="#">HDM Confessions</a>
				<hr>
			</div>
			<div style="padding: 30px;text-align: left;">
				<h3><b>Cảm ơn bạn đã gởi cfs về cho tụi mình !!</b></h3><br>
				<h6><i>Các cfs sẽ được duyệt trong thời gian sớm nhất có thể :*<i></h6>
				<hr>
				<h6>Confession của bạn có nội dung là:</h6>
				<blockquote>
			      {{ $posts }}
			    </blockquote>
			</div>
			<div style="text-align: center;padding: 10px" class="">
				<a href="/" class="waves-effect waves-light btn blue-grey darken-4"><b class="txt-grad1">trở về trang chủ</b></a></button><br>
				<div style="text-align: center; padding: 30px;">
					<p><i class="txt-grad2" style="font-size: 10pt">(c) HDM Confessions 2019 - Hương Đầu Mùa | Nguyễn Huệ - Huế .</i></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script> var $ = require('jquery');</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select').formSelect();
		$('input#input_text, textarea#textarea2').characterCounter();
	});
</script>