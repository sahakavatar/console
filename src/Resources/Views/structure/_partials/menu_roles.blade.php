@if($roles && $menu)
    @foreach($roles as $role)
        <div id="viewType" class="col-xs-4">
            <div class="row templates m-b-10 ">
                <div class=" topRow p-l-0 p-r-0">
                    <img src="{!! url('resources/assets/images/template-3.png')!!}" class="img-responsive"/>
                    <div class="tempalte_icon">
                        <div><a href="{!! url('/admin/console/structure/menus/edit',[$menu->id,$role->slug]) !!}"
                                class="m-r-10"><i class="fa fa-pencil f-s-14"></i> </a></div>
                    </div>
                </div>
                {{-- <span>{{ isset($url) ? $url : '' }}</span>--}}
                <div class=" templates-header ">
                    <span class=" templates-title text-center"><i class="fa fa-bars f-s-13 m-r-5"
                                                                  aria-hidden="true"></i> {!! $role->name!!}</span>
                    <div class=" templates-buttons text-center ">
                        <span class="authorColumn"><i class="fa fa-user author-icon" aria-hidden="true"></i>
                            {{ $menu->creator->username }}, {!! BBgetDateFormat($menu->created_at) !!}</span>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-xs-12 addon-item">
        NO Results
    </div>
@endif

