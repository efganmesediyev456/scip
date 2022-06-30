
@foreach($posts as $post)
    <div class="col-lg-6 mb-24"><a href="{{url('/post/' . localized($post->slug,app()->getLocale()))}}">
            <div class="news__card">
                <div class="card__image"></div>
                <div class="card__body">
                    <div class="date">{{ \Carbon\Carbon::parse($post->getField('date')->value)->format('d m, Y  H:i') }}</div>
                    <div class="title">{{localized($post->getField('title')?->value,decode: true)}}</div>
                    <div class="description">{{localized($post->getField('subtitle')?->value,decode: true)}}</div>
                </div>
            </div></a>
    </div>


@endforeach
