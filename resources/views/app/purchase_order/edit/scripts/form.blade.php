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
                const nomor = $('input[name="nomor"]')
                const tanggal = $('input[name="tanggal"]')
                const bulan = $('select[name="bulan"]')
                const tahun = $('input[name="tahun"]')
                const ketentuan_pengiriman = $('textarea[name="ketentuan_pengiriman"]')

                const data = {
                    nomor: nomor.val(),
                    tanggal: tanggal.val(),
                    bulan: bulan.val(),
                    tahun: tahun.val(),
                    name: name.val(),
                    ketentuan_pengiriman: ketentuan_pengiriman.val()
                }

                axios.put('/purchase_order/{{$data['id']}}', data).then((response) => {
                    window.location = '{{ url('/purchase_order') }}';
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
