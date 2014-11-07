@extends('layouts.default')

@section('content')
    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
       <h1>
            @if(!$admin)We are always watching you, {{$fname}}...
            @else You're the best {{$fname}}!
            @endif
        </h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                {{$fname}}'s Info
                </div>
            </div>
            <div class="panel-body">
                <span style="color:red">@if(isset($error)){{ $error }}@endif</span>
                <span style="color:green">@if(isset($msg)){{ $msg }}@endif</span>
                <table class="table table-bordered">
                    <tr>
                        <th>
                            FIELD
                        </th>
                        <th>
                            VALUE
                        </th>
                    </tr>
                    <tr>
                        <td>
                            EMAIL
                        </td>
                        <td>
                            {{$email}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            FIRST NAME
                        </td>
                        <td>
                            {{$fname}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            LAST NAME
                        </td>
                        <td>
                            {{$lname}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ADMIN
                        </td>
                        <td>
                            @if($admin)Yes @else No @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        {{ HTML::linkRoute('user.edit', 'Edit Profile', array(), array('class'=>'btn btn-primary')) }}
    </div>
@stop