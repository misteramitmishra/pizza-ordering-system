@props(['label', 'id', 'name', 'options'])

<div class="form-group">
    <label>{{ $label }}: <strong class="required">*</strong></label>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        @foreach ($options as $value => $label)
            <label class="btn btn-outline-primary">
                <input type="radio" class="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
                    autocomplete="off">
                {{ $label }}
            </label>
        @endforeach
    </div>
</div>
