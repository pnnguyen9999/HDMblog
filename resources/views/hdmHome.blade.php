
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
<title>HDM Confessions</title>
</head>
<body id="grad4" style="color: #ffffff;text-align: center;">
	<!-- PART1 -->
	<div class="col s12" style="width: 620px;margin: 0 auto;position: relative;" ><!-- blue-grey darken-2 -->
		<div class="card blue-grey darken-2" style="display: block;overflow: auto;">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="img1" src="https://i.imgur.com/kLSiSR6.jpg">
				<!-- <img class="img1" src="https://scontent.fsgn5-6.fna.fbcdn.net/v/t1.0-9/55529906_2216158175074102_8978448254035296256_o.jpg?_nc_cat=106&_nc_oc=AQnJf9q5yA-SXZXHgtQjgCrHJqW1iMsPrqKqYtVz4TcI-JbWneNJu3A1H1-ttsHw17s&_nc_ht=scontent.fsgn5-6.fna&oh=ab8f72fb57cdda1a6dc58d179deb6439&oe=5D38FDF1"> -->
			</div>
			<div class="card-title card-content" style="text-align: center;">
				<a class="txt-grad2" style="letter-spacing: 0px;color: #ffffff;font-size: 30pt" href="#">HDM Confessions</a><br>
				<img src="/funny/heart2.gif" width="30px" height="30px">
				<!-- <marquee scrollamount="5">
					<h6>chào mừng các bạn đến với ngôi nhà mới của chúng tớ ^^</h6>
				</marquee> -->
				<hr>
			</div>
			
			<div style="padding: 30px;padding-top:0px;text-align: left;">
				<blockquote style="border-left-color: #7bc6cc">
					<b style="font-size:14pt;color: #ef9a9a"><img src="/funny/star3.gif" width="25px" height="25px"> QUY ĐỊNH :</b><br>
					Bọn mình sẽ xoá không điều kiện với các cfs vi phạm những điều sau:<br>
					<b>1.</b> Nội dung giống với cfs đã được hiển thị lên page.<br>
					<b>2.</b> Sử dụng ngôn từ tục tĩu, teencode các kiểu, vv...<br>
					<b>3.</b> Mang tính đả kích, nói xấu, châm chọc, bóc phốt, vv...<br>
					<b>4.</b> Mang tính tiêu cực, có khả năng ảnh hưởng xấu đến cán bộ trong nhà trường.<br>
					<b>5.</b> Liên quan đến chính trị, xuyên tạc, vv...
				</blockquote>
			</div>
			<form class="col s12" action="/insert" method="post">
				{{ csrf_field() }}
				<div class="row" style="padding:10px">
					<div class="input-field col s12">
						<textarea id="textarea2" class="materialize-textarea" style="color: #EEEEEE" data-length="" required="" aria-required="true" name="noidung"></textarea>
						<label for="textarea2">Nhập cfs của bạn vào đây ^^ :</label>
					</div>
				</div>
				<div style="text-align: center;" class="">
					<button type=submit class="waves-effect waves-light btn blue-grey darken-4">
						<i style="font-size:15px" class="fas fa-paper-plane txt-grad1"></i><b class="txt-grad1"> Gởi Confessions</b>
					</button><br>
				</div>
				<div style="text-align: center; padding: 30px;">
					<p><i class="txt-grad2" style="font-size: 10pt">HDM Confessions 2019 - Hương Đầu Mùa</i></p>
					<p><i class="txt-grad2" style="font-size: 10pt">THPT Nguyễn Huệ - Huế .</i></p>
				</div>
			</form>

			<div class="card-reveal black-text">
				<span class="card-title grey-text text-darken-3">Card Title<i class="material-icons right">close</i></span>
				<p>Here is some more information about this product that is only revealed once clicked on.</p>
			</div>
		</div>
	</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select').formSelect();
		$('textarea#textarea2').characterCounter();
	});
</script>