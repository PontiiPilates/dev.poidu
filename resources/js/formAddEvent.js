var radioMoneyParticipation = document.getElementById('moneyParticipation');
var rowPrice = $('#rowPrice');

var selectorNotification = document.getElementById('notification');
var fieldEmail = $('#rowEmail');

// Проверка селектора price на checked при загрузке страницы
if (radioMoneyParticipation.checked) {
    rowPrice.show(0.3);
} else {
    rowPrice.hide(0.3);
}

// Проверка селектора notification на checked при загрузке страницы
if (selectorNotification.checked) {
    fieldEmail.show(0.3);
} else {
    fieldEmail.hide(0.3);
}

// Если выбран селектор free
$('#freeParticipation').change(function () {
    rowPrice.hide(0.3);
});

// Если выбран селектор donate
$('#donateParticipation').change(function () {
    rowPrice.hide(0.3);
});

// Если выбран селектор price
$('#moneyParticipation').change(function () {
    rowPrice.show(0.3);
});

// Если нажатие по notification
$('#notification').change(function () {
    if (selectorNotification.checked) {
        fieldEmail.show(0.3);
    } else {
        fieldEmail.hide(0.3);
    }
});


/**
 * Ajax
 */
$("#submitAddEvent").click(function (validate) {

    $.ajax({
        url: 'api/add/event',
        data: $('#formAddEvent').serializeArray(),
        type: "POST",
        // dataType: "json",
    }).done(function (res) {

        // console.log(res);

        // очистка формы от ошибок валидации
        while ($(".is-invalid").length > 0) {
            $(".is-invalid").removeClass("is-invalid");
        }

        // если обнаружены ошибки валидации
        if (res['invalid']) {

            // получение ключей невалидных полей
            for (let key of Object.keys(res['invalid'])) {
                // получение полей, содержащих ошибки
                let invalidField = '#' + key;
                // добавление класса ошибки
                $(invalidField).addClass("is-invalid");

                // получение блоков сообщений для ошибок
                let invalidMessage = '#' + key + 'Invalid';
                // добавление текста ошибки
                $(invalidMessage).text(res['invalid'][key]);
            }

        }

        // если событие успешно добавлено
        if (res['status'] == 'added') {
            $('#showAddEventMessage').click();
            $('#formAddEvent')[0].reset();
            $('#messageAboutEvent').text(res['message']);
            $('#eventStatusLink').attr('href', res['link']).text(res['link']);
        }


    }).fail(function (xhr, status, errorThrown) {
        // console.log(xhr, status, errorThrown);
        // console.log("Error: " + errorThrown);
        // console.log("Status: " + status);
        // console.dir(xhr);
    }).always(function (xhr, status) {
        // alert("The request is complete!");
    });
});
