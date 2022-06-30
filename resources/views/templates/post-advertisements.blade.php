@extends('layouts.post')
@section('language')
    {!! language_picker($post) !!}
@endsection
@section('content')



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
                <li><a href="/elanlar">Elanlar</a></li>
                <li><a href="javascript:void(0)">{{ localized($post->getField('title')?->value,decode: true) }}</a></li>
            </ul>
            <div class="row">
                <div class="inner__column__left">
                    <div class="custom__sidebar">
                        <ul>
                            <li ><a href="/media/xeberler">Xəbərlər</a></li>
                            <li class="active"><a href="/media/elanlar">Elanlar</a></li>
                            <li><a href="/media/multimedia">Multimedia</a></li>
                        </ul>
                    </div>
                </div>
                <div class="inner__column__right">
                    <div class="inner__page__column">
                        <div class="inner__page__title mb-24">{{ localized($post->getField('title')?->value,decode: true) }}</div>
                        <div class="inner__date__green mb-16">

                            <div class="date">{{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>



                        </div>


                        <div class="inner__date__green mb-16">{!! localized($post->getField('content')?->value,decode: true) !!}</div>


                    </div>
                    <div class="share__card mt-24">
                        <div class="d-flex justify-content-between">
                            <div class="text">Göstərilən platformalarda paylaş:</div>
                            <div class="social__icons">
                                <div class="d-flex">
                                    <a class="social__icon facebook" href="">
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a class="social__icon twitter" href="">
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a class="social__icon" href="">
                                        <i class="icon-instagram"></i>
                                    </a>
                                    <a onclick="window.print();" class="social__icon" href="">
                                        <i class="icon-print"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>


@endsection



@push("js")

    <script>

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
            var url = "https://www.facebook.com/sharer/sharer.php?s=100&p[title]={{urlencode(localized($post->getField('title')?->value,decode: true))}}&p[summary]={{urlencode(localized($post->getField('title')?->value,decode: true))}}&u={{urlencode(url()->full())}}&p[images][0]={{$post->getField('image')?->getFirstMediaUrl('file')}}";
            socialWindow(url);
            return false;
        })



    </script>

    @endpush


