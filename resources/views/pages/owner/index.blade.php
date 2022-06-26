@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                {{ strtoupper(Auth::user()->name) }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>A well-known quote, contained in a blockquote element From Role Owner.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
@endsection