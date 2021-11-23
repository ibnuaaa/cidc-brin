
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
    <span style="font-weight: bolder;">BERITA ACARA PEMERIKSAAN BARANG / JASA</span> <br>
    <span>
        {{ $receive_request->no_spb }}
    </span>
</div>
<br />


<br/><br/>
<div style="text-align: justify;">
Pada hari ini {{ dayIndo($receive_request->tgl_terima_dow) }} tanggal {{ terbilang($receive_request->tgl_terima_d) }} bulan  {{ monthIndo($receive_request->tgl_terima_m) }}  tahun {{ terbilang($receive_request->tgl_terima_y) }}, kami selaku Tim Teknis Pembantu PPK Barang Farmasi,
yang diangkat berdasarkan Surat Keputusan Direktur Utama RS Pusat Otak Nasional
selaku Kuasa Pengguna Anggaran Nomor : HK.02.03/XXXIX/236/2021 tanggal 4 Januari 2021
,dalam hal ini bertindak atas nama Pejabat Pembuat Komitmen (PPK) Belanja Operasional
membuat Berita Acara Pemeriksaan Barang / Jasa yang diserahkan oleh :
</div>
<br/>

<table style="width: 15cm">
    <tr>
        <td style="width: 0.5cm">
            1
        </td>
        <td style="width: 6cm">
            Nama Penyedia
        </td>
        <td style="width: 0.5cm">
            :
        </td>
        <td style="width: 9cm">
            {{$distributor_rujukan->name}}
        </td>
    </tr>
    <tr>
        <td>
            2
        </td>
        <td>
            Alamat
        </td>
        <td>
            :
        </td>
        <td>
            {{$distributor_rujukan->alamat}}
        </td>
    </tr>
    <tr>
        <td>
            3
        </td>
        <td>
            Nomor Kontrak/SPK/SP
        </td>
        <td>
            :
        </td>
        <td>
            {{$purchase_order->nomor}}
        </td>
    </tr>
    <tr>
        <td>
            4
        </td>
        <td>
        	Nama Pengadaan
        </td>
        <td>
            :
        </td>
        <td>
            {{ $purchase_order->name }}
        </td>
    </tr>
    <tr>
        <td>
            5
        </td>
        <td>
        	Uraian
        </td>
        <td>
            :
        </td>
        <td>
            Terlampir
        </td>
    </tr>
</table>
<br />
Kami melakukan pemeriksaan dan penelitian dengan sebaik-baiknya terhadap pekerjaan tersebut sesuai dengan ketentuan dalam Kontrak / Surat Perintah Kerja (SPK) / Surat Pesanan (SP).
<br><br>
Kami berkesimpulan bahwa hasil pekerjaan tersebut dilaksanakan dalam keadaan baru, baik, cukup dan lengkap sesuai dengan ketentuan dan syarat-syarat yang berlaku.
<br><br>
Demikian berita acara Pemeriksaan Barang / Jasa ini kami buat dengan sebenarnya, untuk digunakan sebagaimana mestinya.
<br>

<table cellpadding="0" style="width: 100%">
    <tr>
        <td style="width: 30%;" valign="top">
            <br />
            Penyedia Barang / Jasa
            <br />
            {{$distributor_rujukan->name}}
            <br />
            <br />
            <br />
            <br />
            (................................)
            <br />
        </td>
        <td style="width: 50%;" valign="top">
            <br />
            Tim Teknis Pembantu PPK Barang Farmasi
            <br/><br/>
            <table cellspacing="0"  cellspaddingg="0">
                <tr>
                    <td>
                        Benhard Parlindungan, SE
                        <br/><br/>
                    </td>
                    <td>
                        : Ketua
                        <br/><br/>
                    </td>
                    <td>
                        ..............................
                        <br/><br/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Dwi Kurniawan, Amd. Far
                        <br/><br/>
                    </td>
                    <td>
                        : Sekretaris
                        <br/><br/>
                    </td>
                    <td>
                        ..............................
                        <br/><br/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Emma Eka S., Amd. Far
                        <br/><br/>
                    </td>
                    <td>
                        : Anggota
                        <br/><br/>
                    </td>
                    <td>
                        ..............................
                        <br/><br/>
                    </td>
                </tr>
            </table>


        </td>
    </tr>
