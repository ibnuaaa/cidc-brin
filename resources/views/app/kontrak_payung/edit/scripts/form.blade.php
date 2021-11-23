<script>
$(document).ready(function() {

    $('body #datepicker').datepicker();

    var material = $('select[name=material]').select2({
        ajax: {
            url: window.apiUrl + '/material',
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

    material.on('select2:select', function (e) {
        saveMaterial(e.params.data.id)
    });

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

                const data = {
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
                }

                axios.put('/kontrak_payung/{{$data['id']}}', data).then((response) => {
                    window.location = '{{ url('/kontrak_payung') }}';
                }).catch((error) => {
                    if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                        Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
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

function saveMaterial(material_id) {
    showLoading()
    axios.post('/kontrak_payung_item', {
        material_id: material_id,
        kontrak_payung_id: '{{ $data['id'] }}'
    }).then((response) => {
        location.reload()
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
            hideLoading()
        }
    })
}

function deleteItem(id) {
    if (confirm('Yakin ingin menghapus ?')) {
        showLoading()
        axios.delete('/kontrak_payung_item/'+id).then((response) => {
            location.reload()
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }

}



    function updateKontrakpayungItem(e, id, type) {
        // showLoading()
        var dataSave = []
        if (type == 'hna') {

            var hna = $(e).val()
            var diskon = 0
            if ($('#diskon_'+id).val()) diskon = $('#diskon_'+id).val()
            var diskon_nominal = (diskon/100) * hna
            var hna_diskon = hna - diskon_nominal
            var ppn = 10
            var ppn_nominal = (ppn/100) * hna_diskon
            var hna_diskon_ppn = hna_diskon + ppn_nominal

            $('#hna_diskon_'+id).val(hna_diskon)
            $('#hna_diskon_ppn_'+id).val(hna_diskon_ppn)


            dataSave = {
                hna: $(e).val(),
                hna_diskon: hna_diskon,
                hna_diskon_ppn: hna_diskon_ppn
            }

            saveUpdate(id, dataSave, e);

        } else if (type == 'diskon') {



            var hna = $('#hna_' + id).val()
            var diskon = 0
            if ($(e).val() && $(e).val() !== '') diskon = $(e).val()
            var diskon_nominal = (diskon/100) * hna

            var hna_diskon = hna - diskon_nominal
            var ppn = 10
            var ppn_nominal = (ppn/100) * hna_diskon
            var hna_diskon_ppn = hna_diskon + ppn_nominal

            $('#hna_diskon_'+id).val(hna_diskon)
            $('#hna_diskon_ppn_'+id).val(hna_diskon_ppn)


            dataSave = {
                diskon: $(e).val(),
                hna_diskon: hna_diskon,
                hna_diskon_ppn: hna_diskon_ppn
            }

            saveUpdate(id, dataSave, e);

        } else if (type == 'hna_diskon') {
            dataSave = {
                hna_diskon: $(e).val(),
            }
            saveUpdate(id, dataSave, e);
        } else if (type == 'hna_diskon_ppn') {
            dataSave = {
                hna_diskon_ppn: $(e).val(),
            }
            saveUpdate(id, dataSave, e);
        } else if (type == 'kuantitas') {
            dataSave = {
                kuantitas: $(e).val(),
            }
            saveUpdate(id, dataSave, e);
        }

        //
    }

    function saveUpdate(id, dataSave, e) {

        $(e).addClass('loadingField')

        axios.put('/kontrak_payung_item/' + id, dataSave).then((response) => {
            // location.reload()
            $(e).removeClass('loadingField')
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }

</script>
