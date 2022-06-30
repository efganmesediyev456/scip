@extends('layouts.page')

@section('content')

    <?php

    $language=app()->getLocale()=='az' ? '' : app()->getLocale();
    ?>

    <main class="multimedia inner__page">
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
                <div class="inner__page__column mb-24">
                    <div class="tabs mb-24">
                        <div class="tab active" data-toggle="multimedia" data-order="1">Foto qalareya</div>
                        <div class="tab" data-toggle="multimedia" data-order="2">Video qalareya</div>
                    </div>
                    <div class="tab__contents">


                        <div class="tab__content active" data-toggle="multimedia" data-order="1">
                            <div class="row">



                                @php($posts1 = posts(8)->paginate(10,["*"],'photogallery'))
                                @foreach($posts1 as $post)
                                    <div class="col-lg-6 mb-24"><a href="{{url($language.'/post/' . localized($post->slug,app()->getLocale()))}}">
                                            <div class="news__card">
                                                <div class="card__image"><img src="{{$post->getField('image')?->getFirstMediaUrl('file')}}" alt=""></div>
                                                <div class="card__body">
                                                    <div class="date">{{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>
                                                    <div class="title">{{localized($post->getField('title')?->value,decode: true)}}</div>
                                                    <div class="description">{{localized($post->getField('subtitle')?->value,decode: true)}}</div>
                                                </div>
                                            </div></a>
                                    </div>







                                @endforeach




                            </div>
                        </div>



                        <div class="tab__content " data-toggle="multimedia" data-order="2">
                            <div class="row">



                                @php($posts2 = posts(9)->paginate(10,["*"],'videogallery'))
                                @foreach($posts2 as $post)
                                    <div class="col-lg-6 mb-24"><a href="{{url($language.'/post/' . localized($post->slug,app()->getLocale()))}}">
                                            <div class="news__card">
                                                <div class="card__image"><img src="{{$post->getField('image')?->getFirstMediaUrl('file')}}" alt=""></div>
                                                <div class="card__body">
                                                    <div class="date">{{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>
                                                    <div class="title">{{localized($post->getField('title')?->value,decode: true)}}</div>
                                                    <div class="description">{{localized($post->getField('subtitle')?->value,decode: true)}}</div>
                                                </div>
                                            </div></a>
                                    </div>


                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>
                <div id="0">
                    {{$posts1->appends(['videogallery'=>$posts2->currentPage()])->links('vendor.pagination.default')}}

                </div>

                <div id="1">
                    {{$posts2->appends(['photogallery'=>$posts1->currentPage()])->links('vendor.pagination.default')}}

                </div>

            </div>
        </div>
    </div>
</main>


@endsection



@push('js')

    <script>
        $(function(){
            $(".tab").click(function(){

               localStorage.setItem('page',$(this).index())



                $("#0").hide()
                $("#1").hide()

                $("#"+localStorage.getItem('page')).show()

            })

            if(localStorage.getItem('page')){
                $(".tab").removeClass('active')
                $(".tab").eq(localStorage.getItem('page')).addClass('active')

                $(".tab__content").removeClass('active')
                $(".tab__content").eq(localStorage.getItem('page')).addClass('active')

                $("#0").hide()
                $("#1").hide()

                $("#"+localStorage.getItem('page')).show()
                localStorage.removeItem('page')
            }
        })
    </script>

    @endpush
