
@extends('layouts.post')



@section('language')
{!! language_picker($post) !!}
@endsection


@section('content')



    <?php

    $language=app()->getLocale()=='az' ? '' : app()->getLocale();
    ?>

    <style>
        .inner__page img{
            height: 100%;
            object-fit: cover;
        }
        .thumb__item{
            height: 100%;
        }
    </style>





        <main class="news__single inner__page">
            <div class="container">
                <ul class="breadcrump">
                    <li><a href="/">Ana Səhifə</a></li>
                    <li><a href="/media">Media</a></li>
                    <li><a href="/xeberler">Xəbərlər</a></li>
                    <li><a href="javascript:void(0)">{{ localized($post->getField('title')?->value,decode: true) }}</a></li>
                </ul>
                <div class="row">
                    <div class="inner__column__left">
                        <div class="custom__sidebar">
                            <ul>
                                <li class="active"><a href="/media/xeberler">Xəbərlər</a></li>
                                <li><a href="/media/elanlar">Elanlar</a></li>
                                <li><a href="/media/multimedia">Multimedia</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="inner__column__right">
                        <div class="inner__page__column">
                            <div class="inner__page__title mb-24">{{ localized($post->getField('title')?->value,decode: true) }}</div>
                            <div class="inner__date__green mb-16">                                                {{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>

                            <div class="inner__text mb-24">

                                {!! localized($post->getField('content')?->value,decode: true) !!}
                            </div>
                            <div class="news__big__slider">
                                <div class="slider__1">
                                    <div class="arrows arrow__left"><i class="icon-chevron-left"></i></div>
                                    <div class="arrows arrow__right"><i class="icon-chevron-right"></i></div>
                                    <div class="news__slider d-flex owl-carousel owl-theme" data-slider-id="1">


                                        @foreach($post->getField('video2')[0]->getMedia('file') as $file)

                                        <img src = "{{$file?->getUrl()}}" alt = "">

                                        @endforeach



                                    </div>
                                </div>
                                <div class="news__slider__thubm owl-carousel owl-theme d-flex" data-slider-id="1">

                                    @foreach($post->getField('video2')[0]->getMedia('file') as $file)



                                        <div class="thumb__item">
                                            <div class="overlay"></div><img src = "{{$file?->getUrl()}}" alt = "">
                                        </div>


                                    @endforeach





                                </div>
                            </div>
                        </div>
                        <div class="share__card mt-24">
                            <div class="d-flex justify-content-between">
                                <div class="text">Göstərilən platformalarda paylaş:</div>
                                <div class="social__icons">
                                    <div class="d-flex">
                                        <a  class="social__icon facebook" href="#"><i class="icon-facebook"></i></a>
                                        <a class="social__icon twitter" href=""><i class="icon-twitter"></i></a>
                                        <a class="social__icon" href=""><i class="icon-instagram"></i></a>
                                        <a onclick="window.print();" class="social__icon print" href=""><i class="icon-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inner__page__column mt-24">
                            <div class="inner__page__title mb-24"> Digər</div>

                            @php($posts = posts(1)->get()->except($post->id)->take(2))






                            <div class="row" id="news">


                                @foreach($posts as $post)




                                    <div class="col-lg-6 mb-24"><a href="{{url($language.'/post/' . localized($post->slug,app()->getLocale()))}}">
                                            <div class="news__card">
                                                <div class="card__image"><img src="{{$post->getField('image_file')?->getFirstMediaUrl('file')}}" alt=""></div>
                                                <div class="card__body">
                                                    <div class="date">{{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>
                                                    <div class="title">{{localized($post->getField('title')?->value,decode: true)}}</div>
                                                    <div class="description">{{localized($post->getField('subtitle')?->value,decode: true)}}</div>
                                                </div>
                                            </div></a>
                                    </div>




                                @endforeach



                            </div>
                            <div class="more__button" id="2"><a href="#"><span>Daha çox</span><i class="icon-chevron-down"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


@endsection




@push("js")

    <script>
        $(function () {
            $(".more__button").click(function () {
                var _this=this;
                $.ajax({
                    url:"{{url('api/posts/more')}}",
                    data:{'_token':'{{csrf_token()}}','id':$(_this).attr("id"),'language':'{{$language}}'},
                    method:'post',
                    success:function (e) {

                        $("#news").append(e.result.view)

                        $(_this).attr("id",parseInt($(_this).attr("id"))+2)



                    }
                })
            })










            function shareOnwhatsapp(){

                var url = 'https://wa.me/?text='+'{{urlencode(url()->full())}}';
                socialWindow(url);
                return false;
            }


            function socialWindow(url) {
                var left = (screen.width -570) / 2;
                var top = (screen.height -570) / 2;
                var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;  window.open(url,"NewWindow",params);
            }


            $(".twitter").click(function () {
                var url = 'https://twitter.com/intent/tweet?url={{urlencode(url()->full())}}&text={!!  localized($post->getField('title')?->value,decode: true)   !!}';
                socialWindow(url);
                return false;
            })



            function shareOnlinkedin(){
                url = "https://www.linkedin.com/sharing/share-offsite/?url=" + '{{urlencode(url()->full())}}';
                socialWindow(url);
            }



            $(".facebook").click(function () {
                var url = "https://www.facebook.com/sharer/sharer.php?s=100&p[title]={{urlencode(localized($post->getField('title')?->value,decode: true))}}&p[summary]={{urlencode(localized($post->getField('title')?->value,decode: true))}}&u={{urlencode(url()->full())}}&p[images][0]={{$post->getField('image_file')?->getFirstMediaUrl('file')}}";
                socialWindow(url);
                return false;
            })










    })
    </script>

    @endpush
