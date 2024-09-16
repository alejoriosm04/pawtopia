$(document).ready(function() {
    $('.quantity-input').on('change', function() {
        var productId = $(this).data('product-id');
        var quantity = $(this).val();

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
                    location.reload(); 
                }
            }
        });
    });
});

