<script type="text/javascript">

    $(document).ready(function() {
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




        var distributor = $('select[name=distributor]').select2({
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

        console.log('ssss')
        distributor.on('select2:select', function (e) {
            console.log('aaaa')
            updatePayungHukum(e.params.data.id)
        });

        @if ($data->distributor)
        var newOption = new Option('{{ $data->distributor->name }}', '{{ $data->id }}', false, false);
        $(distributor).append(newOption).trigger('change');
        @endif


    });

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


    function updatePayungHukum(distributor_id) {
        showLoading()
        axios.put('/kontrak_payung/{{ $data['id'] }}', {
            distributor_id: distributor_id,
        }).then((response) => {
            hideLoading()
            Swal.fire({ title: 'Success', text: 'Sukses mengganti Distributor', type: 'success', confirmButtonText: 'Ok' })
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }

    function updateMaterial(e, id) {
        showLoading()
        axios.put('/kontrak_payung_item/' + id, {
            qty: $(e).val(),
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

</script>
