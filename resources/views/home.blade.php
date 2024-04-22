@extends('layouts.main')

@section('title', 'Home')

@section('content')

    @include('components.offer_section')

    @include('components.chocolate_section')

    @include('components.contact_us')

    @include('components.info')
@endsection

