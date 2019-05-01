@extends('layouts.main')

@section('mainpage-load')
	<div style="padding: 30px;text-align: left;">
	<h3><b>Cảm ơn bạn đã gởi cfs về cho tụi mình !!</b></h3><br>
	<h6><i>Các cfs sẽ được duyệt trong thời gian sớm nhất có thể :*</i></h6>
		<hr>
		<h6>Confession của bạn có nội dung là:</h6>
		<blockquote>
			{{ $posts }}
		</blockquote>
	</div>
	<div style="text-align: center;padding: 10px" class="">
		<a href="/" class="waves-effect waves-light btn blue-grey darken-4"><b class="txt-grad1">trở về trang chủ</b></a>
	</div>
@stop