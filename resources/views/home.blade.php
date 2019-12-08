@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Posts</h2>
    @foreach($posts as $post)
        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                        {{$user->name}} created at {{date_format(date_create($post['created_time']), 'Y/m/d H:i:s')}}
                    </div>
                    <div class='card-text'>
                        @if(isset($post['message']))
                            {{$post['message']}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
