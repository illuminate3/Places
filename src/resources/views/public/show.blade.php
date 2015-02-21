@extends('core::public.master')

@section('title', $model->title . ' – ' . trans('news::global.name') . ' – ' . $websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbAbsoluteSrc())

@section('js')
    <script src="{{ asset('//maps.googleapis.com/maps/api/js?sensor=false&amp;language='.Config::get('app.locale')) }}"></script>
    <script src="{{ asset('js/public/gmaps.js') }}"></script>
@stop

@section('main')

    <div class="row">
        <div class="col-sm-4">
            <h3>{{ $model->title }}</h3>

            @if($model->logo)
                <p><img src="{{ Croppa::url('/uploads/places/'.$model->logo, 0, 200) }}" alt=""></p>
            @endif

            <p>
                @if ($model->address)
                    {{ $model->address }}<br>
                @endif
                @if ($model->phone)
                    {{ $model->phone }}<br>
                @endif
                @if ($model->email)
                    <a href="mailto:{{ $model->email }}">{{ $model->email }}</a><br>
                @endif
                @if ($model->website)
                    <a href="{{ $model->website }}">{{ $model->website }}</a><br>
                @endif
            </p>
            <p>
                @if ($model->info)
                    {{ nl2br($model->info) }}
                @endif
            </p>
            <p class="summary">{{ nl2br($model->summary) }}</p>
            <div class="body">{!! $model->body !!}</div>
        </div>
        <div class="col-sm-8">
            @if($model->latitude && $model->longitude)
                <div id="map" class="map map-fancybox"></div>
            @endif
        </div>
    </div>

@stop