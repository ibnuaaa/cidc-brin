<script>
function updateMaterial(e, id) {
    showLoading()
    axios.put('/material_distributor/' + id, {
        price: $(e).val(),
    }).then((response) => {
        location.reload()
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
            hideLoading()
        }
    })
}

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
});

function saveMaterial(material_id) {
    showLoading()
    axios.post('/material_distributor', {
        material_id: material_id,
        distributor_id: '{{ $data['id'] }}',
        type: 'principal'
    }).then((response) => {
        location.reload()
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
            hideLoading()
        }
    })
}

function deleteMaterial(id) {
    if (confirm('Apakah anda yakin ingin menghapus data ?')) {
        showLoading()
        axios.delete('/material_distributor/'+id).then((response) => {
            location.reload()
        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }
}

</script>
