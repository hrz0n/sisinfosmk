<?= $this->extend('templates/layout') ;?>

<?= $this->section('content');?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Jendela Informasi</h5>
                <span>Informasi yang berkaitan dengan Entri Nilai akan muncul disini!</span>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-trash-2 close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <p>Guru Mata Pelajaran silahkan entri <code>nilai Harian</code>, <code>Nilai MID</code>, <code>Nilai Semester</code> dan <code>Capaian Kompetensi</code> sesuai dengan jadwal pelajaran masing-masing</p>
                <p>Guru P5, Guru BK dan Guru PJOK silahkan  entri <code>Deskripsi Kerohanian & Sikap</code>, <code>Profil Pancasila</code> dan <code>Laporan Fisik</code> sesuai dengan jadwal pelajaran masing-masing</p>
                <p>Wali Kelas silahkan  update <code>Biodata Siswa</code> dan Entri <code>Deskripsi Raport</code> sesuai dengan kelas masing-masing</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection();?>



<?= $this->section('scripts');?>

<?= $this->endSection();?>