@extends('layouts.layout')
@section('content-header')
<h1>
    {{ucfirst( substr( Route::currentRouteName(),9 ))}} Food
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
    <li><a href="{{ route('menu-top.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,8 ))}}</a></li>
    <li class="active">{{ucfirst( substr( Route::currentRouteName(),9 ))}}</li>
</ol>
@endsection
@section('content')
<form action="{{ route('menu-top.store') }}" method="POST" role="form" class="col-md-6 col-md-offset-3"> 
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Danh mục cha</label>
        <select name="parent_id" id="input" class="form-control" required="required">
            <option value="">Hãy chọn danh mục cha</option>
            <option value="0">Menu lớn</option>

            <?php $menu1= App\Models\menuTop::where('parent_id',0)->get(); ?>
            @foreach ($menu1 as $key1 => $item1)
                <option value="{{$item1['id']}}">{{$key1+1}}. {{$item1['name']}}</option>
                <?php $menu2= App\Models\menuTop::where('parent_id',$item1['id'])->get(); ?>
                @foreach ($menu2 as $key2 => $item2)
                    <option value="{{$item2['id']}}">--{{$key1+1}}.{{$key2+1}} {{$item2['name']}}</option>
                @endforeach
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input name="name" id="input" class="form-control" required > 
    </div>

    

    
    <button type="submit" class="btn btn-primary ">Submit</button>
</form>
@endsection