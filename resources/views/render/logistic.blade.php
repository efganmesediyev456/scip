@foreach($posts as $inf)
<div class="col-lg-6 mb-24">
    <div class="logistics__card">
        <div class="title">{{$inf->getField('size')->value}}</div>
        <div class="text">{{localized($inf->getField('content')->value,decode: true)}}</div>
    </div>
</div>

@endforeach
