<div class="field m-0 {{ $errors->has(Arr::get($params, 'name')) ? 'error' : '' }}">
    <label class="control-label m-0">{{ Arr::get($params, 'label') }}</label>
    <input type="{{ Arr::get($params, 'type', 'text') }}" name="{{ Arr::get($params, 'name') }}"
        id="{{ Arr::get($params, 'name') }}" value="{{ Arr::get($params, 'value') }}" class=""
        placeholder="{{ Arr::get($params, 'placeholder') }}" autofocus="{{ Arr::get($params, 'autofocus') }}"
        {{ Arr::get($params, 'required', false) ? 'required' : '' }}>
    @if($errors->has(Arr::get($params,'name')))
    <div class="ui bottom attached red">
        <p class="ui label red">{{ $errors->first( Arr::get($params, 'name')) }}</p>
    </div>
    @endif
</div>
