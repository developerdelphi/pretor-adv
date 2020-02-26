function submitForm() {
    document.getElementById('formSearch').submit();
}

function setField(field, value) {
    document.getElementById(field).value = value;
    this.submitForm();
}

function orderBy(value, order) {
    document.getElementById('order').value = value;
    document.getElementById('order_type').value = order;
    this.submitForm();
}
