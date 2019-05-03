@extends('layouts.main')

@section('mainpage-load')

<h4 style="color: #ffcdd2;letter-spacing: 5px">>> LƯU Ý !!!</h4><br>
<div style="padding: 20px;padding-top:0px;font-size: 11pt;text-align: justify;">
	<h6 style="font-size: 11pt">bạn sắp chuyển hướng đến trang <b class="txt-grad2">công cụ quản trị</b> dùng cho mục đích đăng và duyệt cfs, mục này chỉ dành cho các bạn <b class="txt-grad2">admin HDM</b>.</h6>
	<h6 style="font-size: 11pt">nếu bạn <kbd>không phải admin HDM</kbd>, vui lòng quay trở lại <b class="txt-grad2">nhà</b> :((</h6>
	<kbd>tụi mình xin cảm ơn các bạn rất nhìu !!</kbd>
</div>
<hr>
<a href="/admin" class="waves-effect waves-light btn grey lighten-5">
	<i style="font-size:15px" class="fas fa-atom txt-grad1"></i><b class="txt-grad1"> admin</b>
</a>
<a href="/" class="waves-effect waves-light btn blue-grey darken-4">
	<i style="font-size:15px" class="fas fa-dice-d20 txt-grad1"></i><b class="txt-grad1"> về nhà :*</b>
</a>
<hr>
<div style="padding: 10pt;text-align: justify;">
	<span class="helper-text" style="font-size: 8pt;color: #BDBDBD">nếu bạn nhấn vào admin, bạn sẽ được facebook yêu cầu đăng nhập, nhưng đừng lo !, chỉ có quản trị viên đã được cấp quyền mới có thể đăng nhập thành công. Website sẽ không lấy bất cứ thông tin cá nhân gì từ các bạn ! tính ẩn danh sẽ được đảm bảo hàng đầu !.</span><br>
	<span class="helper-text" style="font-size: 8pt;color: #BDBDBD">trang web hiện đang sử dụng mã nguồn Facebook SDK để cấp quyền login cho các bạn admin, có thể tham khảo thêm <a href="https://github.com/facebook/php-graph-sdk?fbclid=IwAR3gKJ2ozsbYi6VDWQ2lp1zGMJBgt0tjrpr5XQCdFRbX7ePtsc9Kr7yri6g">tại đây</a>.</span>
</div>
<hr>
@stop