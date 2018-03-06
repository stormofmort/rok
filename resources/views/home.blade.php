@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-columns">
            @foreach($articles as $article)
            <div class="card">
                <div class="card-body">
                <h2 class="card-title"><a href={{route('article', ['year'=>$article->updated_at->year, 'month'=>$article->updated_at->format('m'), 'day'=>$article->updated_at->format('d'), 'article'=>$article->slug])}}>{{$article->title}}</a></h2>
                <h6 class="card-subtitle mb-2 text-muted">
                    Published on: 
                    <a href="{{url("/" . $article->updated_at->year . "/" . $article->updated_at->format('m')  . "/" . $article->updated_at->format('d'))}}">{{$article->updated_at->format('jS')}}</a> -
                    <a href="{{url("/" . $article->updated_at->year . "/" . $article->updated_at->format('m'))}}">{{$article->updated_at->format('F')}}</a> -
                    <a href="{{url("/" . $article->updated_at->year)}}">{{$article->updated_at->year}}</a>
                     by {{$article->user->name}}
                </h6>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$article->body}}
                </div>

                <div class="card-footer">
                    <a href={{route('article', ['year'=>$article->updated_at->year, 'month'=>$article->updated_at->format('m'), 'day'=>$article->updated_at->format('d'), 'article'=>$article->slug])}} class="btn btn-primary">Go somewhere</a>
                </div>

            </div>
            @endforeach
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
            <div class="card-body">
            Home functions
            </div>
            </div>
        </div>
    </div>
</div>
@endsection