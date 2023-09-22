<?= $this->extend('templates/layout') ;?>

<?= $this->section('content');?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Entri Nilai Harian Kelas <?= $kelas; ?></h5>
                <span>Isi semua nilai siswa pada mapel <code><?= $mapel; ?></code> dan selanjutnya simpan nilai!</span>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-trash-2 close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
            <?php if (session()->getFlashdata('pesan')):?>
                        <div class="alert bg-success text-white mt-0 mb-2 alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan') ;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php endif ;?>
                <div class="table-responsive">
                    

                    <form action="<?= base_url('admin/nilai/entri/proses');?>" method="POST">
                    <?= csrf_field() ;?>
                    <input type="hidden" name="tipe" value="<?= $tipe;?>">
                    <input type="hidden" name="id_kelas" value="<?= $id_kelas;?>">
                    <input type="hidden" name="kode_pelajaran" value="<?= $mapel;?>">
                    <table id="tbl-nilai" class="table table-framed table-hover" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th width="20px">#</th>
                                <th width="26px">No</th>
                                <th width="400px">Nama Siswa</th>
                                <th width="200px">N I S</th>
                                <th width="200px">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1 ;?>
                            <?php foreach($dataMaster as $key => $value) :?>
                                <tr>
                                    <td></td>
                                    <td><?= $nomor++ ;?></td>
                                    <td><?= $value['nama'] ;?></td>
                                    <td><?= $value['nis'] ;?></td>                                
                                    <td><input type="hidden" name="id_nilai[]" value="<?= $value['id_nilai'];?>"><input type="hidden" name="id_siswa[]" value="<?= $value['idsiswa'];?>"><input type="number" name="nilai[]" placeholder="Ex: 98" class="form-control form-control-sm" value="<?= $value['nilai'];?>"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (!empty($dataMaster)) :?>
                        <button type="submit" name="simpan_nilai" class="btn btn-danger mt-4 px-4">Simpan Nilai</button>
                    <?php endif;?>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection();?>

<?= $this->section('scripts');?>

<script type="text/javascript">
  $(document).ready(function() {
    var table;

    table = $('#tbl-nilai').DataTable({
        processing: true,
        deferRender: true,
        bDestroy: true,
        olReorder: true,
        dom: 'tip',
        ordering:false,
        searching: true,
        pageLength: 50,
        language: {
            'search': "Filter Data",
            'loadingRecords': 'Sedang memuat data, mohon tunggu sebentar...',
            'processing': 'Sedang memuat data, mohon tunggu sebentar...'
        },
        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
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
            "orderable":false,
            'searchable': false,
        },
        {
            "targets": 2,
            'className': 'align-middle',
            "orderable":true,
            'searchable': true,
        },
        {
            "targets": 3,
            'className': 'align-middle',
            "orderable":true,
            'searchable': true,
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
      order: [[1, 'ASC']]

    });
});
</script>
<?= $this->endSection();?>