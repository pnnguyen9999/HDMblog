@extends('layouts.main')

@section('mainpage-load')
<div style="padding: 30px;padding-top:0px;text-align: left;">
	<blockquote style="border-left-color: #7bc6cc">
		<b style="font-size:14pt;color: #ef9a9a"><img src="/funny/star3.gif" width="25px" height="25px"> QUY ĐỊNH :</b><br>
		Bọn mình sẽ <kbd>xoá không điều kiện</kbd> với các cfs vi phạm những điều sau:<br>
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
	<div style="text-align: center;padding: 30px" class="">
		<button type=submit class="waves-effect waves-light btn blue-grey darken-4">
			<i style="font-size:15px" class="fas fa-paper-plane txt-grad1"></i><b class="txt-grad1"> Gởi Confession</b>
		</button>
	</div>
</form>
<div class="card-reveal black-text">
	<span class="card-title grey-text text-darken-3">Card Title<i class="material-icons right">close</i></span>
	<p>Here is some more information about this product that is only revealed once clicked on.</p>
</div>
@stop