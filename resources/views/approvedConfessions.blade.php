@extends('layouts.main')

@section('mainpage-load')
<div style="overflow-x: hidden">
<h6 class="txt-grad2 hdmminiTitle" style="padding-bottom: 10px;font-family: 'hdm', cursive;font-size: 20pt;"><b>trang cfs đã duyệt</b></h6>
<hr>
@include('layouts.userdashboard')
@include('layouts.menudashboard')
<hr>
<h6 style="padding:10px;padding-bottom: 0px"><b>THÀNH QUẢ LÀ ĐÂY ~ :3</b></h6>
<div class="row">
</div>
<div style="padding: 10px;text-align: left">
	@foreach($confessions as $confession)
	<div class="col-sm-12" style="padding: 10px" id="confession-card-{{ $confession->id }}">
		<div style="width: 100%;padding: 10px;border: #e0e0e0 dashed 2px">
			<div class="row" style="width: 100%;padding: 5px">
				<div class="col-sm-6" style="float: left;">
					<h5 class="txt-grad2"><b>duyệt bởi: {{ $confession->approve->user->name }}</b></h5><br>
					<h6><b>{{ $confession->created_at }}</b></h6>
					<h6><b>User: ẩn danh</b></h6>
				</div>
				<div class="col-sm-6" style="padding-right:0px;float: right;text-align: right;">
					<h5 class="txt-grad2"><b>#cfs{{ $confession->approve->order }}</b></h5><br>
				</div><br>
			</div>
			<!-- CONTENT TEXT Ở ĐÂY -->
			<textarea class="materialize-textarea card grey darken-4" id="txt-area-{{ $confession->id }}" style="height:auto;color:#ffffff;display: block;padding: 10px;border-radius: 5px" disabled="true">{{ $confession->content }}</textarea>
		</div>
		<hr />
	</div>
	@endforeach
</div>
</div>
@stop

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/admin.js') }}"></script>

@endsection
