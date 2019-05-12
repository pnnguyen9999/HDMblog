@extends('errors::main')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('User chưa ủy quyền hoặc cấp phép !'))
