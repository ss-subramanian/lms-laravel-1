@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col s12 m9 l10"><h1>@lang('global.coursescertificates.title')</h1>
                <ul>
                    <li>
                        <a href="{{ url('/admin/home') }}">
                            <i class="fa fa-home"></i>
                            Dashboard</a>
                    </li> /
                    <li>
                        <a href="{{ route('admin.coursescertificates.index') }}">
                            @lang('global.coursescertificates.title')</a>
                    </li> /
                    <li><span>@lang('global.app_edit')</span></li>
                </ul>
            </div>
            <div class="col s12 m3 l2 right-align">
                <a href="{{ route('admin.coursescertificates.index') }}" class="btn grey lighten-3 grey-text z-depth-0 chat-toggle">
                    @lang('global.app_back_to_list')
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        {!! Form::model($coursescertificate, ['method' => 'PUT', 'route' => ['admin.coursescertificates.update', $coursescertificate->id], 'files' => true,]) !!}
        <div class="title">
            <h5>@lang('global.app_create')</h5>
        </div>

        <div class="content">
            <div class="row">
                <div class="col m6 s12">
                    <div class="input-field">
                        {!! Form::label('order', trans('global.coursescertificates.fields.order').'') !!}
                        {!! Form::number('order', old('order'), ['class' => 'validate']) !!}
                        <span class="helper-text" data-error="@if($errors->has('order')){{ $errors->first('order') }}@endif" data-success="right"></span>
                    </div>
                </div>

                <div class="col m6 s12">
                    <div class="input-field">
                        {!! Form::label('title', trans('global.coursescertificates.fields.title').'') !!}
                        {!! Form::text('title', old('title'), ['class' => 'validate']) !!}
                        <span class="helper-text" data-error="@if($errors->has('title')){{ $errors->first('title') }}@endif" data-success="right"></span>
                    </div>
                </div>

                <div class="col m6 s12">
                    <div class="input-field">
                        {!! Form::label('slug', trans('global.coursescertificates.fields.slug').'') !!}
                        {!! Form::text('slug', old('slug'), ['class' => 'validate']) !!}
                        <span class="helper-text" data-error="@if($errors->has('slug')){{ $errors->first('slug') }}@endif" data-success="right"></span>
                    </div>
                </div>

                <div class="col m6 s12">
                    <div class="file-field input-field">
                        <div class="btn grey">
                            <span>File</span>
                            {!! Form::file('image') !!}
                        </div>
                        <div class="file-path-wrapper">
                            {!! Form::text('file_text', old('file_text'), ['class' => 'file-path validate', 'placeholder' => 'Upload your avatar']) !!}
                        </div>
                        {!! Form::hidden('image_max_size', 4) !!}
                        {!! Form::hidden('image_max_width', 4096) !!}
                        {!! Form::hidden('image_max_height', 4096) !!}
                        <span class="helper-text" data-error="@if($errors->has('image')){{ $errors->first('image') }}@endif" data-success="right"></span>
                    </div>
                </div>
            </div>

            {!! Form::submit(trans('global.app_save'), ['class' => 'btn waves-effect waves-light grey']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

