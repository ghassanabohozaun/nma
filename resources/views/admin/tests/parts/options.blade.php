<a href="{{route('admin.tests.questions',$instance->id)}}" class="btn btn-hover-info btn-icon btn-pill"
   title="{{trans('tests.test_questions')}}">
    <i class="fa fa-question-circle fa-1x"></i>
</a>


<a href="{{route('admin.test.scales.index',$instance->id)}}" class="btn btn-hover-secondary btn-icon btn-pill"
   title="{{trans('tests.test_scales_manage')}}">
    <i class="fa fa-chart-bar fa-1x"></i>
</a>


<a href="#" class="btn btn-hover-bg-success btn-icon btn-pill add_file_btn" data-id="{{$instance->id}}"
   title="{{trans('tests.add_test_file')}}">
    <i class="fa fa-plus fa-1x"></i>
</a>



<a href="#" class="btn btn-hover-primary btn-icon btn-pill update_test_btn" data-id="{{$instance->id}}"
   title="{{trans('general.edit')}}">
    <i class="fa fa-edit fa-1x"></i>
</a>

<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_test_btn" data-id="{{$instance->id}}"
   title="{{trans('general.delete')}}">
    <i class="fa fa-trash fa-1x"></i>
</a>


