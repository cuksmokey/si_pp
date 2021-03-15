<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              <ol class="breadcrumb">
                <li class="">Etalase Barang</li>
              </ol>
            </h2>
          </div>

          <div class="body">
            <div class="box-data">
              <table id="datatable11" class="table table-bordered table-striped table-hover dataTable ">
                <thead>
                  <tr>
                    <th style="width:6%;">No</th>
                    <th style="width:18%;">Kode Barang</th>
                    <th style="width:20%;">Nama Barang</th>
                    <th style="width:20%;">Merek</th>
                    <th style="width:20%;">Spesifikasi</th>
                    <th style="width:8%;">Qty</th>
                    <th style="width:8%;">Satuan</th>
                    <!-- <th>Harga</th> -->
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>
  status = '';
  opsi = '';

  $(document).ready(function() {
    load_data();
  });

  function reloadTable() {
    table = $('#datatable11').DataTable();
    tabel.ajax.reload(null, false);
  }

  function load_data() {
    var table = $('#datatable11').DataTable();

    table.destroy();

    tabel = $('#datatable11').DataTable({ //

      "processing": true,
      "pageLength": true,
      "paging": true,
      "ajax": {
        "url": '<?php echo base_url(); ?>Master/load_data',
        "data": ({
          jenis: "Load_Barang",
          opsi: "Etalase"
        }),
        "type": "POST"
      },
      responsive: true,
      "pageLength": 10,
      "language": {
        "emptyTable": "Tidak ada data.."
      },
      "order": [
        [0, "asc"]
      ]
    });
  }

</script>