var selectorPrice = document.getElementById('form-active-price');
var fieldCost = $('#field-cost');

var selectorNotification = document.getElementById('notification');
var fieldEmail = $('#field-email');

// Проверка селектора price на checked при загрузке страницы
if (selectorPrice.checked) {
    fieldCost.show(0.3);
} else {
    fieldCost.hide(0.3);
}

// Проверка селектора notification на checked при загрузке страницы
if (selectorNotification.checked) {
    fieldEmail.show(0.3);
} else {
    fieldEmail.hide(0.3);
}

// Если выбран селектор free
$('#form-active-free').change(function () {
    fieldCost.hide(0.3);
});

// Если выбран селектор donate
$('#form-active-donate').change(function () {
    fieldCost.hide(0.3);
});

// Если выбран селектор price
$('#form-active-price').change(function () {
    fieldCost.show(0.3);
});

// Если нажатие по notification
$('#notification').change(function () {
    if (selectorNotification.checked) {
        fieldEmail.show(0.3);
    } else {
        fieldEmail.hide(0.3);
    }
});
