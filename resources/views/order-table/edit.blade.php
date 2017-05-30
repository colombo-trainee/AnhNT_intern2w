@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
	.alert{
		display: none;	
	}
	.has-error{
		display: block;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),9 ))}} {{ucfirst( substr( Route::currentRouteName(),0,8 ))}}
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('order-table.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,8 ))}}</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),9 ))}}</li>
</ol>
@endsection
@section('content')
	
@endsection
