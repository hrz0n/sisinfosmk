<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use \App\Models\NilaiModel;

class Nilai extends BaseController
{
    public function index($kategory)
    {
        $data = [
            'page_title' => 'Daftar Jadwal - Entri Nilai '. $kategory,
            'page_desc' => 'Daftar Jadwal - Entri Nilai '. $kategory,
            'page_key' => 'Daftar Jadwal - Entri Nilai '. $kategory,
            'kategory' => $kategory
        ];
        if ($kategory == 'harian' || $kategory == 'mid' || $kategory == 'semester' || $kategory == 'cp') {
            return view('admin/nilai/v_nilai_jadwal', $data);
        } else {
            
        }
    }

    public function getJadwalAjax($kategory)
    {
        helper(['config_helper']);

        if (session()->get('tipe') == 1 && session()->get('id_guru') > 0) {
            $db = db_connect();
            $builder = $db->table('tbl_jadwal')->select('tbl_jadwal.id, tbl_pelajaran.kode, tbl_pelajaran.nama_pelajaran,tbl_kelas.nama_kelas, tbl_kelas.id AS idkelas')
                    ->join('tbl_pelajaran', 'tbl_pelajaran.kode = tbl_jadwal.kode_pelajaran')
                    ->join('tbl_kelas', 'tbl_kelas.id = tbl_jadwal.id_kelas')
                    ->where('tbl_jadwal.id_guru',session()->get('id_guru'))
                    ->where('tbl_jadwal.semester', get_config_db('APP_SMT'))
                    ->where('tbl_jadwal.thn_pelajaran', get_config_db('APP_THN_PELAJARAN'))
                    ->groupBy(['tbl_jadwal.kode_pelajaran','tbl_jadwal.id_kelas']);

            if ($kategory == 'harian') {
                return DataTable::of($builder)->add(null, function($row){
                    return '<a href="'.base_url('admin/nilai/harian/entri/1/'.$row->idkelas.'/'.$row->kode).'" class="btn btn-primary"><i class="feather icon-log-out"></i> Entri Nilai</a>';
                })->toJson();
            } elseif($kategory == 'mid') {
                return DataTable::of($builder)->add(null, function($row){
                    return '<a href="'.base_url('admin/nilai/mid/entri/2/'.$row->idkelas.'/'.$row->kode).'" class="btn btn-primary"><i class="feather icon-log-out"></i> Entri Nilai</a>';
                })->toJson();
            } elseif($kategory == 'semester') {
                return DataTable::of($builder)->add(null, function($row){
                    return '<a href="'.base_url('admin/nilai/semester/entri/3/'.$row->idkelas.'/'.$row->kode).'" class="btn btn-primary"><i class="feather icon-log-out"></i> Entri Nilai</a>';
                })->toJson();
            } else {
                return DataTable::of($builder)->add(null, function($row){
                    return '<a href="'.base_url('admin/nilai/cp/entri/4/'.$row->idkelas.'/'.$row->kode).'" class="btn btn-primary"><i class="feather icon-log-out"></i> Entri Nilai</a>';
                })->toJson();
            }           

        }
    }

