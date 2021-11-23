
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
    <span style="font-weight: bolder;">SURAT PESANAN BARANG</span> <br>
    <span>
        Nomor : {{ $data->nomor }}
    </span>
</div>
<br />


Kepada Yth. <br />

@if(!empty($data->purchase_order_item[0]->kontrak_payung_item->kontrak_payung->distributor_rujukan2))
{{$data->purchase_order_item[0]->kontrak_payung_item->kontrak_payung->distributor_rujukan2->name}}<br/>
{{$data->purchase_order_item[0]->kontrak_payung_item->kontrak_payung->distributor_rujukan2->alamat}}
@endif
<br/><br/>
<div style="text-align: justify;">
Berdasarkan pengajuan bahan (Purchase Order) dari Instalasi Farmasi Nomor {{ $data->material_request->nomor }} Tanggal {{ dateIndo($data->tanggal) }} , maka untuk
melaksanankan pengadaan barang/jasa di lingkungan RS Pusat Otak Nasional Prof. Dr. dr.  Mahar Mardjono, dengan ini
kami mohon agar dikirimkan

@if(!empty($data->purchase_order_item[0]->kontrak_payung_item->kontrak_payung->jenis_pengadaan2))
{{$data->purchase_order_item[0]->kontrak_payung_item->kontrak_payung->jenis_pengadaan2->name}}
@endif

 sebagai berikut
</div>
<br/>
<br/>



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

    ?>
    @foreach ($data->purchase_order_item as $key => $val)

    <?php

        $total += $val->subtotal;

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
        <td class="text-center">
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
            Total (Jumlah + PPN 10%)
        </td>
        <td class="text-right">
            {{ number_format($total, 2, ',', '.') }}
        </td>
    </tr>
</table>
<br />
Keterangan<br />
<ol>
    <li>
        Barang tersebut dikirim dan diserahkan kepada kami paling lambat 5 (lima) hari kerja sejak
        Surat Pesanan Barang (SPB)
    </li>
    <li>
        Pembayaran  dilakukan  melalui  dana  BLU RSPON  Tahun 2021 dilengkapi  dengan dokumen tagihan sebagai berikut :
        <ol>
            <li>
                Surat Pesanan Barang (SPB) Asli
            </li>
            <li>
                Berita Acara Penerimaan/pemeriksaan  Barang/Jasa (BAPBJ) Asli
            </li>
            <li>
                Kwitansi bermaterai
            </li>
            <li>
                Faktur Barang / Invoice
            </li>
            <li>
                Surat Jalan
            </li>
            <li>
                Faktur pajak dan SSP
            </li>
        </ol>
    </li>
    <li>
        Batas akhir penukaran faktur adalah  14(empat belas) hari  kerja  sejak  barang diterima,
        dibuktikan  dengan  Berita Acara Penerimaan/pemeriksaan  Barang/Jasa
    </li>
</ol>
<br>
Demikian disampaikan untuk dapat  dilaksanakan sebagaimana mestinya.
<br>

<table cellpadding="0" style="width: 100%">
    <tr>
        <td style="width: 50%;">
        </td>
        <td style="width: 30%;">
            <br />
            Jakarta, {{ dateIndo(date('Y-m-d')) }}<br>
            Pejabat Pembuat Komitmen (PPK),
            Belanja Operasional
            <br />
            <br />
            <br />
            <br />
            <br />
            {{ !empty($data->ppk->name) ? $data->ppk->name : '-' }}<br />
            NIP.{{ !empty($data->ppk->nip) ? $data->ppk->nip : '-' }}
        </td>
    </tr>
</table>

<style type="text/css">
    * {
        font-family: font-family: Arial, Helvetica, sans-serif !important;
    }

    * {
        font-size: 11pt;
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
