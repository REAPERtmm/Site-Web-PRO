$(document).ready(function() {
    $('.edit').click(function() {
        $(this).parent('.quantity').toggleClass('editable');
        $(this).siblings('input').prop('readonly', function(_, prop) {
            return !prop;
        });
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const quantityInputs = document.querySelectorAll('.quantity input');

    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            const quantity = parseInt(input.value);
            const productId = input.dataset.product;
            const priceElement = document.getElementById(`price-${productId}`);
            const initialPrice = parseFloat(priceElement.textContent);
            const newPrice = initialPrice * quantity;
            priceElement.textContent = newPrice.toFixed(2);

            updateSubtotal();
        });
    });

    function updateSubtotal() {
        let subtotal = 0;
        const priceElements = document.querySelectorAll('.product-details span[id^="price-"]');
        priceElements.forEach(function(element) {
            subtotal += parseFloat(element.textContent);
        });
        document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    }
});

function updateSubtotal() {
    let subtotal = 0;
    const totalPriceElements = document.querySelectorAll('.product-details span[id^="total-price-"]');
    totalPriceElements.forEach(function(element) {
        subtotal += parseFloat(element.textContent);
    });
    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
}


document.addEventListener("DOMContentLoaded", function() {
    const quantityInputs = document.querySelectorAll('.quantity input');

    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            const quantity = parseInt(input.value);
            const productId = input.dataset.product;
            const priceElement = document.getElementById(`price-${productId}`);
            const initialPrice = parseFloat(priceElement.textContent);
            const totalPrice = initialPrice * quantity;
            document.getElementById(`total-price-${productId}`).textContent = totalPrice.toFixed(2);

            updateSubtotal();
        });
    });

    function updateSubtotal() {
        let subtotal = 0;
        const totalPriceElements = document.querySelectorAll('.product-details span[id^="total-price-"]');
        totalPriceElements.forEach(function(element) {
            subtotal += parseFloat(element.textContent);
        });
        document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            button.closest('.product-section').remove();

            updateSubtotal();
        });
    });

    function updateSubtotal() {
        let subtotal = 0;
        const totalPriceElements = document.querySelectorAll('.product-details span[id^="total-price-"]');
        totalPriceElements.forEach(function(element) {
            subtotal += parseFloat(element.textContent);
        });
        document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    }
});
