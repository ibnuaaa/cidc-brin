<script>
$(document).ready(function() {

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
                const name = $('input[name="name"]')

                axios.post('/material', {
                    name: name.val(),
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
