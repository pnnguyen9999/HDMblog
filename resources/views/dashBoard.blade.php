@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
@endsection

@section('mainpage-load')

<div class="row" id="loading-container" style="width: 100%;height: 100%;color: black;margin:0px">
    <div class="col-sm-2 col-lg-4"></div>
    <div class="col-sm-8 col-lg-4" style="padding: 100px">
        <kbd style="font-family: Nunito"><b>đang xử llý ~ chờ chút xíu :v ...</b></kbd>
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    <div class="col-sm-2 col-lg-4"></div>
    <!-- Add loading element here -->
</div>

<div style="overflow-x: hidden">
    <h6 class="txt-grad2 hdmminiTitle" style="padding-bottom: 10px;font-family: 'hdm', cursive;font-size: 20pt;">
        <b>trang duyệt cfs</b></h6>
    <hr>
    @include('layouts.userdashboard')
    @include('layouts.menudashboard')
    <hr>
    <h6 style="padding:10px;padding-bottom: 0px"><b>CÁC BẠN VUI LÒNG DUYỆT TỪ TRÊN XUỐNG ( ↓ ) NHÉ !</b></h6>
    <div class="row">
        <div class="mainContent card"
            style="position: fixed;z-index:100; bottom: 0px;display:inline-block;height: 55px;margin-bottom: 0px;background-color: rgba(192,192,192,0.85);text-align: left;padding-left: 20px;padding-top: 10px; color: #000000;margin-left: 14px">
            <h6>
                <b>GỘP: </b>
                <input class="btn black" type="submit" id="countText" name="count-checked-checkboxes" value="0"
                    style="color: #ffffff">
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
                    <div class="col-sm-6"
                        style="padding-right:0px;float: right;text-align: right;border-right: #99ccff solid 5px">

                        <div style="padding: 5px">
                            <label style="padding-right: 5px">
                                <input type="checkbox" class="filled-in checkbox-blue-grey merge-checkbox"
                                    data-confession-id="{{ $confession->id }}" />
                                <span>GỘP CHUNG</span>
                            </label>
                            <button
                                class="waves-effect waves-light btn blue-grey darken-4 accept approve-confession-btn cf-btn"
                                data-confession-id="{{ $confession->id }}">
                                <i style="font-size:15px" class="fas fa-check txt-grad1"></i><b class="txt-grad2"> Duyệt
                                    cfs này</b></button>
                        </div>
                        <div style="padding: 5px"><button
                                class="waves-effect waves-light btn delete-confession-btn cf-btn"
                                style="background-color: #FF9800" data-confession-id="{{ $confession->id }}"><i
                                    style="font-size:15px" class="fas fa-trash-alt" style="color: black"></i><b
                                    style="color: black"> Loại bỏ</b></button></div>
                    </div><br>
                </div>
                <!-- CONTENT TEXT Ở ĐÂY -->
                <h6><kbd style="font-family: Nunito;color: #ef5350">* có thể sửa được ↓</h6>
                <textarea class="materialize-textarea card grey darken-4" id="txt-area-{{ $confession->id }}"
                    style="height:auto;color:#ffffff;display: block;padding: 10px;border-radius: 5px">{{ $confession->content }}</textarea>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/admin.js') }}"></script>

@endsection