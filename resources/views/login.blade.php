@extends('master')

@section('head')
    @if (!empty($clientauth) && $fontsUrl = Utils::getAccountFontsUrl())
        <link href="{{ $fontsUrl }}" rel="stylesheet" type="text/css">
    @endif
    <link href="{{ asset('css/built.public.css') }}?no_cache={{ NINJA_VERSION }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootstrap.min.css') }}?no_cache={{ NINJA_VERSION }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/built.css') }}?no_cache={{ NINJA_VERSION }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/built.login.css') }}?no_cache={{ NINJA_VERSION }}" rel="stylesheet" type="text/css"/>

    @if (!empty($clientauth))
        <style type="text/css">{!! Utils::clientViewCSS() !!}</style>
    @endif
@endsection

@section('body')

    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-6 col-xs-12 text-center">
                <a href="https://rpodevelopment.com" target="_blank">
                    <img width=250 src="{{ asset('images/rpodev/white_logo_transparent_background.png') }}"/>
                </a>
            </div>
            <div class="col-md-6 text-right visible-lg">
                <h4>A Helping Hand for Your Website Needs!</h4>
            </div>
        </div>
    </div>


    @yield('form')
@endsection