    public function entriNilai($tipe, $id_kelas, $kode_pelajaran) {
        helper(['config_helper']);
        $str_kelas = "-";
        $str_mapel = "-";
        $dataMaster = [];
        $db = db_connect();
        $dataSiswa = $db->table('tbl_siswa')->select('
            tbl_siswa.id AS idsiswa, tbl_biodata.id AS idbiodata, tbl_biodata.nama AS namasiswa,tbl_biodata.nis, tbl_kelas.id as idkelas, tbl_kelas.nama_kelas
        ')
                ->join('tbl_biodata', 'tbl_biodata.id = tbl_siswa.id_biodata')
                ->join('tbl_kelas', 'tbl_kelas.id = tbl_siswa.id_kelas')
                ->where('tbl_biodata.status',"AKTIF")
                ->where('tbl_siswa.id_kelas', $id_kelas)
                ->where('tbl_siswa.semester', get_config_db('APP_SMT'))
                ->where('tbl_siswa.thn_pelajaran', get_config_db('APP_THN_PELAJARAN'))
                ->orderBy('tbl_biodata.nama','ASC')
                ->get()
                ->getResult();

        foreach ($dataSiswa as $row) {
            $nilai = 0;
            $id_nilai = NULL;
            $status = 'ADD';
            $cek_nilai = $this->isAdaNilai($row->idsiswa, $tipe, $id_kelas, $kode_pelajaran);
            if ($cek_nilai['nilai'] != NULL) {
                $nilai = $cek_nilai['nilai'];
                $status = 'UPDT';
                $id_nilai = $cek_nilai['id_nilai'];
            }
            $dataMaster[$row->idbiodata] = [
                'idsiswa' => $row->idsiswa,
                'nama' => $row->namasiswa,
                'nis' => $row->nis,
                'id_kelas' => $row->idkelas,
                'kelas' => $row->nama_kelas,
                'nilai' => $nilai,
                'id_nilai' => $id_nilai,
                'status' => $status
            ];
            $str_kelas = $row->nama_kelas;
            $str_mapel = $kode_pelajaran;
        }

        // dd($dataMaster);
        $strnilai = "";
        if ($tipe == 1) {
            $strnilai = "harian";
        } elseif ($tipe == 2) {
            $strnilai = "mid";
        } elseif ($tipe == 3) {
            $strnilai = "semester";
        }

        $output = [
            'dataMaster' => $dataMaster,
            'page_title' => 'Entri Nilai ' . $strnilai,
            'page_desc' => 'Entri Nilai ' . $strnilai,
            'page_key' => 'Entri Nilai ' . $strnilai,
            'id_kelas' => $id_kelas,
            'kelas' => $str_kelas,
            'mapel' => $str_mapel,
        ];
        return view('admin/nilai/v_nilai_'.$strnilai, $output);

    }

    public function isAdaNilai($id_siswa, $tipe, $id_kelas, $kode_pelajaran) {
        helper(['config_helper']);
        $nilai = NULL;
        $id_nilai = NULL;
        $dataModel = new NilaiModel();
        $data = $dataModel->where('tipe_nilai', $tipe)
                ->where('id_kelas', $id_kelas)
                ->where('kode_pelajaran', $kode_pelajaran)
                ->where('semester', get_config_db('APP_SMT'))
                ->where('thn_pelajaran', get_config_db('APP_THN_PELAJARAN'))
                ->where('id_siswa', $id_siswa)->first();
        if (!empty($data)) {
            $nilai = $data['nilai'];
            $id_nilai = $data['id'];
        }
        $data = [
            'id_nilai' => $id_nilai,
            'nilai' => $nilai
        ];
        return $data;
    }


    public function prosesNilai() {
        helper(['config_helper']);
        $dataarr = $this->request->getVar();
        $newArr = [];
        $tipe = 1;
        $id_kelas = 0;
        $kode_pelajaran = 'null';
        if (!empty($dataarr)) {
            for ($i=0; $i < count($dataarr['id_siswa']); $i++) { 
                $tipe = $dataarr['tipe'];
                $id_kelas = $dataarr['id_kelas'];
                $kode_pelajaran = $dataarr['kode_pelajaran'];
                $newArr[] = [
                    'id' => $dataarr['id_nilai'][$i],
                    'id_siswa' => $dataarr['id_siswa'][$i],
                    'id_kelas' => $id_kelas,
                    'tipe_nilai' => $tipe,
                    'kode_pelajaran' => $kode_pelajaran,
                    'semester' => get_config_db('APP_SMT'),
                    'thn_pelajaran' => get_config_db('APP_THN_PELAJARAN'),
                    'nilai' => $dataarr['nilai'][$i],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }
        }

        $db = db_connect();
        $builder = $db->table('tbl_nilai');
        $builder->upsert($newArr);
        return redirect()->to('admin/nilai/harian/entri/'.$tipe.'/'.$id_kelas.'/'.$kode_pelajaran)->with('pesan','Yeeeyyy .... data nilai berhasil disimpan! Siliahkan isi nilai kelas lain, <a href="'.base_url('admin/nilai/harian').'"> Klik disini</a>');

        
    }
}
