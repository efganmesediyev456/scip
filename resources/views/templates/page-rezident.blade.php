@extends('layouts.page')

@section('content')

    <style>
        .error{
            margin:10px 0;
            font-size: 12px;
            color:red;
        }
        .success{
            margin:10px 0;
            font-size: 14px;
            color:green;
            padding: 15px;
            background: greenyellow;
            border-radius: 4px;

        }
    </style>

    <main class="become__resident inner__page">
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
                    <div class="tabs">
                        <div class="tab @if(old('type')==0) active @endif" data-toggle="become_resident" data-order="1">Sənaye layihəsi</div>
                        <div class="tab @if(old('type')==1) active @endif" data-toggle="become_resident" data-order="2">Kənd təsərrüfatı layihəsi</div>
                    </div>
                    <div class="tab__contents">
                        <div class="tab__content @if(old('type')==0) active @endif" data-toggle="become_resident" data-order="1">
                            <div class="inner__page__column">
                                <form action="{{url('industrial_project')}}" method="POST">
                                    <input type = "hidden" name="type" value="0">

                                    @if(session()->has('success'))

                                        <p class="success">{{session()->get('success')}}</p>

                                        @endif

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Tam ad</label>
                                                <input name="full_name" class="form__control" type="text" placeholder="Fiziki və ya hüquqi şəxsin adı">
                                                @if(old('type')==0)
                                                    @error('full_name')
                                                    <p class="error">{{$message}}</p>
                                                    @enderror
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">VÖEN</label>
                                                <input name="voen" class="form__control" type="text" placeholder="VÖEN hesabı">
                                                @if(old('type')==0)
                                                @error('voen')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Layihə</label>
                                                <input name="project" class="form__control" type="text" placeholder="Layihənin qısa təsviri">
                                                @if(old('type')==0)
                                                @error('project')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Xammal</label>
                                                <input name="material" class="form__control" type="text" placeholder="İstifadə olunacaq xammal">
                                                @error('material')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">İstehsal</label>
                                                <input name="production" class="form__control" type="text" placeholder="İstehsal texnologiyası və mənşə ölkəsi">
                                                @error('production')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Müddət</label>
                                                <select name="time" class="form__select" >
                                                    <option value="" disabled selected>Layihə üzrə tikinti müddəti</option>
                                                    <option value="time1" >time1</option>
                                                    <option value="time2" >time2</option>
                                                </select>
                                                @error('time')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Təlabat</label>
                                                <select name="demand" class="form__select">
                                                    <option value="" disabled selected>Məhsula tələbat barədə məlumat</option>
                                                    <option value="test" >test</option>
                                                    <option value="test1"  >test1</option>
                                                    <option value="test1"  >test1</option>
                                                </select>
                                                @error('demand')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">İstehsal gücü</label>
                                                <select class="form__select" name="productive_capacity">
                                                    <option value="" disabled selected>İllik istehsal gücü</option>
                                                    <option value="capacity" >capacity</option>
                                                </select>
                                                @error('productive_capacity')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">İnvestisiya</label>
                                                <input name="investisiya" class="form__control" type="text" placeholder="İnvestisiya həcmi (manatla)">
                                                @error('investisiya')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Sahə</label>
                                                <input name="area" class="form__control" type="text" placeholder="Tələb olunan sahə (ha)">
                                                @error('area')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Satış</label>
                                                <input name="sales" class="form__control" type="text" placeholder="Əsas satış bazarları">
                                                @error('sales')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Sahə</label>
                                                <input name="area_electric" class="form__control" type="text" placeholder="Elektrik enerjisinə tələb olunan maksimal güc (kVts)">
                                                @error('area_electric')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Təbii qaz</label>
                                                <input name="natural_gas" class="form__control" type="text" placeholder="Təbii qaz (m3/saat)">
                                                @error('natural_gas')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Texniki su</label>
                                                <input name="technical_water" class="form__control" type="text" placeholder="Texniki su (m3/saat)">
                                                @error('technical_water')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{--<div class="col-lg-6">--}}
                                            {{--<div class="form__group">--}}
                                                {{--<label class="form__label" for="">Təbii qaz</label>--}}
                                                {{--<input class="form__control" type="text" placeholder="Təbii qaz (m3/saat)">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">İçməli su</label>
                                                <input name="drinkable_water" class="form__control" type="text" placeholder="İçməli su (m3/saat)">
                                                @error('drinkable_water')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form__group">
                                                <label class="form__label" for="">Digər infrastruktur tələbləri</label>
                                                <textarea name="infrastructure_requirements" class="form__control" name=""></textarea>
                                                @error('infrastructure_requirements')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="primary__button btn__block" type="submit"><span>Göndər</span></button>
                                </form>
                            </div>
                        </div>
                        <div class="tab__content @if(old('type')==1) active @endif" data-toggle="become_resident" data-order="2">
                            <div class="inner__page__column">
                                <form action="{{url('agricultural_project')}}" method="POST">

                                    <input type = "hidden" name="type" value="1">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Tam ad</label>
                                                <input name="full_name" class="form__control" type="text" placeholder="Fiziki və ya hüquqi şəxsin adı">
                                                @if(old('type')==1)
                                                @error('full_name')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Ünvan</label>
                                                <input name="address" class="form__control" type="text" placeholder="Fəaliyyət və ya yaşayış ünvanı">

                                                @error('address')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Nömrə</label>
                                                <input name="mobile" class="form__control" type="text" placeholder="Əlaqə nömrəsi">
                                                @error('mobile')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Email</label>
                                                <input name="email" class="form__control" type="text" placeholder="Email">
                                                @error('email')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Layihə</label>
                                                <input name="project" class="form__control" type="text" placeholder="Layihə barədə məlumat">
                                                @if(old('type')==1)
                                                @error('project')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Rayon</label>
                                                <input name="district" class="form__control" type="text" placeholder="Layihənin həyata keçiriləcəyi rayon (lar)">
                                                @error('district')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Əkin sahəsi</label>
                                                <select name="sown_area" class="form__select" name="">
                                                    <option value="" disabled selected>Nəzərdə tutulmuş əkin sahəsi</option>
                                                    <option value = "test">test</option>
                                                </select>
                                                @error('sown_area')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Emal sahəsi</label>
                                                <select name="processing_area" class="form__select" name="">
                                                    <option value="" disabled selected>Nəzərdə tutulmuş emal sahəsi</option>
                                                    <option value = "test4">test4</option>
                                                </select>
                                                @error('processing_area')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Məhsul</label>
                                                <input name="product" class="form__control" type="text" placeholder="İstehsal olunacaq məhsullar">
                                                @error('product')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__group">
                                                <label class="form__label" for="">Tarix</label>
                                                <input name="date" class="form__control" type="date" placeholder="Layihənin icra tarixi">
                                                @error('date')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form__group">
                                                <label class="form__label" for="">Suvarma metodu</label>
                                                <select name="irrigation_method" class="form__select" name="">
                                                    <option value="" disabled selected>İstifadə olunacaq suvarma metodu</option>
                                                    <option value = "test5">test5</option>
                                                </select>
                                                @error('irrigation_method')
                                                <p class="error">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="primary__button btn__block" type="submit"><span>Göndər</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
