@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <button style="display:none" class="btn btn-md btn-block btn-danger" id="alert-error"></button>
        <button style="display:none" class="btn btn-md btn-info btn-block" id="alert-loading"></button>
        <button style="display:none" class="btn btn-md btn-block btn-success" id="alert-success"></button>
    </div>
</div><br />



<div class="col-lg-3 col-lg-offset-1">
   <div class="panel panel-default">
      <div class="panel-heading">
         <div class="panel-title">Create New Account</div>
      </div>
      <div class="panel-body">
         <div class="form-group">
            <span style="color:red">@if(isset($error)){{ $error }}@endif</span>
            <span style="color:green">@if(isset($msg)){{ $msg }}@endif</span>
         </div>
         <div class="form-group">
            <label for="type">Type of Account</label>
            <select id="type" name="type">
               <option></option>
               <option value="email">Email</option>
               <option value="social_media">Social Media</option>
               <option value="financial">Financial</option>
               <option value="other">Other</option>
             </select>
         </div>
         <div class="form-group">
            <label for="site">Account Name</label>
            <input type="text" id="site" name="site" class="form-control" required />
         </div>
         <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" class="form-control" required />
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required/>
         </div>
         <div class="form-group">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required/>
         </div>
         <div class="form-group">
            <button class="btn btn-primary" id="button-create-account">Submit Account</button>
            <button class="btn btn-primary" id="button-refresh-account">Refresh</button>
         </div>
     </div>
   </div>
</div>

<div class="col-lg-7 col-lg-offset-1">
   <div class="panel panel-default">
      <div class="panel-heading">
         <h3 class="panel-title"></h3>
      </div>
      <div class="panel-body" id="display-fields">
      </div>
   </div>
</div>

@stop

@section('js')
<script src="/js/system.js"></script>
@stop