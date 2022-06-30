@extends('layouts.post')
@section('language')
    {!! language_picker($post) !!}
@endsection
@section('content')



    <?php

    $language=app()->getLocale()=='az' ? '' : app()->getLocale();
    ?>



    <main class="information inner__page">
        <div class="container">
            <ul class="breadcrump">
                <li><a href="/">Ana Səhifə</a></li>
                <li><a href="/media">Media</a></li>
                <li><a href="/media/multimedia">Multimedia</a></li>
                <li><a href="javascript:void(0)">{{ localized($post->getField('title')?->value,decode: true) }}</a></li>

            </ul>
            <div class="row">
                <div class="inner__column__left">
                    <div class="custom__sidebar">
                        <ul>
                            <li ><a href="/media/xeberler">Xəbərlər</a></li>
                            <li><a href="/media/elanlar">Elanlar</a></li>
                            <li class="active"><a href="/media/multimedia">Multimedia</a></li>
                        </ul>
                    </div>
                </div>
                <div class="inner__column__right">
                    <div class="inner__page__column">
                        <div class="inner__page__title mb-24">   {{localized($post->getField('title')?->value,decode: true)}}   </div>
                        <div class="inner__date__green mb-24">
                            <div class="date">{{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>

                        </div>
                        <div class="row">

                            @foreach($post?->getField('gallery')[0]?->getMedia('file') as $file)



                                <div class="col-sm-6 col-lg-4 mb-24">
                                    <div class="gallery__card" data-index="0"> <img src = "{{$file?->getUrl()}}" alt = "">
                                        <div class="card__overlay"><a class="gallery__modal__open" href=""><i class="icon-search"></i></a></div>
                                    </div>
                                </div>

                            @endforeach




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
                        <div class="inner__page__title mb-24">Digər</div>
                        <div class="row" id="news">
                            @php($posts = posts(8)->get()->take(2))

                            @foreach($posts as $post)
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
                        <div class="more__button" id="2"><a href="/media/news.html"><span>Daha çox</span><i class="icon-chevron-down"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="gallery__modal">
        <div class="bg__overlay"></div>
        <div class="row h-100 justify-content-center">
            <div class="col show__image">
                <img src="/assets/images/Rectangle 538.svg" alt="">
            </div>
            <div class="col navigation">
                <div class="d__flex">
                    <div class="col-left">
                        <div class="image__list"></div>
                    </div>
                    <div class="col-right">
                        <div class="d-flex">
                            <div><a class="button close" href=""><i class="icon-close"></i></a></div>
                            <div><span class="text-dark current__image">1</span>/<span class="text-dark list__length">12</span></div>
                            <div>
                                <ul>
                                    <li><a class="button list__prev" href=""><i class="icon-chevron-left"></i></a></li>
                                    <li><a class="button list__next" href=""><i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection












@push("js")

    <script>
        $(function () {
            $(".more__button").click(function () {
                var _this=this;
                $.ajax({
                    url:"{{url('api/photogallery/more')}}",
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




            $(".gallery__modal__open").click(function () {
                var index=$(this).parents('.gallery__card').parent().index();
                var src=$('.inner__page__column .row').find(' > div').eq(index).find('img').attr('src')
                $(".show__image img").attr(src, src)
            })





        })
    </script>

@endpush

