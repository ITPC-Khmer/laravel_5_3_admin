<select id="{{ $label }}" style="display: none;" multiple="multiple" class="form-control select2-multiple" name="{{ $name }}">
    @foreach($data as $k=>$v)
        <option {{ in_array($k,$arr)?'selected="selected"':'' }} value="{{ $k }}">{{ $v }}</option>
    @endforeach
</select>

