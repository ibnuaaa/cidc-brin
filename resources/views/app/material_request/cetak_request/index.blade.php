

<table>
    <tr>
        <td style="width: 15%"  class="text-center">
            <img style="width: 100px" src="img/logo-kemenkes.jpg">
        </td>
        <td class="text-center" style="font-size: 12px;width: 70%">
            <span style="font-weight: bold; font-size: 12pt;">
                KEMENTERIAN KESEHATAN REPUBLIK INDONESIA<br>
                DIREKTORAT JENDRAL PELAYANAN KESEHATAN<br>
            </span>
            RUMAH SAKIT PUSAT OTAK NASIONAL, Prof. Dr. dr. MAHAR MARDJONO  JAKARTA<br>
            Jl. M.T. Haryono Kav. 11 Cawang, Jakarta Timur 13630<br>
            Telp. (021) 2937 3377  (Hunting), Fax. (021) 2937 3445, 2937 3385<br />
            Website: rspon.co.id; Email: info@rspon.co.id; rspotakn@gmail.com<br />
        </td>
        <td style="width: 15%" class="text-center">
            <img style="width: 100px" src="img/logo-rspon.jpg">
        </td>
    </tr>
</table>
<br />
<div style="border-bottom: solid thin;"></div>
<br />
<div class="text-center">
    <span style="font-size: 11pt; font-weight: bold;">
        MATERIAL REQUEST
    </span>
    <br />

    <table style="margin: 0px auto;">
        <tr>
            <td style="width: 30%;">
                Nomor
            </td>
            <td style="width: 70%;">
                : {{ $data['nomor'] }}
            </td>
        </tr>
        <tr>
            <td>
                Tanggal
            </td>
            <td>
                : {{ dateIndo($data['tanggal']) }}
            </td>
        </tr>
    </table>
</div>


<br />
Yth. Pejabat Pembuat Komitmen (PPK)<br />
Di Jakarta<br /><br />

Berikut kami sampaikan  permintaan pembelian bahan perbekalan farmasi dengan kondisi sebagai berikut :

<br /><br />

<table>
    <tr>
        <td>
            1. Nama Pengadaan
        </td>
        <td>
            : {{ $data['name'] }}
        </td>
    </tr>
    <tr>
        <td>
            2. Bulan
        </td>
        <td>
            : {{ monthIndo($data['bulan']) }} {{ $data['tahun'] }}
        </td>
    </tr>
    <tr>
        <td>
            3. Ketentuan Pengiriman
        </td>
        <td>
            : {{ $data['ketentuan_pengiriman'] }}
        </td>
    </tr>
</table>

<br />
Adapun jenis perbekalan farmasi yang diajukan yaitu:
<br />

<?php

$total_all = 0;
$index = 0;

?>

@foreach ($data_per_distributor as $key_dist => $data_distributor)
<?php $index++; ?>
<br />
Distributor : {{ (!empty($data_distributor[0]->distributor->name)) ? $data_distributor[0]->distributor->name : '-' }}
<table class="table" style="width: 100%">
    <tr>
        <th class="text-center" style="width: 5%;">
            No
        </th>
        <th class="text-center" style="width: 20%;">
            Nama bahan
        </th>
        <th class="text-center" style="width: 10%;">
            Spesifikasi
        </th>
        <th class="text-center" style="width: 8%;">
            Volume
        </th>
        <th class="text-center" style="width: 8%;">
            Satuan
        </th>
        <th class="text-center" style="width: 10%;">
            Harga Satuan
        </th>
        <th class="text-center" style="width: 10%;">
            Jumlah Harga
        </th>
    </tr>
    <?php

        $total = 0;
        $qty = 0;
        $total_all = 0;

    ?>
    @foreach ($data_distributor as $key => $val)

    <?php

        $total += $val->subtotal;
        $total_all += $val->subtotal;

    ?>

    <tr>
        <td class="text-center">
            {{ $key+1 }}
        </td>
        <td>
            {{ $val->material->name }}
        </td>
        <td>
            {{ $val->spesifikasi }}
        </td>
        <td class="text-right">
            {{ $val->qty }}
        </td>
        <td class="text-center">
            {{ $val->material->unit_nm_small }}
        </td>
        <td class="text-right">
            {{ number_format($val->price, 2, ',', '.') }}
        </td>
        <td class="text-right">
            {{ number_format($val->subtotal, 2, ',', '.') }}
        </td>
    </tr>
    @endforeach



    <tr>
        <td colspan="6" class="text-right">
            Total
        </td>
        <td class="text-right">
            {{ number_format($total_all, 2, ',', '.') }}
        </td>
    </tr>

</table>
@endforeach

<br />
Demikian kami sampaikan, atas perhatiannya dan kerjasamanya kami ucapkan terimakasih
<br /><br />


<table cellpadding="0" cellspacing="0" style="width: 100%">
    <tr>
        <td style="width: 30%;">
            Mengetahui,<br />
            Kepala Instalasi Farmasi
            <br />
            <br />
            <br />
            <br />
            <br />
            {{ $data->kepala_instalasi_farmasi ? $data->kepala_instalasi_farmasi->name : '' }}<br />
            NIP.{{ $data->kepala_instalasi_farmasi ? $data->kepala_instalasi_farmasi->nip :'' }}
        </td>
        <td style="width: 30%;">
        </td>
        <td style="width: 30%;">
            <br />
            PJ Logistik dan Produksi
            <br />
            <br />
            <br />
            <br />
            <br />
            {{ $data->pj_logistik_produksi ? $data->pj_logistik_produksi->name : '' }}<br />
            NIP.{{ $data->pj_logistik_produksi ? $data->pj_logistik_produksi->nip : '' }}
        </td>
    </tr>
</table>

<style type="text/css">
    * {
        font-family: font-family: Arial, Helvetica, sans-serif !important;
    }

    * {
        font-size: 12pt;
    }

    .table {
        border-collapse: collapse;
    }

    .table td, .table th {
        border: solid thin;
        padding: 2px;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
</style>
