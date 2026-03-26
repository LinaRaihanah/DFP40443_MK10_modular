const qty = document.querySelectorAll('.qty-input');
const total = document.getElementById('total-price');

function kira() {
    let sum = 0;

    qty.forEach(i => {
        let q = parseInt(i.value) || 0;
        let p = parseFloat(i.dataset.price);
        sum += q * p;
    });

    total.innerText = "RM " + sum.toFixed(2);
}

qty.forEach(i => {
    i.addEventListener('input', kira);
});

function semakTempahan() {
    let valid = false;

    qty.forEach(i => {
        let q = parseInt(i.value) || 0;
        if (q > 0) {
            valid = true;
        }
    });

    if (!valid) {
        alert("Sila pilih sekurang-kurangnya satu kuih");
        return false;
    }

    return true;
}