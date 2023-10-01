<?= $this->extend('templates/layout') ;?>

<?= $this->section('content');?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Jadwal Pelajaran</h5>
                <span>Pilih nama pelajaran dan kelas yang diampu, selanjutnya pilih nilai harian, MID dan semester!</span>
                <div class="card-header-right mx-2">
                    <div class="form-group has-search">
                        <span class="feather icon-search form-control-feedback"></span>
                        <input id="global_filter" placeholder="Cari data.." class="form-control list-unstyled card-option global_filter" type="text">
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table id="tbl-jadwal" class="table table-framed table-hover" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th width="20px">#</th>
                                <th width="26px">No</th>
                                <th width="600px">Nama Mata Pelajaran</th>
                                <th width="200px">Kelas</th>
                                <th>id_kelas</th>
                                <th width="200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection();?>
<?= $this->section('scripts');?>

<script type="text/javascript">
    var table;

  $(document).ready(function() {

    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    });

    table = $('#tbl-jadwal').DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        bDestroy: true,
        olReorder: true,
        order:[],
        dom: 'tip',
        ordering:true,
        searching: true,
        ajax: '<?= base_url('admin/nilai/r_jadwal/'.$kategory.'.html');?>',
        pageLength: 20,
        language: {
            'search': "Filter Data",
            'loadingRecords': 'Sedang memuat data, mohon tunggu sebentar...',
            'processing': 'Sedang memuat data, mohon tunggu sebentar...'
        },
        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            table.cell( nRow, 1 ).data(iDisplayIndex+1);
        },
        columnDefs :[
        {
            'targets': [0],
            "orderable":false,
            'searchable': false,
            'className': 'text-center align-middle',
            'checkboxes':
            {
                'selectRow': false
            }
        },
        {
            "targets": 1,
            'className': 'text-center align-middle',
            "orderable":true,
        },
        {
            "targets": 2,
            'className': 'align-middle',
            "orderable":true,
            'searchable': true,
        },
        {
            "targets": 3,
            'className': 'text-center align-middle',
            "orderable":true,
            'searchable': true,
        },
        {
            "targets": 4,
            "visible" : false,
        },
        {
            "targets": -1,
            'className': 'text-center align-middle',
            "orderable":false,
            'searchable': false,
        },

      ],
      select:
      {
        'style': 'multi',
        'selector': 'td:first-child'
      },
      order: [[1, 'DESC']]

    });
});

function filterGlobal () {
    $('#tbl-jadwal').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}

</script>


<?= $this->endSection();?>