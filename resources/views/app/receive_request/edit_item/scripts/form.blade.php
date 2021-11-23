<script>

    $(document).ready(function() {
        $('body #datepicker').datepicker();
    });

    function updateItem(e, purchase_order_item_id, receive_request_id, material_id, type) {

        // showLoading()

        var data = {
            purchase_order_item_id: purchase_order_item_id,
            receive_request_id: receive_request_id,
            material_id: material_id,
        }

        if (type == 'qty') {
            data.qty = $(e).val()
        } else if (type == 'expired_date') {
            data.expired_date = $(e).val()
        } else if (type == 'margin') {
            data.margin = $(e).val()
        } else if (type == 'harga_jual') {
            data.harga_jual = $(e).val()
        }

        $(e).addClass('loadingField')
        axios.put('/receive_request_item', data).then((response) => {
            $(e).removeClass('loadingField')

            console.log(response.data.data.harga_jual)

            $('#harga_jual_'+purchase_order_item_id).html(numberWithCommas(response.data.data.harga_jual))

            if (type == 'qty' || type == 'expired_date') {
                updateItem('#margin_'+purchase_order_item_id, purchase_order_item_id, receive_request_id, material_id, 'margin')
            }

        }).catch((error) => {
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }

    function numberWithCommas(x) {
        var num = parseFloat(x)
        return num.toLocaleString('id-ID', {maximumFractionDigits:2})
    }

    function updateReceive(e, id, type) {
        // showLoading()

        var data = {}
        if (type == 'tgl_terima') {
            data = {
                tgl_terima : $(e).val()
            }
        } else if (type == 'tgl_jatuh_tempo') {
            data = {
                tgl_jatuh_tempo : $(e).val()
            }
        } else if (type == 'tgl_invoice') {
            data = {
                tgl_invoice : $(e).val()
            }
        } else if (type == 'jenis_pembelian') {
            data = {
                jenis_pembelian : $(e).val()
            }
        } else if (type == 'e_catalog') {
            data = {
                e_catalog : $(e).val()
            }
        } else if (type == 'paket_id') {
            data = {
                paket_id : $(e).val()
            }
        } else if (type == 'tipe_barang') {
            data = {
                tipe_barang : $(e).val()
            }
        }  else if (type == 'no_faktur') {
            data = {
                no_faktur : $(e).val()
            }
        }  else if (type == 'surat_jalan') {
            data = {
                surat_jalan : $(e).val()
            }
        }  else if (type == 'petugas_pengiriman') {
            data = {
                petugas_pengiriman : $(e).val()
            }
        }  else if (type == 'no_spb') {
            data = {
                no_spb : $(e).val()
            }
        }


        $(e).addClass('loadingField')
        axios.put('/receive_request/' + id, data).then((response) => {

            $(e).removeClass('loadingField')

            // location.reload()
        }).catch((error) => {
            hideLoading()
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                hideLoading()
            }
        })
    }

    function approve() {
        showLoading()
        axios.put('/receive_request/approve/{{$receive_request['id']}}').then((response) => {
            location.reload()
        }).catch((error) => {
            hideLoading()
            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                Swal.fire({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
            }
        })
    }
</script>
