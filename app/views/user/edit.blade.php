@extends('layouts.default')

@section('content')
<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
    <div class="box panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Edit Account Form</div>
        </div>
        <div class="panel-body">
        {{ Form::open(array('route'=>'user.update','method'=>'put')) }}
            <div class="form-group">
               <span style="color:red">@if(isset($error)){{ $error }}@endif</span>
               <span style="color:green">@if(isset($msg)){{ $msg }}@endif</span>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" name="email" class='form-control' id="email" value="{{Auth::user()->email}}" required/>
            </div>
            <div class="form-group">
               <label for="fname">First Name</label>
               <input type="text" id="fname" name="first_name" class="form-control" value="{{Auth::user()->first_name}}" required />
            </div>
            <div class="form-group">
               <label for="lname">Last Name</label>
               <input type="text" id="lname" name="last_name" class="form-control" value="{{Auth::user()->last_name}}" required />
            </div>
            <div class="form-group">
               <button class="btn btn-primary" type="submit">Update Account</button>
                {{ HTML::linkRoute('user.show', 'Just Kidding!', array(), array('class'=>'btn btn-primary pull-right')) }}
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>

@stop