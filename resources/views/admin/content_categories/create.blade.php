@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col s12 m9 l10"><h1>@lang('global.content-categories.title')</h1>
                <ul>
                    <li>
                        <a href="{{ url('/admin/home') }}">
                            <i class="fa fa-home"></i>
                            Dashboard</a>
                    </li> /
                    <li>
                        <a href="{{ route('admin.content_categories.index') }}">
                            @lang('global.content-categories.title')</a>
                    </li> /
                    <li><span>New</span></li>
                </ul>
            </div>
            <div class="col s12 m3 l2 right-align">
                <a href="{{ route('admin.content_categories.index') }}" class="btn lighten-3 z-depth-0 chat-toggle">
                    @lang('global.app_back_to_list')
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        {!! Form::open(['method' => 'POST', 'route' => ['admin.content_categories.store']]) !!}
        <div class="title">
            <h5>@lang('global.app_create')</h5>
        </div>

        <div class="content">
            <div class="row">
                <div class="col m6 s12">
                    <div class="input-field">
                        {!! Form::text('title', old('title'), ['class' => 'validate']) !!}
                        {!! Form::label('title', trans('global.content-categories.fields.title').'') !!}
                        <span class="helper-text" data-error="@if($errors->has('title')){{ $errors->first('title') }}@endif" data-success="right"></span>
                    </div>
                </div>

                <div class="col m6 s12">
                    <div class="input-field">
                        {!! Form::text('slug', old('slug'), ['class' => 'validate']) !!}
                        {!! Form::label('slug', trans('global.content-categories.fields.slug').'') !!}
                        <span class="helper-text" data-error="@if($errors->has('slug')){{ $errors->first('slug') }}@endif" data-success="right"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn waves-effect waves-light']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop

