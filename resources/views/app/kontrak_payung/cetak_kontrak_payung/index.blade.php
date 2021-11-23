

<div class="text-center">
   <span style="font-weight: bold;">SURAT PERJANJIAN/KONTRAK PAYUNG<br>
   PENGADAAN {{ strtoupper($data->jenis_pengadaan ? $data->jenis_pengadaan->name : '') }}<br>
   ANTARA<br>
   RUMAH SAKIT PUSAT OTAK NASIONAL<br>
   PROF. DR. Dr. MAHAR MARDJONO<br>
   DAN<br>
   {{ !empty($data->distributor->name) ? $data->distributor->name : '' }}<br>
   </span>
   <br>

   <table style="margin: 0px auto;">
      <tr>
         <td>
            Nomor
         </td>
         <td>
            :
         </td>
         <td>
            {{ $data->nomor }}
         </td>
      </tr>
      <tr>
         <td>
            Tanggal
         </td>
         <td>
            :
         </td>
         <td>
            {{ $data->tanggal_d }}
            {{ monthIndo($data->tanggal_m) }}
            {{ $data->tanggal_y }}
         </td>
      </tr>
   </table>
</div>
<br/>

<div style="text-align: justify;">
   SURAT PERJANJIAN/KONTRAK PAYUNG ini berikut semua lampirannya selanjutnya disebut “Kontrak” dibuat dan ditandatangani di {{ $data->tempat_kontrak }} pada hari <span class="text-bold">{{ strtoupper(dayIndo($data->tanggal_dow)) }}</span>
   tanggal <span class="text-bold">{{ strtoupper(terbilang($data->tanggal_d)) }}</span>
   bulan <span class="text-bold">{{ strtoupper(monthIndo($data->tanggal_m)) }}</span>
   tahun <span class="text-bold">{{ strtoupper(terbilang($data->tanggal_y)) }}</span> ({{ $data->tanggal_format_dmy }}),

   kami yang bertandatangan di bawah ini :<br/>
   <br/>
   <span class="text-bold">{{ !empty($data->kontrak_payung_approval_user->name) ? $data->kontrak_payung_approval_user->name : '' }}</span>, selaku Pejabat Pembuat Komitmen (PPK) Belanja Operasional Rumah Sakit Pusat Otak Nasional Prof. DR. dr. Mahar Mardjono Jakarta, dalam hal ini bertindak untuk dan atas nama Rumah Sakit Pusat Otak Nasional Prof. DR. dr. Mahar Mardjono Jakarta, yang berkedudukan di Jalan MT. Haryono, Cawang, Kramat jati, Jakarta Timur selanjutnya disebut “<span class="text-bold">PIHAK PERTAMA</span>” dan
   <br/>
   <span class="text-bold">{{ !empty($data->distributor->nama_penanggung_jawab) ? $data->distributor->nama_penanggung_jawab : '' }}</span>, selaku {{ !empty($data->distributor->jabatan_penanggung_jawab) ? $data->distributor->jabatan_penanggung_jawab : '' }}, yang dalam hal ini bertindak untuk dan atas nama {{ !empty($data->distributor->name) ? $data->distributor->name : '' }}, yang berkedudukan di {{ !empty($data->distributor->alamat) ? $data->distributor->alamat : '' }}, berdasarkan
   Akta Pendirian Perseroan Terbatas
   nomor {{ $data->distributor->nomor_akta_pendirian_perusahaan }},
   tanggal {{ dateIndo($data->distributor->tanggal_akta_pendirian_perusahaan) }}
   dan
   Akta Perubahan Terakhir nomor {{ $data->distributor->nomor_akta_perubahan_terakhir }},
   tanggal {{ dateIndo($data->distributor->tanggal_akta_perubahan_terakhir) }}
   selanjutnya disebut “<span class="text-bold">PIHAK KEDUA</span>”.<br/>
   <br/>
   <span class="text-bold">PIHAK PERTAMA</span> dan <span class="text-bold">PIHAK KEDUA</span> secara bersama-sama disebut “<span class="text-bold">PARA PIHAK</span>” dan masing-masing disebut “<span class="text-bold">PARA PIHAK</span>”<br/>
   <br/>
   <div class="text-center">
      MENGINGAT BAHWA :
   </div>
   <br/>
   <ol type="a" class="huruf_tipe1">
      <li>
         PIHAK PERTAMA telah menunjuk PIHAK KEDUA untuk pengadaan Obat sebagaimana diterangkan dalam kontrak ini;
      </li>
      <li>
         PIHAK KEDUA sebagaimana dinyatakan kepada PIHAK PERTAMA, memiliki keahlian profesional, personil, dan sumber daya teknis, serta telah menyetujui untuk mengadakan Obat sesuai dengan persyaratan dan ketentuan dalam Kontrak ini;
      </li>
      <li>
         PIHAK PERTAMA dan PIHAK KEDUA menyatakan memiliki kewenangan untuk menandatangani Kontrak ini, dan mengikat pihak yang diwakili;
      </li>
      <li>
            PIHAK PERTAMA dan PIHAK KEDUA mengakui dan menyatakan bahwa sehubungan dengan penandatanganan Kontrak ini masing-masing pihak:
            <ol class="angka_tipe2">
               <li>
                  telah dan senantiasa diberikan kesempatan untuk didampingi oleh penasehat hukum;
               </li>
               <li>
                  menandatangani Kontrak ini setelah meneliti secara patut;
               </li>
               <li>
                  telah membaca dan memahami secara penuh ketentuan Kontrak ini; dan
               </li>
               <li>
                  telah mendapatkan kesempatan yang memadai untuk memeriksa dan mengkonfirmasikan semua ketentuan dalam Kontrak ini beserta semua fakta dan kondisi yang terkait.
               </li>
            </ol>

      </li>
   </ol>
   <br />
   MAKA OLEH KARENA ITU, PIHAK PERTAMA dan PIHAK KEDUA dengan ini bersepakat dan menyetujui hal-hal sebagai berikut, berdasarkan:
   <ol class="angka_tipe1">
      <li>
         Peraturan Presiden Republik Indonesia Nomor 16 Tahun 2018 tentang Pengadaan Barang/Jasa Pemeliharaan
      </li>
      <li>

            Peraturan Menteri Kesehatan Republik Indonesia Nomor 72 Tahun 2016 tentang Standar Pelayanan Kefarmasian di Rumah Sakit, dalam lampiran mengenai pengadaan perlunya diperhatikan:
            <ol class="huruf_tipe2">
               <li>
                  Bahan Baku Obat harus disertai Sertifikasi Analisa
               </li>
               <li>
                  Bahan berbahaya harus menyertakan Material Safety Data Sheet (MSDS)
               </li>
               <li>
                  Minimal 3bulan masa kadaluarsa habis, penyedia wajib mengganti barang dengan masa kadaluwarsa yang lebih Panjang.
               </li>
            </ol>

      </li>
      <li>
         Surat {{ !empty($data->distributor->name) ? $data->distributor->name : '' }}, tanggal {{ dateIndo($data->tanggal_balasan_ssph) }}, Penawaran Harga Produk No. {{ $data->ssph_number }} {{ !empty($data->distributor->name) ? $data->distributor->name : '' }}
      </li>
      <li>
         Semua ketentuan dan persyaratan administrasi yang ditetapkan dan tercantum dalam Rencana Kerja dan Syarat-syarat (RKS) serta lampiran Perjanjian Pengadaan Barang/Jasa merupakan bagian yang tidak terpisahkan dari perjanjian ini.
      </li>
   </ol>
   <br />
   <div class="text-bold text-center">
      Pasal 1<br />
      Harga Obat<br />
   </div>
   <br />
   <ol class="angka_tipe1">
      <li>
         Harga yang tercantum dalam kontrak ini merupakan harga satuan, dengan rincian harga sesuai dengan yang terlampir dalam lampiran 1
      </li>
      <li>
         Jumlah kuantitas Obat sesuai dengan kebutuhan PIHAK PERTAMA, dengan estimasi pemakaian selama 1 (satu) tahun sesuai dengan dalam Surat Permohonan Penawaran Harga (SPPH) nomor {{ $data->ssph_number }} tanggal {{ dateIndo($data->ssph_date) }}.
      </li>
      <li>
         Harga Obat sesuai dengan lampiran 1 merupakan harga tetap dan mengikat selama jangka waktu kontrak ini berlaku.
      </li>
   </ol>
   <br />
   <div class="text-bold text-center">
      Pasal 2<br/>
      Jangka Waktu Berlaku Kontrak
   </div>
   <br />
   Kontrak ini berlaku sejak ditandatangani PARA PIHAK sampai dengan {{ dateIndo($data->akhir_jangka_waktu) }}
   <div class="text-bold text-center">
      Pasal 3<br>
      Penunjukan Distributor
   </div>
   <br />
   Untuk melayani pembelian Obat terhadap PIHAK PERTAMA selama kontrak ini berlangsung PIHAK KEDUA menunjuk distributor resmi yaitu :
   <br />
   <table>
      <tr>
         <td>Nama Distributor</td>
         <td>:</td>
         <td>{{ !empty($data->distributor->name) ? $data->distributor->name : '' }}</td>
      </tr>
      <tr>
         <td>Alamat</td>
         <td>:</td>
         <td>{{ !empty($data->distributor->address) ? $data->distributor->address : '' }}</td>
      </tr>
      <tr>
         <td>Nomor Rekening</td>
         <td>:</td>
         <td>{{ !empty($data->distributor->no_rekening) ? $data->distributor->no_rekening : '' }}</td>
        </tr>
   </table>
   <br />
   <div class="text-bold text-center">
      <br />
      Pasal 4<br />
      Hak dan Kewajiban PARA PIHAK
   </div>
   <br />



   <ol class="angka_tipe1">
      <li>

            Hak dan Kewajiban PIHAK PERTAMA<br />
            PIHAK PERTAMA mempunyai hak dan kewajiban untuk;
            <ol class="huruf_tipe2">
               <li>

                     Hak PIHAK PERTAMA :
                     <ol class="angka_tipe2">
                        <li>mengawasi dan memeriksa pekerjaan yang dilaksanakan oleh distributor</li>
                        <li>meminta laporan-laporan mengenai pelaksanaan pekerjaan yang dilakukan oleh distributor</li>
                        <li>melakukan pengawasan, pengendalian, dan evaluasi terhadap kinerja PIHAK KEDUA terkait dengan penyediaan Obat</li>
                        <li>PIHAK PERTAMA dapat melakukan pemutusan kontrak dalam hal PIHAK KEDUA melakukan pelanggaran dalam ketentuan Kontrak ini.</li>
                     </ol>

               </li>
               <li>

                     Kewajiban PIHAK PERTAMA
                     <ol class="angka_tipe2">
                        <li>
                           Memberi akses kepada distributor PIHAK KEDUA untuk pelaksanaan pekerjaan pengadaan Obat
                        </li>
                        <li>
                           Menerbitkan Surat Pesanan persediaan Farmasi Obat kepada distributor
                        </li>
                        <li>
                           Melakukan Pembayaran atas biaya pengadaan Obat yang diterima dari Distributor
                        </li>
                     </ol>

               </li>
            </ol>

      </li>
      <li>

            Hak dan Kewajiban PIHAK KEDUA<br />
            PIHAK KEDUA mempunyai hak dan kewajiban untuk;
            <ol class="huruf_tipe2">
               <li>

                     Hak PIHAK KEDUA
                     <ol class="angka_tipe2">
                        <li>
                           Mendapatkan akses dari PIHAK PERTAMA untuk pelaksanaan pekerjaan pengadaan obat
                        </li>
                        <li>
                           Menerima
                        </li>
                        <li>
                           Menerima pembayaran dari PIHAK PERTAMA melalui Distributor yang ditunjuk PIHAK KEDUA sesuai dengan pasal 3 kontrak ini;
                        </li>
                     </ol>

               </li>
               <li>

                     Kewajiban PIHAK KEDUA
                     <ol class="angka_tipe2">
                        <li>Memerintahkan Distributor untuk melayani pemesanan Obat yang disampaikan oleh PIHAK PERTAMA
                        </li>
                        <li>Melakukan pekerjaan Pengadaan Obat dan secara Surat Pesanan atau RSPON terhitung sejak tanggal
                            {{ dateIndo($data->tanggal) }}
                            sampai dengan {{ dateIndo($data->akhir_jangka_waktu) }} dan diserahkan kepada Instalasi Farmasi RSPON
                        </li>
                        <li>Memenuhi kebutuhan Obat tersebut sesuai dengan yang dipesan oleh RSPON selambat-lambatnya 5 (lima) hari kalender atau sebagaimana waktu yang ditetapkan dalam surat pesanan (PO), terhitung sejak diterimanya Surat Pesanan
                        </li>
                        <li>Memenuhi kebutuhan Obat dengan ketentuan:
                              a.  Memiliki masa kadaluarsa (expired date) minimal 2 (dua) tahun terhitung sejak tanggal penerimaan barang farmasi, kecuali dalam keadaan tertentu PIHAK KEDUA dapat menyerahkan barang yang memiliki masa kadaluarsa (expired date) kurang dari 2 (dua) tahun melalui persetujuan Instalasi Farmasi
                              b.  Dapat memiliki batas kadaluarsa kurang dari 2 (dua) tahun pada saat diterima untuk Obat yang memiliki stabilitas/masa edar (shelf life) kurang dari atau sama dengan 2 (dua) tahun.

                        </li>
                        <li>
                           PIHAK KEDUA harus mampu menjamin kesinambungan ketersediaan Obat sesuai dengan masa kontrak
                        </li>
                        <li>
                           Obat yang masuk dalam kategori Bahan Beracun dan Berbahaya (B3) harus disertai Material Safety Data Sheet (MSDS)
                        </li>
                        <li>
                           Memberikan label Berbahaya dan Beracun (B3) untuk ketersediaan Obat yang termasuk dalam kategori Bahan Berbahaya dan Beracun (B3)
                        </li>
                        <li>
                           Menerima retur/pengembalian Obat yang telah akan expired date (kadaluarsa) dalam 6 (enam) bulan setelah surat retur dikeluarkan oleh RSPON.  Penggantian atas barang retur dapat berupa :
                              -   Penggantian barang sejenis dengan expired date yang baru
                              -   Penggantian barang lain yang fast moving

                        </li>
                        <li>
                           Dalam rangka menjamin kelancaran pengiriman dan pemenuhan kebutuhan Obat RSPON, PIHAK KEDUA wajib mengirim Obat  generik sesuai dengan lampiran,
                        </li>
                        <li>
                           PIHAK KEDUA tidak dibenarkan mengalihkan tugas yang diterima dari PIHAK PERTAMA kepada pihak lain kecuali dengan persetujuan tertulis PIHAK PERTAMA.
                        </li>
                        <li>
                           Apabila terjadi perpindahan distributor perbekalan Farmasi, PIHAK KEDUA wajib menyerahkan surat dari dari principle sebelum berlakunya waktu perpindahan.
                        </li>
                        <li>
                           Apabila dalam waktu pelaksanaan Surat Perjanjian yaitu periode {{ dateIndo($data->tanggal) }} sampai dengan {{ dateIndo($data->akhir_jangka_waktu) }} Obat, alat kesehatan dan BMHP yang tercantum dalam Lampiran Surat Perjanjian ini  masuk daftar e-catalogue LKPP, maka Kedua Belah Pihak sepakat untuk melakukan proses pengadaan melalui system e-purchasing atau melakukan penyesuaian harga sesuai dengan e-catalogue.

                        </li>
                        <li>
                           Memberikan jaminan (garansi) kepada PIHAK PERTAMA dan bertanggung jawab penuh atas isi kandungan perbekalan farmasi
                              14) Menjamin Obat yang dijual kepada PIHAK KEDUA telah memenuhi persyaratan/standar/pedoman keamanan, kesehatan dan/atau pendistribusian Obat dengan mengirimkan Obat yang memiliki surat ijin edar yang masih berlaku yang dikeluarkan oleh Kementerian Kesehatan, apabila ditemukan Obat dalam kondisi tidak memenuhi syarat, maka PIHAK KEDUA wajib melakukan penggantian (return).
                        <li>
                           Tidak menjual Obat dengan harga yang lebih murah kepada pihak lain pada periode penjualan, jumlah, dan tempat serta spesifikasi teknis dan persyaratan yang sama.

                        </li>
                        <li>
                           memberikan laporan-laporan mengenai pelaksanaan pekerjaan yang dilakukan oleh PIHAK KEDUA;
                        </li>
                        <li>
                           bertanggung jawab terhadap segala kesalahan dan kelalaian yang dilakukan Distributor selama pelaksanaan penyediaan Obat.
                        </li>
                        <li>
                           Menerima PIHAK PERTAMA jika dalam sewaktu-waktu melakukan kunjungan ke PIHAK KEDUA untuk memastikan kualitas Obat.
                        </li>
                        <li>
                           Menanggung beban biaya terkait penggandaan dokumen perjanjian ini termasuk biaya materai tempel sebanyak 2 (dua) lembar @ Rp 10.000 (sepuluh ribu rupiah)
                        </li>
                     </ol>

               </li>
            </ol>

      </li>
    </ol>
    <br />
    <div class="text-bold text-center">
      Pasal 5<br />
      Larangan Korupsi, Kolusi dan Nepotisme (KKN) serta Penipuan
    </div>
    <br />
    <ol  class="angka_tipe1">
        <li>Berdasarkan Undang-undang Nomor 31 tahun 1999 tentang Pemberantasan Tindak Pidana Korupsi sebagaimana telah diubah dengan Undang-Undang Nomor 20 tahun 2001  serta Peraturan Presiden Nomor 16 tahun 2018 tentang Pengadaan Barang Jasa Pemerintah, PIHAK PERTAMA dan PIHAK KEDUA dilarang untuk :
            <ol  class="huruf_tipe2">
                <li>Menawarkan, menerima, atau menjanjikan untuk memberi atau menerima hadiah atau imbalan berupa apa saja atau melakukan tindakan lainnya untuk mempengaruhi siapapun yang diketahui atau patut dapat diduga berkaitan dengan pengadaan ini; dan</li>
                <li>Membuat dan/atau menyampaikan secara tidak benar dokumen dan/atau keterangan lain yang dipersyaratkan dalam pelaksanaan kontrak ini.</li>
            </ol>
        </li>
        <li>PIHAK KEDUA menjamin bahwa yang bersangkutan dan Distributor tidak akan melakukan tindakan yang dilarang sebagaimana dimaksud pada angka 1.</li>
        <li>Dalam hal PIHAK KEDUA melakukan pelanggaran sesuai dengan angka 1, maka PIHAK PERTAMA dapat memutuskan kontrak ini secara sepihak.</li>
    </ol>

    <br />
    <div class="text-bold text-center">
      Pasal 6<br >
      Pemesanan, Pengiriman, <br>
      Penagihan, Denda dan Pembayaran
    </div>
    <br />
    <ol  class="angka_tipe1">
    <li>Surat Pesanan dibuat oleh PIHAK PERTAMA dan ditujukan kepada Distributor.</li>
    <li>Jadwal pengiriman Obat oleh Distributor, diatur dalam Surat Pesanan.</li>
    <li>Pengiriman dilakukan oleh Distributor dan dikirim ke Gudang Farmasi Lantai Dasar Rumah Sakit Pusat Otak Nasional Prof. Dr. dr. Mahar Mardjono, Jalan MT. Haryono, Cawang, Jakarta Timur disaksikan oleh Tim Teknis Pembantu PPK untuk Barang Farmasi</li>
    <li>Batas akhir pengiriman barang adalah 5 (lima) hari kerja sejak Surat Pesanan diterbitkan oleh PIHAK PERTAMA</li>
    <li>Apabila melebihi waktu sesuai dengan angka 4, maka PIHAK KEDUA melalui Distributor akan dikenakan denda yaitu 1/1000 (satu permil) perhari dari total nilai tagihan.</li>
    <li>Segera setelah pengiriman barang, PIHAK KEDUA melalui Distributor wajib segera melakukan penagihan dengan melampirkan :
        <ol class="huruf_tipe2">
            <li>Kuitansi bermaterai ditujukan Kepada Kuasa Pengguna Anggaran Rumah Sakit Pusat Otak Nasional Prof. DR. dr. Mahar Mardjono Jakarta.</li>
            <li>Invoice/Faktur Barang</li>
            <li>Surat Jalan</li>
            <li>Surat Permohonan Pembayaran (Diatas Rp. 50 Juta)</li>
            <li>e-Faktur (PPN)</li>
            <li>e-billing (PPN dan PPh) atau SSP Manual</li>
            <li>Berita Acara Pemeriksaan Barang dan Jasa</li>
            <li>Berita Acara Serah Terima Barang dan Jasa (Diatas Rp. 50 Juta)</li>
            <li>Surat Pesanan/ PO</li>
            <li>Berita Acara Pembayaran (Diatas Rp. 50 Juta)</li>
        </ol>
    </li>
    <li>Apabila sampai dengan 14 (empat belas) hari kerja sejak pengiriman barang sesuai dengan angka 7, PIHAK KEDUA melelui Distributor tidak melakukan penagihan, maka akan dilakukan denda keterlambatan tagihan sebesar 1/1000 (satu permil) perhari dari total nilai tagihan.</li>
    <li>Pembayaran dilakukan oleh PIHAK PERTAMA kepada Distributor berdasarkan pesanan yang dikirimkan.</li>
    <li>PIHAK PERTAMA wajib membayar tagihan yang diajukan Distributor, maksimal 21 (dua puluh satu) hari kerja sejak mengirimkan tagihan (tukar faktur).</li>
    <li>Apabila sampai dengan 30 (tiga puluh) hari kerja sejak Distributor mengirimkan tagihan (tukar faktur) yang dibuktikan dengan Berita Acara Tukar Faktur,  PIHAK PERTAMA belum melakukan Pembayaran, maka PIHAK PERTAMA dikenakan denda keterlambatan pembayaran sebesar 1/1000 (satu permil) dari total tagihan.</li>
    </ol>

   <br />
   <div class="text-bold text-center">
      Pasal 7<br />
      Perubahan/ Adendum Kontrak
    </div>
    <br />
    <ol class="angka_tipe1">
    <li>
        Setiap perubahan perjanjian ini hanya dapat dilakukan atas kesepakatan tertulis dari PARA PIHAK.  Perubahan tersebut akan diatur dalam suatu addendum    perjanjian yang merupakan satu kesatuan dan bagian yang tidak terpisahkan dari perjanjian ini.
    </li>
    <li>
        Segala sesuatu yang belum diatur dalam perjanjian ini akan diatur dalam dokumen perjanjian tambahan (addendum) yang ditandatangan oleh PARA PIHAK yang merupakan satu kesatuan bagian tidak terpisahkan dari perjanjian ini.
    </li>
    </ol>
    <br />
    <div class="text-bold text-center">
      Pasal 8<br/>
      Penghentian Kontrak
    </div>
   <br />
   Penghentian kontrak dilakukan karena pekerjaan sudah selesai, berakhirnya masa berlaku kontrak sesuai dengan pasal 2 dan terjadi keadaan kahar
   <br />
   <div class="text-bold text-center">
      Pasal 9<br/>
      Pemutusan Kontrak
   </div>
   <br />
    <ol class="angka_tipe1">
    <li>Pemutusan Kontrak dapat dilakukan oleh PIHAK PERTAMA dan PIHAK KEDUA</li>
    <li>PIHAK PERTAMA dapat memutuskan kontrak dalam hal :
       <ol class="huruf_tipe2">
           <li>PIHAK KEDUA lalai/cedera janji dalam melaksanakan kewajiban sebagaimana diatur dalam pasal 4 angka 2 kontrak ini dan tidak memperbaiki kelalaiannya dalam jangka waktu yang telah ditentukan.</li>
           <li>PIHAK KEDUA terbukti melakukan KKN dan/atau kecurangan</li>
       <ol>
    </li>
    <li>
        PIHAK KEDUA dapat memutuskan kontrak dalam hal :
        <ol class="huruf_tipe2">
            <li>Akibat keadaan kahar sehingga PIHAK KEDUA tidak dapat melaksanakan pekerjaan sesuai ketentuan kontrak atau adendum kontrak;</li>
            <li>PIHAK PERTAMA gagal mematuhi keputusan akhir penyelesaian perselisihan; atau</li>
            <li>PIHAK PERTAMA tidak mematuhi kewajiban sebagaimana dimaksud dalam kontrak atau adendum kontrak.</li>
        </ol>
    </li>
    <li>Dalam hal terjadi pemutusan kontrak, PARA PIHAK sepakat untuk mengesampingkan ketentuan-ketentuan pada pasal 1266 dan 1267 KUHPerdata.</li>
    <li>Pemutusan kontrak dilakukan sekurang-kurangnya 30 (tiga puluh) hari kalender setelah salah satu pihak yang akan memutuskan kontrak menyampaikan pemberitahuan rencana pemutusan kontrak secara tertulis kepada Pihak yang akan diputuskan Kontraknya.</li>
    </ol>
   <br />
   <div class="text-bold text-center">
      Pasal 10<br/>
      Keadaan Kahar
   </div>
   <br />
   <ol class="angka_tipe1">
    <li>Yang dimaksud keadaan Kahar pada kontrak ini adalah suatu keadaan yang terjadi diluar kehendak PARA PIHAK dan tidak dapat diperkirakan sebelumnya, sehingga kewajiban yang ditentukan dalam kontrak ini tidak terpenuhi.</li>
        <li>Dalam hal terjadi keadaan kahar, pihak yang terkena keadaan kahar memberitahukan tentang terjadinya keadaan kahar kepada pihak lainnya yang berkontrak secara tertulis, dalam waktu paling lambat 14 (empat belas) hari kalender sejak terjadinya keadaan kahar, dengan menyertakan salinan pernyataan keadaan kahar yang dikeluarkan oleh pihak/instansi berwenang sesuai dengan peraturan perundang-undangan.</li>
        <li>Tidak termasuk keadaan kahar adalah hal-hal merugikan yang disebabkan oleh perbuatan dan kelalaian PARA PIHAK</li>
        <li>Keterlambatan pekerjaan yang diakibatkan keadaan kahar tidak dikenakan denda dan sanksi</li>
        <li>Pada saat terjadinya keadaan kahar, kontrak ini akan dihentikan sementara hingga keadaan kahar berakhir, kecuali PARA PIHAK sepakat untuk meneruskan pelaksanaan kontrak ini;</li>
        <li>Setelah terjadinya keadaan kahar, PARA PIHAK dapat melakukan kesepakatan yang dituangkan dalam Adendum Kontrak</li>
        <li>Apabila terjadi keadaan kahar dan menimbulkan kerugian bagi salah satu pihak, maka PIHAK PERTAMA dan PIHAK KEDUA akan melakukan negosiasi untuk menyepakati pertanggungjawaban atas beban kerugian tersebut.</li>
    </ol>
   <br />
   <div class="text-bold text-center">
      Pasal 11<br />
      Korespondensi
   </div>
   <br />
    <ol class="angka_tipe1">
        <li>
            Semua korespondensi dapat berbentuk surat, email dan/atau faksimili dengan alamat tujuan PIHAK PERTAMA dan PIHAK KEDUA sebagai berikut :<br/>
            <span class="text-bold">PIHAK PERTAMA</span>
            <table>
                <tr><td>Nama        </td><td>:</td><td> Rumah Sakit Pusat Otak Nasional Prof. Dr. dr. Mahar Mardjono Jakarta</tr>
                <tr><td>Alamat      </td><td>:</td><td>  Jl. MT. Haryono Cawang - Jakarta Timur</tr>
                <tr><td>Telepon     </td><td>:</td><td>  (021) 2937 3377</tr>
                <tr><td>Faksimili   </td><td>:</td><td>  (021) 2937 3445</tr>
                <tr><td>Website     </td><td>:</td><td>  www.rspon.co.id</tr>
                <tr><td>Email       </td><td>:</td><td> rspon.stafppk@gmail.com</tr>
                <tr><td>Wakil Sah   </td><td>:</td><td> Pejabat Pembuat Komitmen (PPK) Belanja Operasional</tr>
            </table>
           <br />
           <span class="text-bold">PIHAK KEDUA</span>
           <table>
               <tr><td>Nama</td><td>:<td>{{ $data->distributor->name }}</td></tr>
               <tr><td>Alamat</td><td>:</td><td>{{ $data->distributor->alamat }}</td></tr>
               <tr><td>Telepon</td><td>:<td>{{ $data->distributor->telepon }}</td></tr>
               <tr><td>Faksimili</td><td>:<td>{{ $data->distributor->faksimile }}</td></tr>
               <tr><td>Website</td><td>:<td>{{ $data->distributor->website }}</td></tr>
               <tr><td>Email</td><td>:<td>{{ $data->distributor->email }}</td></tr>
               <tr><td>Wakil Sah</td><td>:<td>{{ $data->distributor->wakil_sah }}</td></tr>
            </table>
           <br />
        </li>
        <li>
        semua pemberitahuan, permohonan dan persetujuan berdasarkan kontrak ini harus dibuat secara tertulis dalam Bahasa Indonesia dan dianggap telah diberitahukan jika telah disampaikan secara langsung kepada wakil sah PIHAK PERTAMA dan PIHAK KEDUA sebagaimana tercantum dalam angka 1 diatas atau jika disampaikan melalui surat tercatat, e-mail, dan/atau faksimili ditujukan pada alamat sesuai angka 1
        </li>
    </ol>
    <br>
    <div class="text-bold text-center">
        Pasal 12<br>
        Penyelesaian Perselisihan
    </div>
    <br>
    <br />
    <ol class="angka_tipe1">
       <li>PARA PIHAK berkewajiban untuk berupaya sungguh-sungguh menyelesaikan secara damai semua perselisihan yang timbul dari atau berhubungan dengan Kontrak ini atau interprestasinya selama atau setelah pelaksanaan pekerjaan ini.</li>
       <li>Penyelesaian perselisihan atau sengketa antara PARA PIHAK dalam kontrak dilakukan melalui musyawarah.</li>
       <li>Jika dalam waktu 30 (tiga puluh) hari kalender tidak didapat penyelesaian secara musyawarah untuk mufakat, maka PARA PIHAK sepakat untuk menyelesaian perselisihan melalui Panitera Pengadilan Negeri wilayah Jakarta Timur.</li>
    </ol>
   <br />
   DENGAN DEMIKIAN, PIHAK PERTAMA dan PIHAK KEDUA telah bersepakat untuk menandatangani kontrak ini pada tanggal tersebut di atas dan melaksanakan Kontrak sesuai dengan ketentuan peraturan perundang-undangan di Republik Indonesia.
