<script>
$(document).ready(function() {

    $('body #datepicker').datepicker();

    const form = document.getElementById('newUserForm')
    const newUserForm = $('#newUserForm').formValidation({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            }
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


    $('.saveAction').click(function() {
        const { urlNext, isRecreate } = $(this).data()
        newUserForm.validate().then(function(status) {
            if (status === 'Valid') {
                const nomor = $('input[name="nomor"]')
                const tanggal = $('input[name="tanggal"]')
                const bulan = $('select[name="bulan"]')
                const tahun = $('input[name="tahun"]')
                const name = $('input[name="name"]')
                const ketentuan_pengiriman = $('textarea[name="ketentuan_pengiriman"]')

                axios.post('/purchase_order', {
                    nomor: nomor.val(),
                    tanggal: tanggal.val(),
                    bulan: bulan.val(),
                    tahun: tahun.val(),
                    name: name.val(),
                    ketentuan_pengiriman: ketentuan_pengiriman.val()
                }).then((response) => {
                    const { data } = response.data
                    if (!isRecreate) {
                        window.location = urlNext
                    } else {
                        window.location.reload()
                    }
                }).catch((error) => {
                    if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                        Swal.fire({ name: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                    }
                })
            }
        })
    })

})


</script>
