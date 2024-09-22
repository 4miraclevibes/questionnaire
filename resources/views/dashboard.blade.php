@extends('layouts.backend.main')

@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<h1>Selamat datang {{ Auth::user()->name }}</h1>
@if (Auth::user()->role->name == 'user')
<a href="{{ route('landing.index') }}" class="btn btn-primary">Ambil Survey</a>
@endif
</div>

<!-- / Content -->


@endsection