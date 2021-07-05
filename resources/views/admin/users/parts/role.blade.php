@if(Lang()=='ar')
    <span class="text-info">
     {!! $instance->role_name_ar !!}
</span>
@else
    <span class="text-info">
     {!! $instance->role_name_en !!}
</span>
@endif

