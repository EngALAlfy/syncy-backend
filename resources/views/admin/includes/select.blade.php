<div class="form-group col-md-{{$col??12}}">
    <label for="{{$name}}">
        {{__(ucfirst($title))}}
        @if($required ?? false)
            <span class="text-danger"> * </span>
        @endif
    </label>
    {!! html()->select($name)
        ->required($required??false)
        ->class($classes??["form-control"])
        ->addClass($errors->has($name) ? "is-invalid" : "")
        ->options($options ?? [])
        ->attributes($attrs??[])->id($name)
        ->placeholder($placeholder??"Please select $title") !!}

    @error($name)
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
