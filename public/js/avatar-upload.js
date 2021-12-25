$(document).ready(function () {
    $('.file-upload').on('change', function () {
        if (this.files && this.files[0]) {
            let $files = $(this).get(0).files;
            if ($files[0].size > 5 * 1024 * 1024) {
                alert('Ảnh cần nhỏ hơn 5MB');
                return false;
            }

            let apiUrl = 'https://api.imgbb.com/1/upload';
            let apiKey = '2abbdd342509eceb81fddd96b6bc9e83';

            let formData = new FormData();
            formData.append('image', $files[0]);

            let avatarWrapper = $(this).parent();

            $.ajax({
                method: 'post',
                url: apiUrl + '?key=' + apiKey,
                contentType: false,
                dataType: 'json',
                data: formData,
                processData: false,

                success: function (response) {
                    if (response.success == true) {
                        let imgUrl = response.data.thumb.url;
                        
                        avatarWrapper.find('.profile-pic').attr('src', imgUrl);
                        avatarWrapper.find('.avatar-url').val(imgUrl);
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
    });

    $('.upload-button').on('click', function () {
        $(this).parent().find(".file-upload").click();
    });
});