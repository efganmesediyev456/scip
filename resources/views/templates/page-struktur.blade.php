@extends('layouts.page')

@section('content')

    <main class="structure inner__page">
        <div class="container">
            <ul class="breadcrump">
                {!! breadcrumb_generator($page) !!}

            </ul>
            <div class="row">
                <div class="inner__column__left">
                    <div class="custom__sidebar">
                        <ul>
                            {!! sidebar_generator($page) !!}

                        </ul>
                    </div>
                </div>
                <div class="inner__column__right">
                    <div class="inner__page__column">
                        <div class="inner__page__title mb-24">Struktur</div><img class="structure__image w-100" src="{{page_image($page,'image')}}">
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
