<div class="form-group col-md-{{$col??12}}">
    <label for="{{$name}}">
        {{__(ucfirst($title))}}
        @if($required ?? false)
            <span class="text-danger"> * </span>
        @endif
    </label>
    {!! html()->textarea($name)
        ->isReadonly($show??false)
        ->required($required??false)
        ->class($classes??["form-control"])
        ->addClass($errors->has($name) ? "is-invalid" : "")
        ->attributes($attrs??[])->id($name)
        ->rows($rows ?? 6)
        ->placeholder($placeholder??null) !!}

    @error($name)
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