</div>
<br>
<br>
<br>
<table style="width:100%;">
    <tr>
        <td class="text-center" style="width: 40%">
            Untuk dan atas nama<br>
            Rumah Sakit Pusat Otak Nasional<br>
            Prof. Dr. dr. Mahar Mardjono Jakarta<br>
            PIHAK PERTAMA<br>
            <br>
            <br>
            <br>
            <span class="text-bold">{{ !empty($data->kontrak_payung_approval_user->name) ? $data->kontrak_payung_approval_user->name : '' }}</span><br>
            Pejabat Pembuat Komitmen (PPK)<br>

        </td>
        <td class="text-center" style="width: 20%">

        </td>
        <td class="text-center" style="width: 40%">
            Untuk dan atas nama<br>
            PT. Kalbe Farma<br>
            PIHAK KEDUA<br>
            <br>
            <br>
            <br>
            <br>
            <span class="text-bold">{{ !empty($data->distributor) ? $data->distributor->nama_penanggung_jawab : '' }}</span><br>
            {{ !empty($data->distributor) ? $data->distributor->jabatan_penanggung_jawab : '' }}<br>

        </td>
    </tr>
</table>

<div style="page-break-after: always;"></div>

Lampiran Kontrak Payung<br>
<table>
<tr><td>Nomor</td><td>:</td><td style="width: 300px;">{{ $data->nomor }}</td></tr>
<tr><td>Tanggal</td><td>:</td><td>{{ dateIndo($data->tanggal) }}</td></tr>
</table>
<br />
<br />

