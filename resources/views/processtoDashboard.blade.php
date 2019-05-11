@extends('layouts.main')

@section('mainpage-load')
<h6 class="txt-grad2 hdmminiTitle" style="padding-bottom: 10px;font-family: 'hdm', cursive;font-size: 20pt;"><b>trang duyệt cfs</b></h6>
<hr>
<h4 style="color: #ffcdd2;letter-spacing: 5px">>> LƯU Ý !!!</h4><br>
<blockquote style="padding: 10px;padding-top:0px;font-size: 12pt;text-align: justify;border-left-color: #7bc6cc">
	<h6 style="font-size: 10pt">bạn sắp chuyển hướng đến trang <b>admin</b> dùng cho mục đích đăng và duyệt cfs, mục này chỉ dành cho các bạn <b>admin HDM</b>.</h6>
	<h6 style="font-size: 10pt">nếu bạn không phải admin HDM, vui lòng quay trở lại <b>nhà</b> :((</h6>
	<kbd style="font-family: Nunito">tụi mình xin cảm ơn các bạn rất nhìu !!</kbd>
</blockquote>
<hr>
<a href="/login" class="waves-effect waves-light btn grey lighten-5">
	<i style="font-size:15px" class="fas fa-atom txt-grad1"></i><b class="txt-grad1"> admin</b>
</a>
<a href="/" class="waves-effect waves-light btn blue-grey darken-4">
	<i style="font-size:15px" class="fas fa-feather-alt txt-grad1"></i><b class="txt-grad1"> về nhà :*</b>
</a>
<hr>
<div style="padding: 10pt;text-align: justify;">
	<span class="helper-text" style="font-size: 8pt;color: #BDBDBD">nếu bạn nhấn vào admin, bạn sẽ được facebook yêu cầu đăng nhập, nhưng đừng lo, chỉ có quản trị viên đã được cấp quyền mới có thể đăng nhập thành công. Website sẽ không lấy bất cứ thông tin cá nhân gì từ các bạn !! tính ẩn danh sẽ được đảm bảo hàng đầu !.</span><br>
	<span class="helper-text" style="font-size: 8pt;color: #BDBDBD">trang web hiện đang sử dụng mã nguồn Facebook SDK để cấp quyền login cho các bạn admin, có thể tham khảo thêm <a href="https://github.com/facebook/php-graph-sdk?fbclid=IwAR3gKJ2ozsbYi6VDWQ2lp1zGMJBgt0tjrpr5XQCdFRbX7ePtsc9Kr7yri6g">tại đây</a>.</span>
</div>
@stop
