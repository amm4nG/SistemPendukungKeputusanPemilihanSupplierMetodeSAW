@extends('layouts.app')
@section('title')
    Page Login | Admin SPK
@endsection
@section('body')
    body-1
@endsection
@section('content')
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-3" style="background-color: transparent; border: none">
                    <div class="card-body">
                        @if ($errors->has('message'))
                            <div class="toast" id="message" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <span class="me-auto text-danger">{{ $errors->first('message') }}</span>
                                    {{-- <small>11 mins ago</small> --}}
                                    <button type="button" id="close" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <form action="{{ url('proses/login') }}" method="post">
                            @csrf
                            <input type="text" value="{{ old('username') }}" class="form-control mt-3 text-white" style="background-color: transparent"
                                autocomplete="off" required placeholder="Username" name="username">
                            <input required type="password" class="form-control mt-3 text-white"
                                style="background-color: transparent" placeholder="Password" name="password">
                            <button type="submit" class="btn btn-light mt-4 form-control"
                                style="font-family: 'Handjet', cursive;">Login
                                <i class="bi bi-box-arrow-in-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#message').show()

            $('#close').on('click', function() {
                $('#message').hide()
            })
        });
    </script>
@endsection
