@extends('layouts.layout')
@section('content')
<h3>Create Menu Top</h3>
<div class="portlet light portlet-fit portlet-form ">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-red"></i>
            <span class="caption-subject font-red sbold uppercase">Basic Validation</span>
        </div>
        <div class="actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
                <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
            </div>
        </div>
    </div>
    <div class="portlet-body">
        <!-- BEGIN FORM-->
        <form action="#" id="form_sample_1" class="form-horizontal" novalidate="novalidate">
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Name
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" name="name" data-required="1" class="form-control"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Select
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-4">
                        <select class="form-control" name="select">
                            <option value="">Select...</option>
                            <option value="Category 1">Category 1</option>
                            <option value="Category 2">Category 2</option>
                            <option value="Category 3">Category 5</option>
                            <option value="Category 4">Category 4</option>
                        </select>
                    </div>
                </div>
                
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Submit</button>
                        <button type="reset" class="btn grey-salsa btn-outline">Reset</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>

@endsection