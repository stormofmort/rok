@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="panel-heading"><a href={{route('article', ['year'=>$article->updated_at->year, 'month'=>$article->updated_at->format('m'), 'day'=>$article->updated_at->format('d'), 'article'=>$article->slug])}}>{{$article->title}}</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$article->body}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    Article functions
                </div>
            </div>
        </div>
    </div>
</div>
@endsection