<div class="form-group form-md-line-input">
    {!! Form::label($name, $label, ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!!  Form::text($name, $value ,array_merge(['class' => 'form-control','placeholder' => $label], $attributes)) !!}
        <div class="form-control-focus"> </div>
        {{--<span class="help-block">Some help goes here...</span>--}}
    </div>
</div>