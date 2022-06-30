@extends('layouts.page')

@section('content')

    <style>
        p.error{
            font-size:12px;
            color:red;
            margin:15px 0;
        }
    </style>

    <main class="contact inner__page">
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
                        <div class="inner__page__title mb-lg-24">Şikayət, təklif və müraciət</div>
                        <form method="POST" action="{{route('foo')}}" >



                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form__group">
                                        <label class="form__label" for="">Ad</label>
                                        <input name="name" class="form__control" type="text" placeholder="Ad">




                                        @error('name')

                                        <p class="error">
                                            {{$message}}
                                        </p>

                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form__group">
                                        <label class="form__label" for="">Soyad</label>
                                        <input name="surname" class="form__control" type="text" placeholder="Soyad">
                                        @error('surname')

                                        <p class="error">
                                            {{$message}}
                                        </p>

                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form__group">
                                        <label class="form__label" for="">Elektron poçt</label>
                                        <input name="email" class="form__control" type="text" placeholder="Elektron poçt ">
                                        @error('email')

                                        <p class="error">
                                            {{$message}}
                                        </p>

                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form__group">
                                        <label class="form__label" for="">Telefon nömrəsi</label>
                                        <input name="mobile" class="form__control" type="text" placeholder="Telefon nömrəsi">
                                        @error('mobile')

                                        <p class="error">
                                            {{$message}}
                                        </p>

                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form__group">
                                        <label class="form__label" for="">Mövzu</label>
                                        <select name="topic" class="form__select" name="">
                                            <option value="" disabled selected>Mövzu seçin</option>
                                            <option value="erize">Erize</option>
                                            <option value="sikayet">Sikayet</option>
                                            <option value="teklif">Teklif</option>
                                        </select>
                                        @error('topic')

                                        <p class="error">
                                            {{$message}}
                                        </p>

                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form__group">
                                        <label class="form__label" for="">Müraciətin mətni</label>
                                        <textarea name="message" class="form__control" name=""></textarea>
                                        @error('message')

                                        <p class="error">
                                            {{$message}}
                                        </p>

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
    </main>

@endsection
