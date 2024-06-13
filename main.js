$(document).ready(function () {
    $('.logoff').on('click', function () {
        $.ajax({
            url: 'logoff.php',
            success: function (response) {
                if (response == 1) {
                    window.location.reload();
                }
            }
        })
    });
});