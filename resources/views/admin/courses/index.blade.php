@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col s12 m9 l10"><h1>@lang('global.courses.title')</h1>
                <ul>
                    <li>
                        <a href="{{ url('/admin/home') }}">
                            <i class="fa fa-home"></i>
                            Dashboard</a>
                    </li> /
                    <li><span>@lang('global.courses.title')</span></li>
                </ul>
            </div>
            <div class="col s12 m3 l2 right-align">

                @can('course_create')
                <a href="{{ route('admin.courses.create') }}" class="btn grey lighten-3 grey-text z-depth-0 chat-toggle">
                    Add Course
                </a>
                @endcan
            </div>
        </div>
    </div>

    <ul class="tabs z-depth-1">
        <li class="tab">
            <a href="{{ route('admin.courses.index') }}" class="grey-text {{ request('show_deleted') == 1 ? '' : 'active' }}">@lang('global.app_all')</a>
        </li>
        <li class="tab">
            <a href="{{ route('admin.courses.index') }}?show_deleted=1" class="grey-text {{ request('show_deleted') == 1 ? 'active' : '' }}">@lang('global.app_trash')</a>
        </li>
    </ul>

    <div class="card">
        <div class="title">
            <h3>@lang('global.app_list')</h3>
        </div>

        <div class="content">
            <table class="striped responsive-table ajaxTable @can('course_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        <th>@lang('global.courses.fields.order')</th>

                        @can('course_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.courses.fields.title')</th>
                        <th>@lang('global.courses.fields.slug')</th>
                        <th>@lang('global.courses.fields.description')</th>
                        <th>@lang('global.courses.fields.introduction')</th>
                        <th>@lang('global.courses.fields.featured-image')</th>
                        <th>@lang('global.courses.fields.instructor')</th>
                        <th>@lang('global.courses.fields.lessons')</th>
                        <th>@lang('global.courses.fields.duration')</th>
                        <th>@lang('global.courses.fields.start-date')</th>
                        <th>@lang('global.courses.fields.end-date')</th>
                        <th>@lang('global.courses.fields.categories')</th>
                        <th>@lang('global.courses.fields.tags')</th>
                        <th>@lang('global.courses.fields.approved')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('course_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.courses.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.courses.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('course_delete')
                @endcan{data: 'order', name: 'order', className: 'reorder'},
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                {data: 'title', name: 'title'},
                {data: 'slug', name: 'slug'},
                {data: 'description', name: 'description'},
                {data: 'introduction', name: 'introduction'},
                {data: 'featured_image', name: 'featured_image'},
                {data: 'instructor.name', name: 'instructor.name'},
                {data: 'lessons.title', name: 'lessons.title'},
                {data: 'duration', name: 'duration'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'categories.title', name: 'categories.title'},
                {data: 'tags.title', name: 'tags.title'},
                {data: 'approved', name: 'approved'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection