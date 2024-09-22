function increaseQuantity(productId) {
        let quantityInput = document.getElementById('quantity-' + productId);
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }

    function decreaseQuantity(productId) {
        let quantityInput = document.getElementById('quantity-' + productId);
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }
