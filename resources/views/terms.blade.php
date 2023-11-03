@extends('layout.layout')

@section('content')
        <div class="row">
            <div class="col-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                <h1>Terms</h1>
                <div>
                  In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual
                  form of a document or a typeface without relying on meaningful content.
                  Lorem ipsum may be used as a placeholder before final copy is available
                </div>
            </div>
            <div class="col-3">

                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>

        </div>

@endsection
