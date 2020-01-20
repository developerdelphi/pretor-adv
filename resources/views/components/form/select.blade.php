<div class="form-group {{ $errors->has(Arr::get($params, 'name')) ? 'has-error' : '' }}">
    <label class="control-label">{{ Arr::get($params, 'label') }}</label>

    {{
        Form::select(
            Arr::get($params, 'name'),
            Arr::get($params, 'value'),
            null,
            [
                'class' => 'form-control',
                Arr::get($params, 'required', false) ? 'required' : '',
            ]
        )
    }}

    <small class="text-danger">{{ $errors->first( Arr::get($params, 'name')) }}</small>
</div>

