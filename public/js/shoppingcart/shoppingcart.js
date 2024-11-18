$(document).ready(function() {
    let debounceTimer;

    $('.quantity-input').on('input', function() {
        clearTimeout(debounceTimer);

        var productId = $(this).data('product-id');
        var quantity = $(this).val();

        if (quantity < 1) {
            alert('The quantity cannot be less than 1.');
            $(this).val(1);
            return;
        }

        debounceTimer = setTimeout(function() {
            $.ajax({
                url: '/cart/update',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        $('#subtotal-' + productId).text('$' + (response.product_price * quantity).toFixed(2));
                        
                        $('#cart-total').text('$' + response.total.toFixed(2));
                    }
                }
            });
        }, 300);
    });
});
