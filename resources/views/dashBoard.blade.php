@extends('layouts.main')

@section('mainpage-load')
<div style="overflow-x: hidden">
<hr>
<div class="dashboardUser">
	<h6 style="text-align: left;color: #BBDEFB">- ↓ Administrator -</h6>
	<div class="row " style="text-align: left;padding: 10px;">
		<img class="" src="{{$avatar}}" style="border: #CFD8DC solid 3px;border-radius: 50px;float: left;" width="70px" height="70px">
		<div style="padding: 2px;padding-left: 10px">

			<h4 style="">{{$profile['first_name'].' '.$profile['last_name']}}</h4>
			<h5 style="color: #C8E6C9">{{$profile['email']}}</h5>
			<div style="padding: 5px">
				<a href="/logout" class="waves-effect waves-light btn blue-grey darken-4"><b class="txt-grad2">đăng xuất</b></a>
			</div>
		</div>
	</div>
</div>
<div class="row" style="padding: 10px">
	<div class="col-sm-12">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
		@if(Session::has('alert-' . $msg))
		<p class="alert alert-{{ $msg }}" style="font-size: 12pt"><b>{{ Session::get('alert-' . $msg) }}</b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@endforeach
	</div>
</div>
<hr>
<h6 style="padding:10px;padding-bottom: 0px"><b>CÁC BẠN VUI LÒNG DUYỆT TỪ TRÊN XUỐNG ( ↓ ) NHÉ !</b></h6>
<div class="row">
<div class="mainContent card" style="position: fixed;z-index:100; bottom: 0px;display:inline-block;height: 55px;margin-bottom: 0px;background-color: rgba(192,192,192,0.85);text-align: left;padding-left: 20px;padding-top: 10px; color: #000000;margin-left: 14px">
	<h6>
		<b>GỘP: </b>
		<input class="btn black" type="submit" id="countText" name="count-checked-checkboxes" value="0" style="color: #ffffff">
		<button type=submit class="waves-effect waves-light btn grey darken-4" id="acceptAll">
			<i style="font-size:15px" class="fas fa-check txt-grad1"></i>
			<b class="txt-grad2"> Duyệt tất cả</b>
		</button>
	</h6>
</div>
</div>
<div style="padding: 10px;text-align: left">
	@foreach($confessions as $confession)
	<div class="col-sm-12" style="padding: 10px" id="confession-card-{{ $confession->id }}">
		<div style="width: 100%;padding: 10px;border: #e0e0e0 dashed 2px">
			<div class="row" style="width: 100%;padding: 5px">
				<div class="col-sm-6" style="float: left;">
					<h5 class="txt-grad2"><b>Chưa được duyệt !</b></h5><br>
					<h6><b>{{ $confession->created_at }}</b></h6>
					<h6><b>User: ẩn danh</b></h6>
				</div>
				<div class="col-sm-6" style="padding-right:0px;float: right;text-align: right;border-right: #99ccff solid 5px">

					<div style="padding: 5px">
						<label style="padding-right: 5px">
							<input type="checkbox" class="filled-in checkbox-blue-grey merge-checkbox" />
							<span>GỘP CHUNG</span>
						</label>
						<button class="waves-effect waves-light btn blue-grey darken-4 accept approve-confession-btn cf-btn" data-confession-id="{{ $confession->id }}">
						<i style="font-size:15px" class="fas fa-check txt-grad1"></i><b class="txt-grad2"> Duyệt cfs này</b></button>
					</div>
					<div style="padding: 5px"><button class="waves-effect waves-light btn delete-confession-btn cf-btn" style="background-color: #FF9800" data-confession-id="{{ $confession->id }}"><i style="font-size:15px" class="fas fa-trash-alt" style="color: black"></i><b style="color: black"> Loại bỏ</b></button></div>
				</div><br>
			</div>
			<div class="card grey darken-4" style="display: block;overflow: auto;padding: 10px">
				<tr>
					<th>{{ $confession->content }}</th><br>
				</tr>
			</div>
		</div>
	</div>
	<hr>
	@endforeach
</div>
</div>
@stop

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/admin.js') }}"></script>
@endsection
