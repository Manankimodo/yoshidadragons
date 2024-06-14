const Touroku_btn = document.getElementById('Touroku_button');
if (Touroku_btn) {
    Touroku_btn.addEventListener('click', TourokuEvent, false);
}

const Kaijo_btn = document.getElementById('Kaijo_button');
if (Kaijo_btn) {
    Kaijo_btn.addEventListener('click', KaijoEvent, false);
}

function TourokuEvent() {
    alert('定期購読の登録をしました');
}
function KaijoEvent() {
    alert('定期購読の解除をしました');
}
