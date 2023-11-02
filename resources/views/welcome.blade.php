@extends('layouts.app')
@section('title')
    Welcome | Sistem Pendukung Keputusan
@endsection
@section('body')
    body-1
@endsection
@section('content')
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="text-white" style="
font-family: 'Tilt Prism', cursive;">
                    Sistem Pendukung Keputusan Pemilihan Supplier Metode
                    <span class="text-white fw-bold">Simple Additive
                        Weighting
                    </span>
                </h1>
                <a href="{{ route('login') }}" id="getStarted" class="btn btn-light p-3 rounded-pill mt-3 fs-5" style="width: 12rem; font-family: 'Tilt Prism', cursive;">Get
                    Started <i class="bi bi-arrow-right-short"></i> <div style="display: none" class="spinner-border spinner-border-sm mb-1" id="animasiLoading" role="status">
                        <span class="sr-only"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection