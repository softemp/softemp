$(document).ready(barCode());
function barCode() {
    // JsBarcode('#codinterno', document.getElementById('interno').value);
    // JsBarcode('#codns', document.getElementById('ns').value);
    JsBarcode('#codmac', document.getElementById('mac').value);
}
