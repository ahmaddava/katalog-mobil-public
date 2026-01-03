@extends('layouts.app')
@section('title', 'Daftar Koleksi Mobil')

@section('content')

<div class="page-header">
    <div class="container">
        <div class="text-center" data-aos="fade-in">
            <h1 class="fw-bold">Koleksi Mobil Kami</h1>
            <p class="lead text-muted">Temukan kendaraan yang sempurna untuk setiap kebutuhan Anda.</p>
        </div>
    </div>
</div>

@livewire('car-search')

@endsection