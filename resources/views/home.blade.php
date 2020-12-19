@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TodoList') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<input type="text" id="useremail" style="display:none;" value= {{ Auth::user()->id}}>
                 
                    <div id="root">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
