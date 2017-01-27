<div class="form-group form-md-line-input">
    {!! Form::label($name, $label, ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="input-icon right">
            {!!  Form::password($name, array_merge(['class' => 'form-control','placeholder' => $label], $attributes)) !!}
            <div class="form-control-focus"> </div>
            <i class="fa fa-key"></i>
        </div>
    </div>
</div>