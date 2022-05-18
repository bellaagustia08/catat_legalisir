<?php

namespace App\Controllers;

use App\Models\KelolaModel;
use App\Models\BerkasModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kelola extends BaseController
{
    protected $kelola;

    public function __construct()
    {
        $this->kelola = new KelolaModel();
        $this->berkas = new BerkasModel();
    }

    public function index()
    {
        $data['kelola'] = $this->kelola->findAll();
        //$data['gambar'] = $this->gambar->getAllData();

        return view('kelola/index', $data);
    }

    public function halamanAdd()
    {
        helper('form');
        return view('kelola/add');
    }

    public function processAdd()
    {
        if (!$this->validate([
            'tanggal_legalisir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'nama_pegawai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'file_upload' => [
                'rules' => 'uploaded[file_upload]|mime_in[file_upload,application/pdf]|max_size[file_upload,3000]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 3 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        date_default_timezone_set('Asia/Jakarta');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $tanggal_legalisir = $this->request->getPost('tanggal_legalisir');
        $nama_pegawai = $this->request->getPost('nama_pegawai');
        $keterangan = $this->request->getPost('keterangan');
        $files = $this->request->getFiles();

        $data = [
            'tanggal_legalisir' => $tanggal_legalisir,
            'nama_pegawai' => $nama_pegawai,
            'keterangan' => $keterangan,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];

        //input ke tabel kelola
        $this->kelola->insertKelola($data);
        //untuk dapetin data id nya 
        $id_kelola = $this->kelola->insertID();
        $nama_berkas = $this->request->getPost('nama_berkas');

        if ($files) {

            foreach ($files['file_upload'] as $pdf) {
                $data_berkas = [
                    'id_kelola' => $id_kelola,
                    'nama_berkas' => $nama_berkas,
                    'berkas' => $pdf->getName()
                ];

                //input ke tabel berkas
                $this->berkas->insertBerkas($data_berkas);
                // upload dengan name
                $pdf->move(ROOTPATH . 'public/berkas', $pdf->getName());
            }

            session()->setFlashdata('success', 'Data Berhasil ditambah');
        }

        return redirect()->to('/kelola');
    }

    public function halamanEdit($id)
    {
        helper('form');
        $data['kelola'] = $this->kelola->where('id', $id)->first();
        return view('kelola/edit', $data);
    }

    public function processEdit($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        $this->kelola->update($id, [
            "tanggal_legalisir" => $this->request->getPost('tanggal_legalisir'),
            "nama_pegawai" => $this->request->getPost('nama_pegawai'),
            "keterangan" => $this->request->getPost('keterangan'),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        session()->setFlashdata('success', 'Data Berhasil diedit');

        return redirect()->to('/kelola');
    }

    public function fungsiDelete($id)
    {
        $this->kelola->delete($id);
        session()->setFlashdata('success', 'Data Berhasil dihapus');

        return redirect()->to('/kelola');
    }

    public function halamanBerkas($id)
    {
        $data['kelola'] = $this->kelola->where('id', $id)->first();
        $data['berkas'] = $this->berkas->where('id_kelola', $id)->findAll();

        return view('berkas/indexBerkas', $data);
    }


    ////////////////////////////////////////////////////////////////////////////////
    //////////////////////////// BAGIAN BERKAS /////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////

    public function halamanAddBerkas($id)
    {
        helper('form');
        $data['kelola'] = $this->kelola->where('id', $id)->first();
        return view('berkas/addBerkas', $data);
    }

    public function processAddBerkas($id)
    {
        if (!$this->validate([
            'file_upload' => [
                'rules' => 'uploaded[file_upload]|mime_in[file_upload,application/pdf]|max_size[file_upload,3000]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Berkas Harus Berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 3 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $files = $this->request->getFiles();

        date_default_timezone_set('Asia/Jakarta');

        $this->kelola->update($id, [
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        $id_kelola = $id;
        $nama_berkas = $this->request->getPost('nama_berkas');

        if ($files) {

            foreach ($files['file_upload'] as $pdf) {
                $data_berkas = [
                    'id_kelola' => $id_kelola,
                    'nama_berkas' => $nama_berkas,
                    'berkas' => $pdf->getName()
                ];

                //input ke tabel berkas
                $this->berkas->insertBerkas($data_berkas);
                // upload dengan name
                $pdf->move(ROOTPATH . 'public/berkas', $pdf->getName());
            }

            session()->setFlashdata('success', 'Berkas Berhasil diupload');
        }

        return redirect()->to('kelola/halamanBerkas/' . $id . '');
    }

    public function halamanEditBerkas($id, $id_berkas)
    {
        helper('form');
        $data['kelola'] = $this->kelola->where('id', $id)->first();
        $data['berkas'] = $this->berkas->where('id_berkas', $id_berkas)->first();

        return view('berkas/editBerkas', $data);
    }

    public function processEditBerkas($id, $id_berkas)
    {
        if (!$this->validate([
            'file_upload' => [
                'rules' => 'uploaded[file_upload]|mime_in[file_upload,application/pdf]|max_size[file_upload,3000]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 3 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        //update updated_at
        date_default_timezone_set('Asia/Jakarta');

        $this->kelola->update($id, [
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        $nama_berkas = $this->request->getPost('nama_berkas');

        //untuk hapus berkas sebelumnya
        $old = $this->request->getPost('berkaslama');
        $path = ROOTPATH . 'public/berkas/' . $old;
        unlink($path);

        //proses update berkas baru
        $files = $this->request->getFiles();
        if ($files) {
            foreach ($files['file_upload'] as $pdf) {

                $this->berkas->update($id_berkas, [
                    'nama_berkas' => $nama_berkas,
                    'berkas' => $pdf->getName()
                ]);

                // upload dengan name
                $pdf->move(ROOTPATH . 'public/berkas', $pdf->getName());
            }

            session()->setFlashdata('success', 'Berkas Berhasil diedit');
        }



        return redirect()->to('kelola/halamanBerkas/' . $id . '',);
    }

    public function fungsiDeleteBerkas($id, $id_berkas)
    {
        //untuk hapus berkas sebelumnya
        $old = $this->berkas->where('id_berkas', $id_berkas)->first();
        $path = ROOTPATH . 'public/berkas/' . $old->berkas;
        unlink($path);

        $this->berkas->delete($id_berkas);
        session()->setFlashdata('success', 'Berkas Berhasil dihapus');

        return redirect()->to('kelola/halamanBerkas/' . $id . '',);
    }

    //////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// export ////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function export_excel()
    {
        $data['kelola'] = $this->kelola->findAll();
        $data['berkas'] = $this->berkas->findAll();

        echo view('kelola/export_excel', $data);
    }

    public function export_pdf()
    {
        $data['kelola'] = $this->kelola->findAll();
        $data['berkas'] = $this->berkas->findAll();

        echo view('kelola/export_pdf', $data);
    }
}