</table>

<div class="line-height-surat-body" style="page-break-before: always; margin:0.5cm 0cm 0cm 0cm"></div>

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
<br />
<div>
<span style="font-weight: bolder;">Lampiran</span>
</div>

<table style="width: 15cm" cellpadding="0" cellspacing="0">
    <tr>
        <td style="width: 3cm">
            Nomor
        </td>
        <td style="width: 9cm">
            : {{ $receive_request->no_spb }}
        </td>
    </tr>
    <tr>
        <td>
            Tanggal
        </td>
        <td>
            : {{ dateIndo($receive_request->tgl_terima) }}
        </td>
    </tr>
    <tr>
        <td>
            No. Dokumen
        </td>
        <td>
            : {{ $receive_request->no_faktur ? $receive_request->no_faktur : $receive_request->surat_jalan }}
        </td>
    </tr>
</table>

<br>
<div style="text-align: center">
<b>URAIAN KUANTITAS DAN SPESIFIKASI</b>
</div>
<br>
<style type="text/css">
    .font1 td {
        font-size: 10px;
    }
</style>

<table style="width: 100%" class="table">
    <tr>
        <td class="text-center" style="width: 2%;font-weight: bold;">
            No
        </td>
        <td class="text-center" style="width: 15%;font-weight: bold;">
            Nama Barang
        </td>
        <td class="text-center" style="width: 10%;font-weight: bold;">
            Keterangan
        </td>
        <td class="text-center" style="width: 4%;font-weight: bold;">
            Jumlah
        </td>
        <td class="text-center" style="width: 4%;font-weight: bold;">
            Satuan
        </td>
        <td class="text-center" style="width: 8%;font-weight: bold;">
            Tgl Expired
        </td>
        <td class="text-center" style="width: 7%;font-weight: bold;">
            Hasil Pemeriksaan
        </td>
    </tr>
    @foreach ($receive_request->receive_request_item as $key => $value)
    <tr>
        <td>
            {{ $key+1 }}
        </td>
        <td>
            {{ $value->material->name }}
        </td>
        <td>
            {{$value->purchase_order_item->kontrak_payung_item->kuantitas}}

        </td>
        <td>
            {{ $value->qty }}
        </td>
        <td>
            {{ $value->material->unit_nm_small }}
        </td>
        <td>
            {{ dateIndo($value->expired_date) }}
        </td>
        <td>
            Barang lengkap dan dalam kondisi baik
        </td>
    </tr>
    @endforeach
</table>

<table cellpadding="0" style="width: 100%">
    <tr>
        <td style="width: 30%;" valign="top">
            <br />
            Penyedia Barang / Jasa
            <br />
            {{$distributor_rujukan->name}}
            <br />
            <br />
            <br />
            <br />
            (................................)
            <br />
        </td>
        <td style="width: 50%;" valign="top">
            <br />
            Tim Teknis Pembantu PPK Barang Farmasi
            <br/><br/>
            <table cellspacing="0"  cellspaddingg="0">
                <tr>
                    <td>
                        Benhard Parlindungan, SE
                        <br/><br/>
                    </td>
                    <td>
                        : Ketua
                        <br/><br/>
                    </td>
                    <td>
                        ..............................
                        <br/><br/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Dwi Kurniawan, Amd. Far
                        <br/><br/>
                    </td>
                    <td>
                        : Sekretaris
                        <br/><br/>
                    </td>
                    <td>
                        ..............................
                        <br/><br/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Emma Eka S., Amd. Far
                        <br/><br/>
                    </td>
                    <td>
                        : Anggota
                        <br/><br/>
                    </td>
                    <td>
                        ..............................
                        <br/><br/>
                    </td>
                </tr>
            </table>


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
