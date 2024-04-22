@extends('layouts.alter')

@section('title', 'Chocolates')

@section('content')
    <section class="chocolate_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Our chocolate products
                </h2>
                <p>
                    Many desktop publishing packages and web pagend web page editors now use Lorem Ipsum as their
                </p>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('chocolates.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by Name" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach($chocolates as $chocolate)
                    <div class="col-md-4">
                        @include('components.chocolate_box', ['chocolate' => $chocolate])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