<div class="text-center">
DAFTAR HARGA SATUAN<br>
OBAT PRODUK {{ !empty($data->distributor) ? $data->distributor->name : '' }}
</div>

<br />
<br />

<table class="table daftar-obat" style="width: 100%">
    <tr>
        <th class="text-center" style="width: 5%;">
            No
        </th>
        <th class="text-center" style="width: 10%;">
            Nama Obat
        </th>
        <th class="text-center" style="width: 10%;">
            Kuantitas
        </th>
        <th class="text-center" style="width: 6%;">
            Satuan
        </th>
        <th class="text-center" style="width: 10%;">
            HNA
        </th>
        <th class="text-center" style="width: 10%;">
            Diskon
        </th>
        <th class="text-center" style="width: 10%;">
            HNA + Diskon
        </th>
        <th class="text-center" style="width: 10%;">
            HNA + Diskon + PPN
        </th>
    </tr>
    @foreach ($data->kontrak_payung_item as $key => $val)
    <tr>
        <td>
            {{ $key+1 }}
        </td>
        <td class="text-right">
            {{ $val->nama_obat }}
        </td>
        <td>
            {{ $val->kuantitas }}
        </td>
        <td class="text-center">
            {{ $val->satuan }}
        </td>
        <td class="text-right">
            {{ $val->hna }}
        </td>
        <td class="text-right">
            {{ $val->diskon }}
        </td>
        <td class="text-right">
            {{ $val->hna_diskon }}
        </td>
        <td class="text-right">
            {{ $val->hna_diskon_ppn }}
        </td>
    </tr>
    @endforeach
