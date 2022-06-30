@extends('layouts.page')

@section('content')

    <main class="reports inner__page">
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
                        <div class="inner__page__title mb-lg-24">  {!!  localized(page_field($page,'title'),decode: true) !!}  </div>
                        <div class="table__responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>S.A.A.</th>
                                    <th>Vəzifəsi</th>
                                    <th>Qəbul günləri</th>
                                    <th>Qəbul saatları</th>
                                    <th>Əlaqə nömrələri</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($page->posts->where('type',\App\Models\Post::TYPES['grafik']) as $post )



                                    <tr>
                                        <td>{{localized($post->getField('name')?->value,decode: true)}}</td>
                                        <td>{{localized($post->getField('position')?->value,decode: true)}}</td>
                                        <td>{{localized($post->getField('receptiondays')?->value,decode: true)}}</td>
                                        <td>{{localized($post->getField('receptionhours')?->value,decode: true)}}</td>
                                        <td>{{localized($post->getField('contactnumbers')?->value,decode: true)}}</td>
                                    </tr>



                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
