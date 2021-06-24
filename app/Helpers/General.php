<?php


//  setting Helper Function
if (!function_exists('setting')) {
    function setting()
    {
        return App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

//  get active languages Helper Function
if (!function_exists('getActiveLanguages')) {
    function Lang()
    {
        return LaravelLocalization::getCurrentLocale() ;
    }
}

//  get active languages Helper Function
if (!function_exists('admin')) {
    function admin()
    {
        return  auth()->guard('admin');
    }
}




//  get active languages Helper Function
if (!function_exists('getActiveLanguages')) {
    function getActiveLanguages()
    {
        return App\Models\Language::active()->get();
    }
}

//  load Departments
if (!function_exists('load_dep')) {
    function load_dep($select = null, $deb_hide = null , $class =null)
    {

        if($class == null){
            $departments = \App\Models\Department::selectRaw('dep_name_' . LaravelLocalization::getCurrentLocale() . ' as text')
                ->selectRaw('id as id')
                ->selectRaw('parent as parent')
                ->get(['text', 'parent', 'id']);
        }else{
            $departments = \App\Models\Department::selectRaw('dep_name_' . LaravelLocalization::getCurrentLocale() . ' as text')
                ->selectRaw('id as id')
                ->selectRaw('parent as parent')
                ->where('class',$class)
                ->get(['text', 'parent', 'id']);
        }


        $dep_arr = [];
        foreach ($departments as $department) {
            $list_arr = [];

            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];

            if ($select !== null and $select == $department->id) {

                $list_arr['state'] = [
                    'opened' => true,
                    'selected' => true,
                    'disabled' => false,
                ];
            }

            if ($deb_hide !== null and $deb_hide == $department->id) {

                $list_arr['state'] = [
                    'opened' => false,
                    'selected' => false,
                    'disabled' => true,
                    'hidden' => true,
                ];
            }

            $list_arr['id'] = $department->id;
            $list_arr['parent'] = $department->parent !== null ? $department->parent : '#';
            $list_arr['text'] = $department->text;
            array_push($dep_arr, $list_arr);

        }
        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);

    }

    // Active Menu Helper Function
    if (!function_exists('active_menu')) {
        function active_menu($link)
        {
            if (preg_match('/' . $link . '/i', Request::segment(2))) {
                return ['menu-item-open'];
            }
            return ['', ''];

        }
    }

}



function aboutSite()
{
    return App\Models\AboutSite::orderBy('id', 'desc')->first();
}
function whyChooseUs()
{
    return App\Models\WhyChooseUs::orderBy('id', 'desc')->first();
}



function whoWeAre()
{
    return App\Models\WhoAreWe::orderBy('id', 'desc')->first();
}


function websiteMainPage()
{
    return App\Models\Website_main_page::orderBy('id', 'desc')->first();
}
