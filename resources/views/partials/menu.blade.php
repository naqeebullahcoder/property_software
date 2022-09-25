<?php
$role=App\RoleUser::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->pluck('role_id');

$menu_options=App\Rights::wherein('role_id',$role)->select('role_id','menu_option_id')->get()->unique('menu_option_id');

    if($role->contains(1))
    {
        Illuminate\Support\Facades\Session::put('role',1);

    }
    else{
        Illuminate\Support\Facades\Session::put('role',$role->first());
    }

?>
<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y" >

        <ul class="nav">

            @foreach($menu_options as $menu_option)
                @if(App\MenuOPtion::find($menu_option->menu_option_id)->route!=null)
                <li class="nav-item">
                    <a href="{{route(App\MenuOPtion::find($menu_option->menu_option_id)->route)}}" class="nav-link">
                    <i class="nav-icon {{App\MenuOPtion::find($menu_option->menu_option_id)->icon}}">
                    </i>
                    {{App\MenuOPtion::find($menu_option->menu_option_id)->title}}
                    </a>
                </li>
                @else
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link  nav-dropdown-toggle">
                            <i class="nav-icon {{App\MenuOPtion::find($menu_option->menu_option_id)->icon}}">

                            </i>
                            {{App\MenuOPtion::find($menu_option->menu_option_id)->title}}
                        </a>
                        <ul class="nav-dropdown-items">
                        @foreach(App\MenuOPtion::where('parent_id',$menu_option->menu_option_id)->get() as $sub_menu_options)
                                <li class="nav-item">
                                    <a href="{{route($sub_menu_options->route)}}" class="nav-link ">
                                        <i class="nav-icon {{$sub_menu_options->icon}}">

                                        </i>
                                        {{$sub_menu_options->title}}
                                    </a>
                                </li>
                        @endforeach
                        </ul>
                        </li>
                @endif

            @endforeach

            <li class="nav-item">
                    <a href="{{route('admin.change-password.index')}}"class="nav-link" >
                        <i class="nav-icon fas fa-sign-out-alt">

                        </i>
                       Change Password
                    </a>
                </li>
             <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

        {{--<div class="ps__rail-x" style="left: 0px; bottom: 0px;">--}}
            {{--<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>--}}
        {{--</div>--}}
        {{--<div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">--}}
            {{--<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>--}}
        {{--</div>--}}
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