</table>

<br><br>

<table style="width:100%;">
    <tr>
        <td class="text-center" style="width: 40%">
            Untuk dan atas nama<br>
            Rumah Sakit Pusat Otak Nasional<br>
            Prof. Dr. dr. Mahar Mardjono Jakarta<br>
            PIHAK PERTAMA<br>
            <br>
            <br>
            <br>
            <span class="text-bold">{{ !empty($data->kontrak_payung_approval_user) ? $data->kontrak_payung_approval_user->name : '' }}</span><br>
            Pejabat Pembuat Komitmen (PPK)<br>

        </td>
        <td class="text-center" style="width: 20%">

        </td>
        <td class="text-center" style="width: 40%">
            Untuk dan atas nama<br>
            PT. Kalbe Farma<br>
            PIHAK KEDUA<br>
            <br>
            <br>
            <br>
            <br>
            <span class="text-bold">{{ !empty($data->kontrak_payung_approval_user) ?  $data->distributor->nama_penanggung_jawab : '' }}</span><br>
            {{ !empty($data->distributor) ? $data->distributor->nama_penanggung_jawab : '' }}<br>

        </td>
    </tr>
</table>


<footer>
  Pihak Pertama _______________ Pihak Kedua _______________
</footer>



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
   .text-bold {
   font-weight: bold
   }
   td {
   vertical-align: top;
   }

   .daftar-obat td, .daftar-obat th {
    font-size: 8pt !important;
   }

