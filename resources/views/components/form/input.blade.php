<div class="form-group {{ $errors->has(Arr::get($params, 'name')) ? 'has-error' : '' }}">
  <label class="control-label">{{ Arr:get($params, 'label') }}</label>
  <input
    type="{{ Arr::get($params, 'type', 'text') }}"
    name="{{ Arr::get($params, 'name') }}"
    id="{{ Arr::get($params, 'name') }}"
    value="{{ Arr::get($params, 'value') }}"
    class="form-control"
    placeholder="{{ Arr::get($params, 'placeholder') }}"
    "{{ Arr::get($params, 'required', false) ? 'required' : '' }}"
  >
  <small class="text-danger">"{{ $errors->first( Arr::get($params, 'name')) }}" </small>
</div>
