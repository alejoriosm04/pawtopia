$(document).ready(function() {
    $('.quantity-input').on('change', function() {
        var productId = $(this).data('product-id');
        var quantity = $(this).val();

        if (quantity < 1) {
            alert('La cantidad no puede ser menor a 1.');
            $(this).val(1);
            return;
        }

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

