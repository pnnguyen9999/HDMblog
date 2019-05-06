<div class="dashboardUser">
	<h6 style="text-align: left;color: #BBDEFB">- ↓ người duyệt bài : -</h6>
	<div class="row " style="text-align: left;padding: 10px;">
		<img class="" src="{{$avatar}}" style="border: #CFD8DC solid 3px;border-radius: 50px;float: left;" width="70px" height="70px">
		<div style="padding: 2px;padding-left: 10px">
			<h4 style="">{{$profile['first_name'].' '.$profile['last_name']}}</h4>
			<h5 style="color: #C8E6C9">{{$profile['email']}}</h5>
			<a href="/logout" class="waves-effect waves-light btn " style="background-color: #212121">
				<i style="font-size:15px" class="fas fa-sign-out-alt txt-grad1"></i><b class="txt-grad1"> đăng xuất</b>
			</a>
		</div>
	</div>
</div>