$(document).ready(function () {
    $('.file-upload').on('change', function () {
        if (this.files && this.files[0]) {
            let $files = $(this).get(0).files;
            if ($files[0].size > 5 * 1024 * 1024) {
                alert('Ảnh cần nhỏ hơn 5MB');
                return false;
            }

            let apiUrl = 'https://api.imgur.com/3/image';
            let apiKey = '6eccc15117fbe14';

            let settings = {
                async: false,
                crossDomain: true,
                processData: false,
                contentType: false,
                type: 'POST',
                url: apiUrl,
                headers: {
                Authorization: 'Client-ID ' + apiKey,
                Accept: 'application/json',
                },
            };

            let formData = new FormData();
            formData.append('image', $files[0]);
            settings.data = formData;

            let avatarWrapper = $(this).parent();

            $.ajax(settings).done(function (response) {
                let imgUrl = response.data.link;
                for (let i = imgUrl.length-1; i >= 1; --i) {
                    if (imgUrl[i] == '/') {
                        imgUrl = imgUrl + 't';
                    }
                    if (imgUrl[i] == '.') {
                        imgUrl = imgUrl.slice(0, i) + 't' + imgUrl.slice(i);
                        break;
                    }
                }
                avatarWrapper.find('.profile-pic').attr('src', imgUrl);
                avatarWrapper.find('.avatar-url').val(imgUrl);
            });
        }
    });

    $('.upload-button').on('click', function () {
        $(this).parent().find(".file-upload").click();
    });
});