

<?php
app()->setLocale($language);
?>

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
