<script>
$(document).ready(function() {
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
                const alias_name = $('input[name="alias_name"]')

                const data = {
                    name: name.val(),
                    alias_name: alias_name.val(),
                }

                axios.put('/material/{{$data['id']}}', data).then((response) => {
                    window.location = '{{ url('/material') }}';
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
