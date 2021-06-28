<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div style="margin-top:18px"
         id="kt_aside_menu"
         class="aside-menu "
         data-menu-vertical="1"
         data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->

        <ul class="menu-nav ">
            <li class="menu-item  menu-item-active" aria-haspopup="true" style="height: 40px;">
                <a href="{{route('admin.dashboard')}}" class="menu-link ">
                    <span class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3"/>
                                        </g>
                     </svg><!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">{{trans('menu.dashboard')}}</span></a>
            </li>
            <li class="menu-section" style="margin-bottom: -10px">

            </li>

            <!------------------------------------ home     ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu
                        @if(str_contains(url()->current(), 'settings')
                            || str_contains(url()->current(), '/admin/admin')) menu-item-open @endif"
                aria-haspopup="true" data-menu-toggle="hover"
                style="margin-top: -25px">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fa fa-store-alt"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.home')}}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu ">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">


                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('get.admin.settings')}}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.settings')}}</span>
                            </a>
                        </li>

                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('get.admin')}}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.admin')}}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <!------------------------------------ Users    ---------------------------------------------------->

            <li class="menu-item  menu-item-submenu
                 @if(str_contains(url()->current(), '/users')) menu-item-open @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.users')}}</span>
                    <i class="menu-arrow"></i>
                    <span class="menu-label">
                        <span class="label label-rounded label-warning">
                           {{App\Models\Admin::withTrashed()->count()}}
                        </span>
                    </span>

                </a>
                <div class="menu-submenu ">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{trans('menu.users')}}</span>
                            </span>
                        </li>
                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('users')}}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.users')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-warning">
                                        {{App\Models\Admin::withoutTrashed()->count()}}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('users.trashed')}}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.trashed_users')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-warning">
                                        {{App\Models\Admin::onlyTrashed()->count()}}
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!------------------------------------ About SPA    ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('admin.about.spa')}}" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fab fa-readme"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.about_spa')}}</span>
                    <span class="menu-label">
                        <span class="label label-rounded label-light-primary">
                           {{\App\Models\AboutSPA::count()}}
                        </span>
                    </span>
                </a>
            </li>


            <!------------------------------------ Services     ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu
                 @if(str_contains(url()->current(), '/services') || str_contains(url()->current(), '/treatment-areas'))
                menu-item-open @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="flaticon-squares-1"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.services')}}</span>
                    <i class="menu-arrow"></i>
                    <span class="menu-label">
                        <span class="label label-rounded label-warning">
                           {{App\Models\Service::count()}}
                        </span>
                    </span>

                </a>
                <div class="menu-submenu ">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{trans('menu.services')}}</span>
                            </span>
                        </li>
                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('admin.services')}}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.services')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-warning">
                                        {{App\Models\Service::where('is_treatment_area','=','0')->count()}}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('admin.treatment.areas')}}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.treatment_areas')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-warning">
                                       {{App\Models\Service:: where('is_treatment_area','=','1')->count()}}
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!------------------------------------ Trainings   ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('admin.trainings')}}" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="flaticon2-talk"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.trainings')}}</span>
                    <span class="menu-label">
                        <span class="label label-rounded label-dark">
                          {{\App\Models\Training::count()}}
                        </span>
                    </span>
                </a>
            </li>


            <!------------------------------------ Publications     ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu
                 @if(str_contains(url()->current(), '/sections')||str_contains(url()->current(), '/publications'))
                menu-item-open @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="flaticon-list"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.publications')}}</span>
                    <i class="menu-arrow"></i>
                    <span class="menu-label">
                        <span class="label label-rounded label-success">
                           {{App\Models\Publication::count() + App\Models\Section::count()}}
                        </span>
                    </span>
                </a>
                <div class="menu-submenu ">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{trans('menu.publications_and_sections')}}</span>
                            </span>
                        </li>
                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('admin.publications')}}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.publications')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-success">
                                       {{App\Models\Publication::count()}}
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.sections') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.sections')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-success">
                                       {{App\Models\Section::count()}}
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <!------------------------------------ Clients Opinions     ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('admin.clients.opinions')}}" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="flaticon2-chat-2"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.clients_opinions')}}</span>
                    <span class="menu-label">
                        <span class="label label-rounded label-info">
                           {{App\Models\ClientOpinion::count()}}
                        </span>
                    </span>
                </a>
            </li>


            <!------------------------------------ Medias    ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu @if(str_contains(url()->current(), '/medias')) menu-item-open @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                     <i class="fa fa-photo-video"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.media')}}</span>
                    <i class="menu-arrow"></i>
                    <span class="menu-label">
                        <span class="label label-rounded label-light-dark">
                                       {{App\Models\Slider::count() + App\Models\Video::count() + App\Models\PhotoAlbum::count() }}
                        </span>
                    </span>
                </a>
                <div class="menu-submenu ">
                    <!-----------------~~~~~~~~~~  Sliders  ~~~~~~~~~~~~~-------------------------------->
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">{{trans('menu.media')}}</span>
                            </span>
                        </li>
                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('admin.sliders')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.sliders')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-light-dark">
                                       {{App\Models\Slider::count()}}
                                    </span>
                                </span>
                            </a>
                        </li>

                    </ul>


                    <!-----------------~~~~~~~~~~  Videos  ~~~~~~~~~~~~~----------------------------------->
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">{{trans('menu.videos')}}</span>
                            </span>
                        </li>
                        <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('admin.videos')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.videos')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-light-dark">
                                       {{App\Models\Video::count()}}
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <!-----------------~~~~~~~~~~  Photo Albums  ~~~~~~~~~~~~~------------------------------->
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">{{trans('menu.photo_albums')}}</span>
                            </span>
                        </li>
                        <li class="menu-item  menu-item-submenu" data-menu-toggle="hover">
                            <a href="{{route('admin.photo.albums')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">{{trans('menu.photo_albums')}}</span>
                                <span class="menu-label">
                                    <span class="label label-rounded label-light-dark">
                                       {{App\Models\PhotoAlbum::count()}}
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <!------------------------------------ Communication Requests   fas fa-mail-bulk  -------------------------------------------------
            <li class="menu-item  menu-item-submenu"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{--route('admin.communication.requests')--}}" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-mail-bulk"></i>
                    </span>
                    <span class="menu-text">{{--trans('menu.communication_requests')--}}</span>
                    <span class="menu-label">
                        <span class="label label-rounded label-primary">
                           {{--App\Models\CommunicationRequest::count()--}}
                        </span>
                    </span>
                </a>
            </li>


            ----------------------------------- Tests And Metrics ---------------------------------------------------->

            <li class="menu-item  menu-item-submenu"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('admin.tests')}}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="fa fa-question"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.tests_and_metrics')}}</span>
                    <span class="menu-label">
                            <span class="label label-rounded label-light-danger">
                               {{App\Models\Tests\Test::count()}}
                            </span>
                    </span>
                </a>
            </li>

            <!------------------------------------ FAQ's     ---------------------------------------------------->
            <li class="menu-item  menu-item-submenu"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('admin.faqs')}}" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="flaticon-questions-circular-button"></i>
                    </span>
                    <span class="menu-text">{{trans('menu.faqs')}}</span>
                    <span class="menu-label">
                        <span class="label label-rounded label-danger">
                           {{\App\Models\Faq::count()}}
                        </span>
                    </span>
                </a>
            </li>


        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>

