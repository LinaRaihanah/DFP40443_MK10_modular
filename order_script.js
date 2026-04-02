// assets/js/order.js

function calculateTotal() {
    let total = 0;

    document.querySelectorAll('.qty-input').forEach(input => {
        let qty = parseInt(input.value) || 0;
        let price = parseFloat(input.dataset.price) || 0;
        total += qty * price;
    });

    const totalEl = document.getElementById('totalPrice');
    if (totalEl) {
        totalEl.innerText = 'RM ' + total.toFixed(2);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('input', calculateTotal);
        input.addEventListener('change', calculateTotal);
    });

    // Calculate initial total
    calculateTotal();
});