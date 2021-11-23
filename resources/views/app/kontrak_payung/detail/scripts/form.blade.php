<script>
function approve(type) {
    axios.put('/kontrak_payung/approve/{{$data['id']}}', {
        type: type
    }).then((response) => {
        location.reload()
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
        }
    })
}

function prepareUpload(el) {
  var files = $(el)[0].files;
  for (i = 0; i < files.length; i++) {
    uploadFile(files[i], 'kontrak_payung');
  }
}


var files = [];
var files_pengantar = [];
function uploadFile(file, object) {
  // showLoading()
  var formData = new FormData();
  formData.append('file', file);

    $.ajax({
        url: window.apiUrl + '/upload',
            type: 'post',
            data: formData,
            beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', window.axios.defaults.headers['Authorization'])
        },
        contentType: false,
        processData: false,
        success: function(response) {

            const data_storage = {
                object: object,
                object_id: '{{$id}}',
                file: JSON.stringify(response.data)
            };

            axios.post('/storage/save_excel', data_storage).then((response) => {
                    // hideLoading()
                    location.reload()
                }).catch((error) => {
                    if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                        Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                        hideLoading()
                    }
                })

        }
    });

}
</script>
