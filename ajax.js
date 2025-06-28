$(document).ready(function () {
    $('#formPegawai').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax_input_pegawai.php',
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: response,
                    timer: 2000,
                    showConfirmButton: false
                });
                $('#formPegawai')[0].reset();
            }
        });
    });

    $('#formRiwayat').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax_input_riwayat.php',
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: response,
                    timer: 2000,
                    showConfirmButton: false
                });
                $('#formRiwayat')[0].reset();
            }
        });
    });
});
