@foreach(config('global.permissions') as $name=>$value)
    {{ in_array($name,$instance->permissions) ? $value.' | ' :''}}
    @endforeach





