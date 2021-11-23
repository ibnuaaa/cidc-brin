<script>
$(document).ready(function() {

    $('body #datepicker').datepicker();

    const form = document.getElementById('editMailClassificationForm')
    const editMailClassificationForm = $('#editMailClassificationForm').formValidation({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Title is required'
                    }
                }
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap(),
            submitButton: new FormValidation.plugins.SubmitButton(),
            icon: new FormValidation.plugins.Icon({
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh',
            })
        }
    }).data('formValidation')

    $('#saveAction').click(function() {
        editMailClassificationForm.validate().then(function(status) {
            if (status === 'Valid') {
                const name = $('input[name="name"]')
                const alamat = $('input[name="alamat"]')
                const telepon = $('input[name="telepon"]')
                const faksimile = $('input[name="faksimile"]')
                const website = $('input[name="website"]')
                const email = $('input[name="email"]')
                const wakil_sah = $('input[name="wakil_sah"]')
                const nama_penanggung_jawab = $('input[name="nama_penanggung_jawab"]')
                const jabatan_penanggung_jawab = $('input[name="jabatan_penanggung_jawab"]')
                const nama_bank = $('input[name="nama_bank"]')
                const no_rekening = $('input[name="no_rekening"]')
                const atas_nama_rekening = $('input[name="atas_nama_rekening"]')

                const nomor_akta_pendirian_perusahaan = $('input[name="nomor_akta_pendirian_perusahaan"]')
                const tanggal_akta_pendirian_perusahaan = $('input[name="tanggal_akta_pendirian_perusahaan"]')
                const nomor_akta_perubahan_terakhir = $('input[name="nomor_akta_perubahan_terakhir"]')
                const tanggal_akta_perubahan_terakhir = $('input[name="tanggal_akta_perubahan_terakhir"]')

                const data = {
                    name: name.val(),
                    alamat: alamat.val(),
                    telepon: telepon.val(),
                    faksimile: faksimile.val(),
                    website: website.val(),
                    email: email.val(),
                    wakil_sah: wakil_sah.val(),
                    nama_penanggung_jawab: nama_penanggung_jawab.val(),
                    jabatan_penanggung_jawab: jabatan_penanggung_jawab.val(),
                    nama_bank: nama_bank.val(),
                    no_rekening: no_rekening.val(),
                    atas_nama_rekening: atas_nama_rekening.val(),
                    nomor_akta_pendirian_perusahaan: nomor_akta_pendirian_perusahaan.val(),
                    tanggal_akta_pendirian_perusahaan: tanggal_akta_pendirian_perusahaan.val(),
                    nomor_akta_perubahan_terakhir: nomor_akta_perubahan_terakhir.val(),
                    tanggal_akta_perubahan_terakhir: tanggal_akta_perubahan_terakhir.val(),
                }

                axios.put('/distributor/{{$data['id']}}', data).then((response) => {
                    window.location = '{{ url('/principal') }}';
                }).catch((error) => {
                    if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                        Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                    }
                })
            }
        })
    })

})

</script>
