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
<title>H D M</title>
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
				<h6 style="text-align: left;color: #BBDEFB">- đây ↓ là chân dung người đang duyệt cfs nè :v -</h6>
				<div class="row" style="text-align: left;padding: 10px;">
					<img class="" src="{{$avatar}}" style="border: #CFD8DC solid 3px;border-radius: 50px;float: left;" width="70px" height="70px">
					<div style="padding: 2px;padding-left: 10px">
						<h4 style="">{{$user['first_name'].' '.$user['last_name']}}</h4>
						<h5 style="color: #C8E6C9">{{$user['email']}}</h5>
						<div style="padding: 5px">
							<a href="/logout" class="waves-effect waves-light btn blue-grey darken-4"><b class="">đăng xuất</b></a>
						</div>
					</div>
				</div>
				<div class="col s12">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
						@if(Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}" style="font-size: 12pt"><b>{{ Session::get('alert-' . $msg) }}</b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
						@endif
						@endforeach
					</div>
			</div>
			<hr>
			<h6><b>CÁC BẠN VUI LÒNG DUYỆT TỪ TRÊN XUỐNG ( ↓ ) NHÉ !</b></h6>
			<div style="padding: 10px;text-align: left">
				@foreach($data as $key => $data)
				<form class="col s6" action="/page/id={{$data->id}}" method="get" style="padding: 10px">
					<div style="width: 100%;padding: 10px;border: #e0e0e0 dashed 2px">
						<div class="row" style="width: 100%;padding: 10px">
							<div class="col s12 m6" style="float: left">
								<h5 class="txt-grad2"><b>Chưa được duyệt !</b></h5><br>
								<h6><b>{{$data->date}}</b></h6>
								<h6><b>User: ẩn danh</b></h6>
							</div>
							<div class="col s12 m6" style="float: right;text-align: right;">
								<div style="padding: 5px"><button type=submit class="waves-effect waves-light btn blue-grey darken-4"><b class="txt-grad2">Duyệt cfs này</b></button></div>
								<div style="padding: 5px"><button type=submit class="waves-effect waves-light btn deep-orange darken-4"><b >Loại bỏ</b></button></div>
							</div><br>
						</div>
						<div class="card grey darken-4" style="display: block;overflow: auto;padding: 10px">
							<tr>    
								<th>{{$data->noidung}}</th><br>              
							</tr>
						</div>
					</div>
				</form>
				<hr>
				@endforeach
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