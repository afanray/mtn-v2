@extends('layouts/dashboard')
@section('title','Ringkasan Talenta')
@section('body')
  <div class="card ">
    <div class="card-header card-header-stretch">
      <h3 class="card-title">Ringkasan Jumlah Talenta</h3>
      <div class="card-toolbar">
        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
          <li class="nav-item">
            <a class="nav-link fw-bolder text-active-dark active" data-bs-toggle="tab" href="#kt_tab_pane_7">Riset dan Inovasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bolder text-active-dark" data-bs-toggle="tab" href="#kt_tab_pane_8">Seni dan Budaya</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bolder text-active-dark" data-bs-toggle="tab" href="#kt_tab_pane_9">Olah Raga</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="card-body">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
          <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 p-0">
              <!--begin::Card title-->
              <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                  <h3 class="card-title">Riset dan Inovasi</h3>
                  <!--begin::Search-->
                  <div class="d-flex align-items-center position-relative my-1">
                  </div>
                  <!--end::Search-->
                </div>
              </div>
              <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-0">
              <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50 wow fadeInUp delay-0-2s" style="visibility: visible; animation-name: fadeInUp;">
                <li class="nav-item">
                  <a class="nav-link active text-riset border-riset get-talenta" data-id="1" data-toggle="tab" href="#watching">
                    <i class="fa fa-users me-5 text-riset"></i>
                    <div class="content me-5">
                      <h3>Pra Bibit Talenta</h3>
                    </div>
                    <p class="me-5"><strong>Kriteria:</strong> Peserta didik yang memiliki capaian prestasi di bidang riset dan inovasi</p>
                    <span class="fw-bolder h1">{{ $ringkasan->riset_pra_bibit }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-riset border-riset get-talenta" data-id="2" data-toggle="tab" href="#sharing">
                    <i class="fa fa-book-open me-5 text-riset"></i>
                    <div class="content me-5">
                      <h3>Bibit Talenta</h3>
                    </div>
                    <p class="me-5"><strong>Kriteria:</strong> Lulusan S1 hingga S2. Publikasi artikel ilmiah di media. Publikasi di peer-reviewed jurnal</p>
                    <span class="fw-bolder h1">{{ $ringkasan->riset_bibit }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-riset border-riset get-talenta" data-id="3" data-toggle="tab" href="#editing">
                    <i class="fa fa-chalkboard-user me-5 text-riset"></i>
                    <div class="content me-5">
                      <h3>Talenta Potensial</h3>
                    </div>
                    <p class="me-5"><strong>Kriteria:</strong> Lulusan S3. Publikasi di peer-reviewed jurnal. Pengalaman menjadi anggota kelompok riset. Penerima hibah penelitian Nasional maupun Internasional</p>
                    <span class="fw-bolder h1">{{ $ringkasan->riset_potensial }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-riset border-riset get-talenta" data-id="4" data-toggle="tab" href="#comments">
                    <i class="fa fa-building me-5 text-riset"></i>
                    <div class="content me-5">
                      <h3>Talenta Unggul</h3>
                    </div>
                    <p class="me-5"><strong>Kriteria:</strong> Lulusan S3 dan telah menjalani postdoctoral.
                      Publikasi di peer-reviewed jurnal dan menjadi lead author. Memiliki H-index tinggi. Pengalaman memimpin kelompok riset/R&D/Lab.
                      Penerima hibah penelitian Nasional maupun Internasional. Memiliki paten. Perilaku ilmiah, konsistensi, outcomes (penilaian kualitatif, misalnya melalui wawancara)
                    </p>
                    <span class="fw-bolder h1">{{ $ringkasan->riset_unggul }}</span>
                  </a>
                </li>
              </ul>
            </div>
            <!--end::Card body-->
          </div>
        </div>

        <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
          <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 p-0">
              <!--begin::Card title-->
              <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                  <h3 class="card-title">Seni dan Budaya</h3>
                  <!--begin::Search-->
                  <div class="d-flex align-items-center position-relative my-1">
                  </div>
                  <!--end::Search-->
                </div>
              </div>
              <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-0">
              <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50" style="">
                <li class="nav-item">
                  <a class="nav-link active text-seni border-seni get-talenta" data-id="5" data-toggle="tab" href="#watching">
                    <i class="fa fa-users text-seni me-5"></i>
                    <div class="content me-5">
                      <h3>Pra Bibit</h3>
                    </div>
                    <p class="me-5">
                      <strong>Usia: </strong><span>< 18 tahun</span><br />
                      <strong>Jenjang Pendidikan: </strong><span>PAUD s.d SMA</span><br />
                      <strong>Praktik Arstistik: </strong><span>< 3 tahun</span><br />
                      <strong>Rekognisi: </strong><span>N/A</span><br />
                    </p>
                    <span class="fw-bolder h1">{{ $ringkasan->seni_pra_bibit }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-seni border-seni get-talenta" data-id="6" data-toggle="tab" href="#sharing">
                    <i class="fa fa-book-open text-seni me-5"></i>
                    <div class="content me-5">
                      <h3>Bibit</h3>
                    </div>
                    <p class="me-5">
                      <strong>Usia: </strong><span>18 s.d 26 tahun</span><br />
                      <strong>Jenjang Pendidikan: </strong><span>Lulus SMA s.d S1 +4 tahun</span><br />
                      <strong>Praktik Arstistik: </strong><span>3 s.d 10 tahun</span><br />
                      <strong>Rekognisi: </strong><span>Lokal</span><br />
                    </p>
                    <span class="fw-bolder h1">{{ $ringkasan->seni_bibit }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-seni border-seni get-talenta" data-id="7" data-toggle="tab" href="#editing">
                    <i class="fa fa-chalkboard-user text-seni me-5"></i>
                    <div class="content me-5">
                      <h3>Potensial</h3>
                    </div>
                    <p class="me-5">
                      <strong>Usia: </strong><span>27 s.d 50 Tahun</span><br />
                      <strong>Jenjang Pendidikan: </strong><span>5 tahun setelah S1</span><br />
                      <strong>Praktik Arstistik: </strong><span>10 s.d 25 tahun berkarya</span><br />
                      <strong>Rekognisi: </strong><span>Nasional, regional, internasional</span><br />
                    </p>
                    <span class="fw-bolder h1">{{ $ringkasan->seni_potensial }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-seni border-seni get-talenta" data-id="8" data-toggle="tab" href="#comments">
                    <i class="fa fa-building text-seni me-5"></i>
                    <div class="content me-5">
                      <h3>Unggul</h3>
                    </div>
                    <p class="me-5">
                      <strong>Usia: </strong><span>> 50 tahun</span><br />
                      <strong>Jenjang Pendidikan: </strong><span>N/A</span><br />
                      <strong>Praktik Arstistik: </strong><span>> 25 tahun</span><br />
                      <strong>Rekognisi: </strong><span>Nasional, regional, internasional</span><br />
                    </p>
                    <span class="fw-bolder h1">{{ $ringkasan->seni_unggul }}</span>
                  </a>
                </li>
              </ul>
            </div>
            <!--end::Card body-->
          </div>
        </div>

        <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
          <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 p-0">
              <!--begin::Card title-->
              <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                  <h3 class="card-title">Olahraga</h3>
                  <!--begin::Search-->
                  <div class="d-flex align-items-center position-relative my-1">
                  </div>
                  <!--end::Search-->
                </div>
              </div>
              <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-0">
              <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50" style="">
                <li class="nav-item">
                  <a class="nav-link active text-or border-or get-talenta" data-id="9" data-toggle="tab" href="#watching">
                    <i class="fa fa-book-open text-or me-5"></i>
                    <div class="content me-5">
                      <h3>Bibit</h3>
                    </div>
                    <div class="content-p me-5">
                      <div>
                        <strong>Usia: </strong><span>6-9 tahun</span><br />
                        <strong>Tahapan Pembinaan: </strong><span>Fundamental (Pembinaan Dasar)</span><br />
                        <strong>Wadah Pembinaan: </strong><span>Klub dan Sekolah</span><br />
                        <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional</span><br />
                      </div>
                      <div>
                        <strong>Usia: </strong><span>9-12 tahun</span><br />
                        <strong>Tahapan Pembinaan: </strong><span>Belajar untuk Berlatih</span><br />
                        <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga dan Klub IOCO (Sentra Latihan Daerah)</span><br />
                        <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional</span><br />
                      </div>
                    </div>
                    <span class="fw-bolder h1">{{ $ringkasan->or_bibit }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-or border-or get-talenta" data-id="10" data-toggle="tab" href="#sharing">
                    <i class="fa fa-chalkboard-user text-or me-5"></i>
                    <div class="content me-5">
                      <h3>Potensial</h3>
                    </div>
                    <div class="content-p me-5">
                      <div>
                        <strong>Usia: </strong><span>12-15 tahun</span><br />
                        <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Latihan</span><br />
                        <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga, Klub IOCO, PPLPD (Sentra Latihan Daerah) SLOMPN (Sentra Latihan Nasional)</span><br />
                        <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional (Sentra Latihan Daerah); Nasional, Regional, Internasional (Sentra Latihan Nasional)</span><br />
                      </div>
                      <div>
                        <strong>Usia: </strong><span>15- 18 tahun</span><br />
                        <strong>Tahapan Pembinaan: </strong><span>Belajar untuk Berkompetisi; serta, Berlatih untuk Berkompetisi</span><br />
                        <strong>Wadah Pembinaan: </strong><span>Kelas Olahraga, Klub IOCO, SKO (Sentra Latihan SLOMPN (Sentra Latihan Nasional) Nasional)</span><br />
                        <strong>Jaringan Kompetisi: </strong><span>Daerah, Nasional (Sentra Latihan Daerah); Nasional, Regional, Internasional (Sentra Latihan Nasional)</span><br />
                      </div>
                    </div>
                    <span class="fw-bolder h1">{{ $ringkasan->or_potensial }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active text-or border-or get-talenta" data-id="11" data-toggle="tab" href="#editing">
                    <i class="fa fa-building text-or me-5"></i>
                    <div class="content me-5">
                      <h3>Unggul</h3>
                    </div>
                    <div class="content-p me-5">
                      <div>
                        <strong>Usia: </strong><span>18- 23 tahun</span><br />
                        <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Berkompetisi; serta, Belajar untuk Juara</span><br />
                        <strong>Wadah Pembinaan: </strong><span>PELATNAS Elit Junior</span><br />
                        <strong>Jaringan Kompetisi: </strong><span>Nasional, Regional, Internasional </span><br />
                      </div>
                      <div>
                        <strong>Usia: </strong><span>23-33 tahun</span><br />
                        <strong>Tahapan Pembinaan: </strong><span>Berlatih untuk Juara</span><br />
                        <strong>Wadah Pembinaan: </strong><span>PELATNAS Elit Senior</span><br />
                        <strong>Jaringan Kompetisi: </strong><span>Regional, Internasional</span><br />
                      </div>
                    </div>
                    <span class="fw-bolder h1">{{ $ringkasan->or_unggul }}</span>
                  </a>
                </li>
              </ul>
            </div>
            <!--end::Card body-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-list" tabindex="-1" aria-labelledby="modal-list" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="list-label"><i class="fa fa-eye me-2"></i><span class="text-dark">Daftar Talenta</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex justify-content-center">
          <table class="table align-middle table-row-dashed fs-6 gy-5 w-100" id="kt_user_table" style="width: 100%">
            <thead>
            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
              <th class="min-w-20px">ID</th>
              <th class="min-w-125px">Foto</th>
              <th class="min-w-125px">Nama Talenta</th>
              <th class="min-w-125px">Lembaga</th>
              <th class="min-w-125px">Bidang</th>
            </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('css')
    <style>
      h3{
        color: #5b5675;
        font-size: 24px;
      }
      .h1{
        font-size: 2.5rem;
        color: unset;
      }
      .solutions-tab-nav {
        height: 100%;
      }

      .solutions-tab-nav .nav-item {
        margin-bottom: 20px;
      }

      .solutions-tab-nav .nav-link {
        display: flex;
        height: 100%;
        text-align: left;
        padding: 25px 35px;
        border-radius: 7px;
        align-items: center;
        border: 1px solid #FFFFFF;
      }

      .solutions-tab-nav .nav-link > i {
        margin-right: 20px;
        font-size: 60px;
        flex: none;
      }

      .solutions-tab-nav .nav-link h3 {
        letter-spacing: -0.5px;
      }

      .solutions-tab-nav .nav-link p {
        margin-bottom: 0;
      }

      .solutions-tab-nav .nav-link:hover,
      .solutions-tab-nav .nav-link.active {
        border-color: var(--primary-color);
        color: var(--primary-color);
        background: transparent;
      }
      .solutions-tab-nav .nav-item .nav-link{
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .solutions-tab-nav .nav-item .nav-link .content{
        width: 200px;
      }
      .solutions-tab-nav .nav-item .nav-link p,
      .solutions-tab-nav .nav-item .nav-link .content-p
      {
        width: 60%;
        color: #5b5675;
      }
      .solutions-tab-nav .nav-item .nav-link .content-p{
        display: flex;
        gap: 1.5rem;
      }
      .solutions-tab-nav .nav-item .nav-link .content-p div{
        width: 50%;
      }
      .text-riset{
        color: #256FB2!important;
      }
      .border-riset{
        border-color: #256FB2!important;
      }
      .text-seni{
        color: #F3572C!important;
      }
      .border-seni{
        border-color: #F3572C!important;
      }
      .text-or{
        color: #1CA6B5!important;
      }
      .border-or{
        border-color: #1CA6B5!important;
      }
      #kt_user_table_wrapper{
        width: 100%!important;
      }
    </style>
@endsection
@section('js')
  <script type="text/javascript">
    const blockUI = new KTBlockUI(document.getElementById('modal-list'), {
      message: 'mengambil data...',
    })
    var table = $('#kt_user_table').DataTable({
      "columns": [
        {
          data: 'id',
          title: 'No',
        },
        {
          data: 'foto_talenta',
          title: 'Foto',
          render: function (data, type, row) {
            return data !== null ? `<img src="/storage/talenta/${data}" style="width: 75px;height:75px; object-fit: cover;"/>` : '-'
          }
        },
        {
          data: 'nama_talenta',
          title: 'Nama Talenta',
        },
        {
          data: 'lembaga_id',
          title: 'Lembaga',
          render: function (data, type, row) {
            return `${row.lembaga_induk.name} - ${row.lembaga_unit.name} - ${row.lembaga.name}`
          }
        },
        {
          data: 'bidang.name',
          title: 'Bidang',
        },

      ],
    });
    $('.get-talenta').on('click', function(){
      const id = $(this).data('id')
      console.log('anjing')
      $('#modal-list').on('show.bs.modal',function (){
        table.clear();
        table.draw();
        // blockUI.block()
      }).modal('show');
      $.ajax({
        url:'/common/get-talenta',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        dataType:'json',
        data:{catId: id},
        success: function(res){
          $('#modal-list').find('.modal-title span').text(`Daftar Talenta ${res.level.bidang.name} - ${res.level.name}`);
          table.clear();
          table.rows.add(res.data);
          table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
            } );
          } ).draw();
          // blockUI.release()
        },
        error:function (xhr,res) {
          // blockUI.release()
        }
      })
    })
  </script>
@endsection
