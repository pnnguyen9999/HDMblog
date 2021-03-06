@extends('layouts.main')

@section('mainpage-load')
<h6 class="txt-grad2 hdmminiTitle" style="padding-bottom: 10px;font-family: 'hdm', cursive;font-size: 20pt;"><b>trang gởi cfs</b></h6>
<hr>
<div style="padding: 0px;padding-top:10px;padding-bottom:10px;text-align: left;">
	<blockquote style="padding-left: 15px;border-left:#7bc6cc solid 7px">
		<b style="font-size:14pt;color: #ef9a9a"><img src="/funny/ic1.png" width="30px" height="30px"> QUY ĐỊNH :</b><br>
		<v style="color: #BDBDBD">bọn mình sẽ <v style="text-decoration: underline;text-decoration-color: #ef9a9a;color: #E0E0E0">xoá không điều kiện</v> với các cfs vi phạm những điều sau:</v><br>
		<b>1.</b> Nội dung giống với cfs đã được hiển thị lên page.<br>
		<b>2.</b> Sử dụng ngôn từ tục tĩu, teencode các kiểu, vv...<br>
		<b>3.</b> Mang tính đả kích, nói xấu, châm chọc, bóc phốt, vv...<br>
		<b>4.</b> Mang tính tiêu cực, có khả năng ảnh hưởng xấu đến cán bộ trong nhà trường.<br>
		<b>5.</b> Liên quan đến chính trị, xuyên tạc, vvv...
	</blockquote>
</div>
<hr>
<form class="col s12" action="{{ route('add_confession') }}" method="post">
	{{ csrf_field() }}
	<div class="row" style="padding:10px">
		<div class="input-field col s12">
			<textarea id="textarea2" class="materialize-textarea" style="color: #EEEEEE" data-length="" minlength="150" required="" aria-required="true" name="noidung"></textarea>
			<label for="textarea2">Nhập cfs của bạn vào đây ^^ :</label>
			<span class="helper-text txt-grad2">đã nhập <span id="charNum">0</span> ký tự, tối thiểu 150.</span>
		</div>
	</div>
	<div style="text-align: center;padding: 12px;padding-top: 5px" class="">
		<button type=submit class="waves-effect waves-light btn blue-grey darken-4" id="submit-confession">
			<i style="font-size:15px" class="fas fa-paper-plane txt-grad1"></i><b class="txt-grad1"> Gởi Confession</b>
		</button>
	</div>
</form>
@stop

@section('css')
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>
@endsection
