<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin_company extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_company_model', 'Company');
        $this->load->model('Admin/Admin_config_model', 'Config');
        $this->role         = 'admin';
        $this->redirect     = 'admin/master/company';


        cek_login('Admin');
    }

    public function index()
    {
        $data = [
            'title'         => 'Data Lokasi PKL',
            'desc'          => 'Berfungsi untuk melihat Data Lokasi PKL',
            'allcompany'    => $this->Company->getAllData()->result()
        ];

        $page = '/admin/company/index';
        pageBackend($this->role, $page, $data);
    }

    public function create()
    {

        $this->_validation();
        if ($this->form_validation->run() === false) {
            $data = [
                'title'         => 'Tambah Lokasi PKL',
                'desc'          => 'Berfungsi untuk menambah Lokasi PKL',
            ];
            $page = '/admin/company/create';
            pageBackend($this->role, $page, $data);
        } else {
            $this->db->set('id', 'UUID()', FALSE);
            $regencyId        = htmlspecialchars($this->input->post('regency'));
            $cekProv          = $this->Config->cekProv($regencyId);
            $provId           = $cekProv->province_id;
            $dataInput = [
                'name'          => htmlspecialchars($this->input->post('name')),
                'address'       => htmlspecialchars($this->input->post('address')),
                'regency_id'    => $regencyId,
                'province_id'   => $provId,
                'email'         => htmlspecialchars($this->input->post('email')),
                'telp'          => htmlspecialchars($this->input->post('telp')),
                'pic'           => htmlspecialchars($this->input->post('pic')),
                'label'         => htmlspecialchars($this->input->post('label')),
                'status'        => 'verify',
            ];
            $insertCompany      = $this->Company->insert($dataInput);
            if ($insertCompany > 0) {
                $this->session->set_flashdata('success', 'Data berhasil di tambah');
            } else {
                $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
            }
            redirect($this->redirect);
        }
    }

    public function update($id)
    {
        $decode     = decodeEncrypt($id);
        $company    = $this->Company->getDataBy(['a.id' => $decode])->row();
        if ($company) {
            $this->_validation($company->email);
            if ($this->form_validation->run() === false) {
                $data = [
                    'title'         => 'Ubah Data Dosen',
                    'desc'          => 'Berfungsi untuk mengubah Data Dosen',
                    'company'       => $company,
                ];
                $page = '/admin/company/update';
                pageBackend($this->role, $page, $data);
            } else {
                $regencyId        = htmlspecialchars($this->input->post('regency'));
                $cekProv          = $this->Config->cekProv($regencyId);
                $provId           = $cekProv->province_id;
                $dataUpdate       = [
                    'name'          => htmlspecialchars($this->input->post('name')),
                    'address'       => htmlspecialchars($this->input->post('address')),
                    'regency_id'    => $regencyId,
                    'province_id'   => $provId,
                    'email'         => htmlspecialchars($this->input->post('email')),
                    'telp'          => htmlspecialchars($this->input->post('telp')),
                    'pic'           => htmlspecialchars($this->input->post('pic')),
                    'label'         => htmlspecialchars($this->input->post('label')),
                    'status'        => htmlspecialchars($this->input->post('status')),
                    'updated_at'    => date('Y-m-d H:i:s')
                ];
                $update         = $this->Company->update($dataUpdate, ['id' => $decode]);
                if ($update > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di ubah');
                } else {
                    $this->session->set_flashdata('error', 'Server Sedang sibuk, silahkan coba lagi');
                }
                redirect($this->redirect);
            }
        } else {
            $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
            redirect($this->redirect);
        }
    }
    public function delete($id)
    {
        $decodeId   = decodeEncrypt($id);
        $company    = $this->Company->getDataBy(['a.id' => $decodeId])->row();
        if ($company) {
            $deleteprodi    = $this->Company->delete(['id' => $decodeId]);
            if ($deleteprodi > 0) {
                $this->session->set_flashdata('success', 'Data berhasil di hapus');
            } else {
                $this->session->set_flashdata('error', 'Server sedang sibuk, silahkan coba lagi');
            }
        } else {
            $this->session->set_flashdata('error', 'Data yang anda masukan tidak ada');
        }
        redirect($this->redirect);
    }

    public function exportRegency()
    {
        $data   =   [
            'title'             => 'Data Daerah',
            'allData'           => $this->Config->getRegencyBy()->result()
        ];

        $this->load->view('admin/company/export/excel', $data);
    }

    public function export()
    {
        $data   =   [
            'title'             => 'Data Perusahaan',
            'allData'           => $this->Company->getAllData()->result()
        ];

        $this->load->view('admin/company/export/excel-company', $data);
    }

    public function import()
    {
        $data = [
            'title'         => 'Import Data Perusahaan',
            'desc'          => 'Berfungsi untuk menambah banyak Data Perusahaan',
        ];

        $page = '/admin/company/import';
        pageBackend($this->role, $page, $data);
    }

    public function importcompany()
    {
        $config = [
            'upload_path'       => './assets/uploads/',
            'allowed_types'     => 'xlsx|xls',
            'file_name'         => 'doc' . time(),
        ];
        $this->upload->initialize($config);
        if ($this->upload->do_upload('importcompany')) {
            $file   = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open('assets/uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $email      = $this->Company->getDataBy(['a.email' => $row->getCellAtIndex(6)])->num_rows();

                        if ($email < 1) {
                            $dataInputCompany = array(
                                'name'          => $row->getCellAtIndex(0),
                                'address'       => $row->getCellAtIndex(1),
                                'regency_id'    => $row->getCellAtIndex(2),
                                'province_id'   => $row->getCellAtIndex(4),
                                'email'         => $row->getCellAtIndex(6),
                                'telp'          => $row->getCellAtIndex(7),
                                'pic'           => $row->getCellAtIndex(8),
                                'label'         => $row->getCellAtIndex(9),
                                'status'        => 'verify',
                            );
                            $this->Company->importData($dataInputCompany);
                        }
                    }
                    $numRow++;
                }
                $reader->close();
                unlink(FCPATH . 'assets/uploads/' . $file['file_name']);
                $this->session->set_flashdata('success', 'Import Data Berhasil');
                redirect($this->redirect);
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        }
    }

    private function _validation($email = null)
    {
        $this->form_validation->set_rules(
            'name',
            'Nama Lengkap',
            'trim|required',
            [
                'required' => '%s wajib di isi',
            ]
        );

        if ($this->input->post('email') !== $email) {
            $is_unique  = '|is_unique[company.email]';
        } else {
            $is_unique  = '';
        }
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email' . $is_unique,
            [
                'required'      => '%s wajib di isi',
                'valid_email'   => 'Format %s salah'
            ]
        );


        $this->form_validation->set_rules(
            'telp',
            'Nomor Telpon',
            'trim|required|numeric|min_length[8]|max_length[14]',
            [
                'required'  => '%s wajib di isi',
                'numeric'   => '%s wajib angka'
            ]
        );

        $this->form_validation->set_rules(
            'address',
            'Alamat',
            'trim|required',
            [
                'required' => '%s wajib di isi',
            ]
        );

        $this->form_validation->set_rules(
            'pic',
            'Nama PIC',
            'trim|required',
            [
                'required' => '%s wajib di isi',
            ]
        );



        if ($this->input->post('regency') === "") {
            $this->form_validation->set_rules(
                'regency',
                'Daerah',
                'trim|required',
                [
                    'required' => '%s wajib di isi',
                ]
            );
        }
    }
}

/* End of file Dashboard.php */