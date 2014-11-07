@extends('layouts.default')

@section('content')

    @if(!$admin){{Redirect::to('/')->with('error', 'You do not have permission to be on the Admin page!') }}@endif
    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Admin</div>
            </div>
            <div class="panel-body">
                "With great power comes great responsibility..."
            </div>
        </div>
    </div>
    
@endsection