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

        console.log('ssss')
        distributor.on('select2:select', function (e) {
            console.log('aaaa')
            console.log()

            updateMaterialRequestItem(e.params.data.id, this.getAttribute('data-item_id'))
        });


    });

    function saveMaterial(material_id) {
        showLoading()
        axios.post('/material_request_item', {
            material_id: material_id,
            material_request_id: '{{ $data['id'] }}'
        }).then((response) => {
            location.reload()
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }


    function updateMaterialRequestItem(distributor_id, id) {
        showLoading()
        axios.put('/material_request_item/' + id, {
            distributor_id: distributor_id,
        }).then((response) => {
            location.reload()
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })

        return false;
    }

    function numberWithCommas(x) {
        var num = parseFloat(x)
        return num.toLocaleString('id-ID', {maximumFractionDigits:2})
    }

    function updateMaterial(e, id, type) {
        $(e).addClass('loadingField')

        var data = {}
        if (type == 'qty') {
            data = {
                qty: $(e).val(),
            }
        } else if (type == 'notes') {
            data = {
                notes: $(e).val(),
            }
        }

        axios.put('/material_request_item/' + id, data).then((response) => {
            $(e).removeClass('loadingField')
            $('#subtotal_'+id).html(numberWithCommas(response.data.data.subtotal))
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }

    function deleteItem(id) {
        showLoading()
        axios.delete('/material_request_item/'+id).then((response) => {
            location.reload()
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }

</script>
