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
                const akhir_jangka_waktu = $('input[name="akhir_jangka_waktu"]')
                const distributor_id = $('select[name="distributor_id"]')
                const distributor_rujukan_id = $('select[name="distributor_rujukan_id"]')
                const ssph_number = $('input[name="ssph_number"]')
                const ssph_date = $('input[name="ssph_date"]')
                const tempat_kontrak = $('input[name="tempat_kontrak"]')
                const jenis_pengadaan_id = $('select[name="jenis_pengadaan_id"]')
                const tanggal_balasan_ssph = $('input[name="tanggal_balasan_ssph"]')

                axios.post('/kontrak_payung', {
                    nomor: nomor.val(),
                    tanggal: tanggal.val(),
                    akhir_jangka_waktu: akhir_jangka_waktu.val(),
                    distributor_id: distributor_id.val(),
                    distributor_rujukan_id: distributor_rujukan_id.val(),
                    ssph_number: ssph_number.val(),
                    ssph_date: ssph_date.val(),
                    tempat_kontrak: tempat_kontrak.val(),
                    jenis_pengadaan_id: jenis_pengadaan_id.val(),
                    tanggal_balasan_ssph: tanggal_balasan_ssph.val()
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


    $('select[name=distributor_id]').select2({
        ajax: {
            url: window.apiUrl + '/distributor/type/principal',
            headers: {
                'Authorization': window.axios.defaults.headers['Authorization']
            },
            dataType: 'json',
            delay: 50,
            cache: true,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data.records, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            }
        },
        minimumInputLength: 1,
    });

    $('select[name=distributor_rujukan_id]').select2({
        ajax: {
            url: window.apiUrl + '/distributor',
            headers: {
                'Authorization': window.axios.defaults.headers['Authorization']
            },
            dataType: 'json',
            delay: 50,
            cache: true,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data.records, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            }
        },
        minimumInputLength: 1,
    });

})


</script>
