@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                {{ strtoupper(Auth::user()->name) }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment For Staff Role</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
@endsection