$(document).ready(function () {
    $('.tampilModalKeranjang').on('click', function () {
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/fauzan.celciusrpl2.com/user/getKdBrg',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#kd_brg').val(data.kd_brg);
            }
        });

    });

});