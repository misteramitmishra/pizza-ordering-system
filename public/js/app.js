$(document).ready(function () {
    $('.pizzaSizeSelect, .pizzaTypeSelect').on('change', function () {
        updateToppings();
    });

    function updateToppings() {
        const pizzaId = $('.pizzaTypeSelect:checked').val();
        const sizeId = $('.pizzaSizeSelect:checked').val();

        if(pizzaId && sizeId) {
            $.ajax({
                url: '/get-toppings',
                type: 'GET',
                data: { sizeId: sizeId },
                success: function (data) {
                    $('#toppingsContainer').html(data);
                }
            });
        }
    }
});
