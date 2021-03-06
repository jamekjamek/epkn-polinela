<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_daily extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mahasiswa/Mahasiswa_daily_model', 'Daily');
    $this->role = 'Mahasiswa';
    cek_login('Mahasiswa');
    $this->redirectDailyLog = 'mahasiswa/daily/log';
    $this->redirectCheckPoint = 'mahasiswa/daily/check_point';
  }

  public function logIndex()
  {
    $data = [
      'title'         => 'Data Log Harian',
      'desc'          => 'Berfungsi untuk melihat data log harian PKL',
      'dailyLogs'     => $this->Daily->dailyList(),
      'isCheck'       => $this->Daily->isCheck()->row()
    ];
    $page = '/mahasiswa/daily/log';
    pageBackend($this->role, $page, $data);
  }

  public function logCreate()
  {
    $this->_validation('insert');
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'         => 'Tambah Data Log Harian',
        'desc'          => 'Berfungsi untuk menambah data log harian PKL',
        'isCheck'       => $this->Daily->isCheck()->row_array(),
      ];
      $page = '/mahasiswa/daily/log_create';
      pageBackend($this->role, $page, $data);
    } else {
      $insert = $this->save();
      if ($insert > 0) {
        $this->session->set_flashdata('success', '<b>Penambahan data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect($this->redirectDailyLog);
    }
  }

  public function logUpdate($id, $type)
  {
    $decodeId   = $this->encrypt->decode($id, keyencrypt());
    $log        = $this->Daily->getDataLogBy(['id' => $decodeId])->row();

    if (!$log) {
      redirect($this->redirectDailyLog);
    }
    $this->_validation('update');
    if ($this->form_validation->run() == false && $type == 'edit') {
      $data = [
        'title'   => 'Ubah Data Log Harian',
        'desc'    => 'Berfungsi untuk mengupdate data log harian PKL',
        'log'     => $log,
        'isCheck' => $this->Daily->isCheck()->row_array(),
      ];
      $page       = '/mahasiswa/daily/log_update';
      pageBackend($this->role, $page, $data);
    } else {
      $this->output->set_content_type('application/json')->set_output(json_encode($log));
      $update = $this->save($log->id);
      if ($update > 0) {
        $this->session->set_flashdata('success', '<b>Ubah data berhasil</b>');
      } else {
        $this->session->set_flashdata('error', '<b>Server sedang sibuk, silahkan coba lagi</b>');
      }
      redirect($this->redirectDailyLog);
    }
  }

  // save daily log
  private function save($id = null)
  {
    $data = $this->input->post();
    $daily = [
      'registration_id'           => $data['registration_id'],
      'learning_achievement'      => $data['learning_achievement'],
      'learning_achievement_sub'  => $data['learning_achievement_sub'],
      'implementation_date'       => htmlspecialchars($data['implementation_date']),
      'tool'                      => htmlspecialchars($data['tool']),
      'description'               => $data['description'],
      'comment'                   => $data['comment'],
    ];
    if ($id) {
      $output     = $this->Daily->update($daily, $id);
    } else {
      $output     = $this->Daily->insert($daily);
    }
    return $output;
  }

  public function logDetail()
  {
    $logId    = $this->input->post('logId');
    $getData    = $this->Daily->getDataLogBy(['id' => $logId])->result();
    if ($getData != null) {
      $result['status'] = 'ok';
      $output     = "";
      foreach ($getData as $log) {
        $output     .= "
                <tr>
                    <td>#</td>
                    <td>" . $log->description . "</td>
                    <td>" . $log->comment . "</td>
                </tr>
            ";
      }
      $result['data']   = $output;
    } else {
      $result['status'] = 'bad';
      $result['data']   = null;
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  public function checkPoint()
  {
    $data = [
      'title'         => 'Data Kehadiran',
      'desc'          => 'Berfungsi untuk melihat data kehadiran PKL',
      'checkPoints'    => $this->Daily->checkPointList(),
      'btnCheck'      => $this->Daily->btnCheckAttendance()->row_array(),
      'isCheck'       => $this->Daily->isCheck()->row()

    ];
    $page = '/mahasiswa/daily/check_point';
    pageBackend($this->role, $page, $data);
  }

  public function checkPointCreate()
  {
    $this->_validation('check_point');
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'         => 'Tambah Data Kehadiran',
        'desc'          => 'Berfungsi untuk menambah data kehadiran PKL',
        'isCheck'       => $this->Daily->isCheck()->row_array(),
      ];
      $page = '/mahasiswa/daily/check_point_create';
      pageBackend($this->role, $page, $data);
    } else {
      $this->db->set('id', 'UUID()', FALSE);
      $dataInsert = [
        'registration_id' => $this->input->post('registration_id'),
        'time_in'         => $this->input->post('time_in'),
        'time_out'        => $this->input->post('time_out'),
        'attendance'      => $this->input->post('attendance'),
      ];
      $insert     = $this->Daily->insertCP($dataInsert);
      if ($insert > 0) {
        $this->session->set_flashdata('success', 'Data berhasil di tambah');
      } else {
        $this->session->set_flashdata('error', 'Server Data User Sedang sibuk, silahkan coba lagi');
      }
      redirect($this->redirectCheckPoint);
    }
  }

  // validation
  private function _validation($type = '')
  {
    if ($type == 'insert') {
      $this->form_validation->set_rules(
        'learning_achievement',
        'Perencanaan kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'learning_achievement_sub',
        'Sub perencanaan kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'implementation_date',
        'Tanggal',
        'required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'tool',
        'Alat dan bahan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'description',
        'Prosedur',
        'trim|required',
        [
          'required'      => '%s wajib diisi'
        ]
      );

      $this->form_validation->set_rules(
        'comment',
        'Komentar',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );
    }

    if ($type == 'update') {
      $this->form_validation->set_rules(
        'learning_achievement',
        'Perencanaan kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'learning_achievement_sub',
        'Sub perencanaan kegiatan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'implementation_date',
        'Tanggal',
        'required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'tool',
        'Alat dan bahan',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );

      $this->form_validation->set_rules(
        'description',
        'Prosedur',
        'trim|required',
        [
          'required'      => '%s wajib diisi'
        ]
      );

      $this->form_validation->set_rules(
        'comment',
        'Komentar',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );
    }

    if ($type == 'check_point') {
      // $this->form_validation->set_rules(
      //   'time_in',
      //   'Jam masuk',
      //   'trim|required',
      //   [
      //     'required'      => '%s wajib diisi',
      //   ]
      // );

      // $this->form_validation->set_rules(
      //   'time_out',
      //   'Jam selesai',
      //   'trim|required',
      //   [
      //     'required'      => '%s wajib diisi',
      //   ]
      // );

      $this->form_validation->set_rules(
        'attendance',
        'Kehadiran',
        'trim|required',
        [
          'required'      => '%s wajib diisi',
        ]
      );
    }
  }
}
