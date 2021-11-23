<script>
function approve(type) {
    axios.put('/material_request/approve/{{$data['id']}}', {
        type: type
    }).then((response) => {
        location.reload()
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
        }
    })
}


function setStatusAlokasi(status_alokasi) {
    showLoading()
    var status_alokasi_notes = $('#status_alokasi_notes')

    axios.put('/material_request/{{$data['id']}}', {
        status_alokasi: status_alokasi,
        status_alokasi_notes: status_alokasi_notes.val()
    }).then((response) => {
        location.reload()
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
        }
    })
}

function openModalKeuangan() {
    $('#modalKeuangan').modal('show');
}

</script>
