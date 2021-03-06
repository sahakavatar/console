@if($page)
    {!! Form::model($page,['id' => 'page_settings_form']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="pull-right">
                <a data-href="{!! url('/admin/console/structure/pages/page-test-preview/'.
                $page->id."?pl_live_settings=page_live&pl=" . $page->page_layout . '&' . $placeholders) !!}"
                   class="live-preview-btn"><i class="fa fa-eye" aria-hidden="true"></i> View
                </a>
                {{ Form::button('<i class="fa fa-check" aria-hidden="true"></i> Save', array('type' => 'submit', 'class' => 'save_btn')) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-9 connected" data-bbsortable="target">

            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading"> Page Content</div>
                <div class="panel-body published_1">
                    <div class="iframe-page-content">
                        <iframe src="{!! url($page->url) !!}"></iframe>
                    </div>
                </div>
            </div>

            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading"> Page Info</div>
                <div class="panel-body published_1">
                    {!! Form::hidden('id') !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12  left_sd verticalcontainer">
                            <div class="row left_part_publ">
                                <div>
                                    <div class="row rows">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 row_inputs">
                                            <i class="fa fa-file-text" aria-hidden="true"></i><span
                                                    class="labls">Page Name</span>
                                            {!! Form::text('title',null,['class' => 'page_name']) !!}
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 row_inputs">
                                            <i class="fa fa-file-text" aria-hidden="true"></i><span
                                                    class="labls">Page URL</span>
                                            <div class="page_address page_labels">{!! $page->url !!}</div>
                                            {!! Form::hidden('url',null) !!}
                                        </div>
                                    </div>
                                    <div class="row rows">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading"> General Info</div>
                <div class="panel-body published_1">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 right_part_publ">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 author_name_div m-t-10">
                                    <p style="text-align: left"><b>Created
                                            :</b> {!! BBgetTimeFormat($page->created_at) !!} {!! BBgetDateFormat($page->created_at) !!}
                                    </p>
                                    <p style="text-align: left">
                                        <b>Edited :</b>
                                        @if($page->edited_by)
                                            By {{ @$page->editor->username }} {!! BBgetTimeFormat($page->updated_at) !!} {!! BBgetDateFormat($page->updated_at) !!}
                                        @else
                                            Not Edited Yet
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 create connected" data-bbsortable="source">
            @if($page->type != 'classify' && $page->type != 'tags')
                <div class="panel panel-default custompanel m-t-20">
                    <div class="panel-heading"> Page Tags</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                {!! Form::text('tags','',['class' => 'form-control','id' =>'tags']) !!}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-t-15">
                                <div>
                                    All Tags
                                </div>
                                <ul class="list-inline" id="temp">
                                    @if (count($tags) > 0)
                                        @foreach ($tags as $tag)
                                            <li style="margin-top:5px;">
                                                <div class="btn btn-default">
                                                    {{ $tag->name }}
                                                    <a data-key="{!! $tag->id.'.'.$page->id !!}"
                                                       data-type="{!! $tag->name !!} Tag"
                                                       class="delete-button"
                                                       data-href="{{ url('admin/manage/frontend/pages/detach') }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Sahakavatar\Cms\Models\ContentLayouts\ContentLayouts::getAdminPageLayoutPlaceholders($page) !!}
                {{--<div class="panel panel-default custompanel m-t-20">--}}
                {{--<div class="panel-heading">Select Page Layout</div>--}}
                {{--<div class="panel-body">--}}
                {{--<div class="row">--}}
                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                {{--{!! BBbutton('page_sections','page_section','Select Page Layout',['class'=>'btn selectGrayBtn rightSelectBtn change-layout','data-type'=>'frontend','model' => $page->page_section]) !!}--}}
                {{--</div>--}}
                {{--<div class="col-md-12 layout-data">--}}
                {{--<p>Layout Data</p>--}}
                {{--<p data-key="title">Title:<code class="language-php"></code></p>--}}
                {{--<p data-key="author">Author:<code class="language-php"></code></p>--}}
                {{--<p data-key="sidebars">Sidebars:<code class="language-php"></code></p>--}}
                {{--<p data-key="id">Variation:<code class="language-php"></code></p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            @endif
        </div>
    </div>
    {!! Form::close() !!}
    @include('resources::assests.magicModal')
@else
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 design_panel">
        <div class="published_1">
            NO Page
        </div>
    </div>
@endif

@section('CSS')
    {!! HTML::style('/css/create_pages.css') !!}
    <style>
        #main-wrapper {
            min-height: 1000px;
            display: inline-block;
        }

        @media (min-width: 1787px) {
            .header_image, .block {
                height: 398px;
            }
        }

        .live-preview-btn {
            background: #499bc7;
            color: #fff;
            width: 96px;
            height: 38px;
            border-radius: 3px;
            padding: 8px;
            font-size: 17px;
            margin-right: 10px;
            box-shadow: 2px 1px 6px #888888;
            cursor: pointer;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script("/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('/js/page-setting.js') !!}
    {!! HTML::script("/js/UiElements/bb_div.js?v.5") !!}
    {!! HTML::script('/js/tinymice/tinymce.min.js') !!}
    <script>

        $(document).ready(function () {
            tinymce.init({
                selector: '#main_content', // change this value according to your HTML
                height: 200,
                theme: 'modern',
                plugins: [
                    'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullpage fullscreen hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount shortcodes',
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help shortcodes',
                image_advtab: true
            });

            $('body').on('change', '.content_type', function () {
                var value = $(this).val();

                if (value == 1) {
                    $('.iframe-page-content').removeClass('show').addClass('hide');
                    $('.editor-page-content').removeClass('hide').addClass('show');
                } else {
                    $('.editor-page-content').removeClass('show').addClass('hide');
                    $('.iframe-page-content').removeClass('hide').addClass('show');
                }

            });

            $('body').on('click', '.live-preview-btn', function () {
                if (!$(this).next().hasClass('redirect-type')) {
                    var typeInput = $('<input/>', {
                        type: 'hidden',
                        name: 'redirect_type',
                        value: 'view',
                        class: 'redirect-type'
                    });
                    $(this).after(typeInput);
                    $('#page_settings_form').submit();
                }

            });
        });

    </script>
@stop