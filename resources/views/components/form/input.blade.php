<div class="form-group m-0 {{ $errors->has(Arr::get($params, 'name')) ? 'has-error' : '' }}">
  <label class="control-label m-0">{{ Arr::get($params, 'label') }}</label>
  <input
    type="{{ Arr::get($params, 'type', 'text') }}"
    name="{{ Arr::get($params, 'name') }}"
    id="{{ Arr::get($params, 'name') }}"
    value="{{ Arr::get($params, 'value') }}"
    class="form-control form-control-sm"
    placeholder="{{ Arr::get($params, 'placeholder') }}"
    autofocus="{{ Arr::get($params, 'autofocus') }}"
    {{ Arr::get($params, 'required', false) ? 'required' : '' }}
  >
  <small class="text-danger">{{ $errors->first( Arr::get($params, 'name')) }}</small>
</div>
