$("#profile-register-form").on("submit", function () {
    return false;
});

var i = 0;
$('.coderegbtn').on('click', function (e) {
    i++;
    if(i % 2 == 0) {
        return false;
    }
    e.preventDefault();
    var code = document.getElementById('code').value;
    $.ajax({
        url: '/site/registercode',
        data: {code: code},
        type: 'GET',
        success: function (res) {
            alert(res.message);
        },
        error: function () {
            alert('Ошибка сервера');
        }
    });

    return false;
});
