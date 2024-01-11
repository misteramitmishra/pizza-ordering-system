<div class="form-group">
    <label>Select Toppings:</label>
    <div class="list-group">
        @foreach ($toppings as $toppingItem)
            <div class="list-group-item">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id= "topping{{ $toppingItem->id }}" name="toppings[]"
                        value="{{ $toppingItem->id }}" id="topping{{ $toppingItem->id }}">
                    <label class="form-check-label" for="topping{{ $toppingItem->id }}">
                        {{ $toppingItem->topping->name }} - ${{ $toppingItem->price }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