ol.huruf_tipe1 {
  counter-reset: my-awesome-counter-1;
  list-style: none;
}
.huruf_tipe1 > li {
  counter-increment: my-awesome-counter-1;
  position: relative;
}
.huruf_tipe1 > li::before {
  content: "(" counter(my-awesome-counter-1, lower-alpha) ") ";
  position: absolute;
  line-height: var(--size);
  height: var(--size);
  top: 3px;
  width: 19px;
  left: -29;
  text-align: left;
}


ol.huruf_tipe2 {
  counter-reset: my-awesome-counter-2;
  list-style: none;
}
.huruf_tipe2 > li {
  counter-increment: my-awesome-counter-2;
  position: relative;
}
.huruf_tipe2 > li::before {
  content: counter(my-awesome-counter-2, lower-alpha) ". ";
  position: absolute;
  line-height: var(--size);
  height: var(--size);
  top: 3px;
  width: 19px;
  left: -29;
  text-align: left;
}

ol.huruf_tipe3 {
  counter-reset: my-awesome-counter-3;
  list-style: none;
}
.huruf_tipe3 > li {
  counter-increment: my-awesome-counter-3;
  position: relative;
}
.huruf_tipe3 > li::before {
  content: counter(my-awesome-counter-3, lower-alpha);
  position: absolute;
  line-height: var(--size);
  height: var(--size);
  top: 3px;
  width: 19px;
  left: -29;
  text-align: left;
}

ol.angka_tipe1 {
  counter-reset: my-awesome-counter-4;
  list-style: none;
}
.angka_tipe1 > li {
  counter-increment: my-awesome-counter-4;
  position: relative;
}
.angka_tipe1 > li::before {
  content: counter(my-awesome-counter-4) '. ';
  position: absolute;
  line-height: var(--size);
  height: var(--size);
  top: 3px;
  width: 19px;
  left: -29;
  text-align: left;
}


ol.angka_tipe2 {
  counter-reset: my-awesome-counter-5;
  list-style: none;
}
.angka_tipe2 > li {
  counter-increment: my-awesome-counter-5;
  position: relative;
}
.angka_tipe2 > li::before {
  content: counter(my-awesome-counter-5) ")";
  position: absolute;
  line-height: var(--size);
  height: var(--size);
  top: 3px;
  width: 19px;
  left: -29;
  text-align: left;
}




footer { position: fixed; bottom: 0px; }
</style>

