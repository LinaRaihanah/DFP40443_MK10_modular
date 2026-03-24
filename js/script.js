const qtyInputs = document.querySelectorAll('.qty-input');
const totalEl = document.getElementById('total-price');

function kiraTotal(){
    let total = 0;

    qtyInputs.forEach(input => {
        let qty = parseInt(input.value) || 0;
        let price = parseFloat(input.dataset.price);

        total += qty * price;
    });

    totalEl.innerText = "RM " + total.toFixed(2);
}

qtyInputs.forEach(input => {
    input.addEventListener('input', kiraTotal);
});