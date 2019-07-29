$(document).ready(function () {
    $("#inst-image").change(function () {
        console.log('here', this.files);
        var fd = new FormData();
        var files = this.files[0];
        fd.append('file', files);

        $.ajax({
            url: '/site/image-upload',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    $('#profile-insta-step-one').hide();
                    $('#profile-insta-step-two').show();

                    $('#new-inst-image').attr('src', response.path);

                    $('#profile-insta-step-btn-two').on('click', function() {
                        $('#profile-insta-step-two').hide();
                        $('#profile-insta-step-three').show();
                    });
                } else {
                    alert("Ошибка сервера");
                }
            },
        });
    });
});
