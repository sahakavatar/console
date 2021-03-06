@extends('cms::layouts.units')

@section('content')
    <div class="previewlivesettingifream">
        <iframe src="{!! $data['body'] !!}">

        </iframe>
    </div>
@stop

@section('CSS')

    {!! HTML::style('css/preview-template.css') !!}
    {!! HTML::style("css/animate.css") !!}
    {!! HTML::style("/css/preview-template.css") !!}
@stop
@section('JS')
    {!! HTML::script("js/UiElements/ui-preview-setting.js?v=999") !!}
    {!! HTML::script("js/UiElements/ui-settings.js") !!}
@stop
