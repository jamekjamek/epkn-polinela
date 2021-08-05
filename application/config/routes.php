<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']                        = 'auth/login';

//AUTH
$route['auth']                                      = 'auth/login';
$route['auth/forgot_password']                      = 'auth/forgotPassword';
$route['auth/changedefault']                        = 'auth/changepasswordfromdefault';

/* ================================== ADMIN ROLE ================================== */

//ADMIN
$route['admin/dashboard']                           = 'admin_dashboard/index';

//KONFIGURASI
//ACADEMIC YEAR
$route['admin/config/academic_year']                = 'admin_academic_year';
$route['admin/config/academic_year/add']            = 'admin_academic_year/create';
$route['admin/config/academic_year/edit/(:any)']    = 'admin_academic_year/update/$1';
$route['admin/config/academic_year/delete/(:any)']  = 'admin_academic_year/delete/$1';

//PERIODE
$route['admin/pkn_period']                          = 'Admin_pkn_period';
$route['admin/pkn_period/add']                      = 'Admin_pkn_period/create';
$route['admin/pkn_period/edit/(:any)']              = 'Admin_pkn_period/update/$1';

//LETTER
$route['admin/letter']                              = 'admin_letter';
$route['admin/letter/add']                          = 'admin_letter/add';
$route['admin/letter/detail/(:any)']                = 'admin_letter/detail/$1';

//MASTER DATA
//MAJOR
$route['admin/master/major']                        = 'admin_major';
$route['admin/master/major/add']                    = 'admin_major/create';
$route['admin/master/major/excel']                  = 'admin_major/exportExcel';
$route['admin/master/major/edit/(:any)']            = 'admin_major/update/$1';
$route['admin/master/major/delete/(:any)']          = 'admin_major/delete/$1';

//PRODI
$route['admin/master/prodi']                        = 'admin_study_program';
$route['admin/master/prodi/add']                    = 'admin_study_program/create';
$route['admin/master/prodi/excel']                  = 'admin_study_program/exportExcel';
$route['admin/master/prodi/edit/(:any)']            = 'admin_study_program/update/$1';
$route['admin/master/prodi/delete/(:any)']          = 'admin_study_program/delete/$1';

//STUDENT
$route['admin/master/student']                      = 'admin_students';
$route['admin/master/student/add']                  = 'admin_students/create';
$route['admin/master/student/edit/(:any)']          = 'admin_students/update/$1';
$route['admin/master/student/delete/(:any)']        = 'admin_students/delete/$1';
$route['admin/master/student/import']               = 'admin_students/import'; //view
$route['admin/master/student/importstudent']        = 'admin_students/importstudent'; //action
$route['admin/master/student/export']               = 'admin_students/export'; //view

//LECTURE
$route['admin/master/lecture']                      = 'admin_lecture';
$route['admin/master/lecture/add']                  = 'admin_lecture/create';
$route['admin/master/lecture/edit/(:any)']          = 'admin_lecture/update/$1';
$route['admin/master/lecture/delete/(:any)']        = 'admin_lecture/delete/$1';
$route['admin/master/lecture/import']               = 'admin_lecture/import'; //view
$route['admin/master/lecture/importlecture']        = 'admin_lecture/importlecture'; //action
$route['admin/master/lecture/export']               = 'admin_lecture/export'; //action


//COMPANY
$route['admin/master/village']                      = 'admin_village';
$route['admin/master/village/add']                  = 'admin_village/create';
$route['admin/master/village/exportRegency']        = 'admin_village/exportRegency';
$route['admin/master/village/edit/(:any)']          = 'admin_village/update/$1';
$route['admin/master/village/delete/(:any)']        = 'admin_village/delete/$1';
$route['admin/master/village/import']               = 'admin_village/import';
$route['admin/master/village/importvillage']        = 'admin_village/importvillage'; //action
$route['admin/master/village/export']               = 'admin_village/export';


//REGISTRATIONS
$route['admin/registrations']                                   = 'admin_registrations';
$route['admin/registrations/add']                               = 'admin_registrations/create';
$route['admin/registrations/detail/(:any)']                     = 'admin_registrations/detail/$1';
$route['admin/registrations/verification/(:any)/(:num)']        = 'admin_registrations/verification/$1/$2';
$route['admin/registrations/updatesupervisor/(:any)']           = 'admin_registrations/updatesupervisor/$1';
$route['admin/registrations/updateanothergroup/(:any)']         = 'admin_registrations/updateanothergroup/$1';
$route['admin/registrations/addnewmember/(:any)']               = 'admin_registrations/addnewmember/$1';
$route['admin/registrations/upload/(:any)']                     = 'admin_registrations/upload/$1';
$route['admin/registrations/changelocation/(:any)']             = 'admin_registrations/changelocation/$1';

$route['admin/registrations/history']                           = 'admin_registrations/history';
$route['admin/registrations/historydetail']                     = 'admin_registrations/historydetail';
$route['admin/registrations/generatedata']                      = 'admin_registrations/generatedata';
$route['admin/registrations/getvillage']                        = 'admin_registrations/getvillage';
$route['admin/registrations/import']                            = 'admin_registrations/import';
$route['admin/registration/importregistration']                 = 'admin_registrations/importregistration';
$route['admin/registration/delete/(:any)']                      = 'admin_registrations/delete/$1';
$route['admin/registration/delete_at_detail/(:any)']                      = 'admin_registrations/deleteAtDetail/$1';



//ADMIN CONFIG
$route['config/getprodi']                           = 'admin_config/getprodi';
$route['config/getregency2']                        = 'admin_config/getregency';
$route['config/getleader']                          = 'admin_config/getleader';
$route['config/getcompanies']                       = 'admin_config/getcompanies';
$route['config/historyadd']                         = 'admin_config/historyadd';
$route['config/historyupdate/(:any)/(:any)']        = 'admin_config/historyupdate/$1/$2';
$route['config/historyVerfication/(:any)']          = 'admin_config/historyVerfication/$1';
$route['prodi/config/historyapproval/(:any)']       = 'admin_config/historyapproval/$1';
$route['config/verificationdata']                   = 'Admin_config/data';

//ADMIN PDF TES
$route['pdf/amplop']                                = 'admin_pdf/amplop';
$route['pdf/surattugas']                            = 'admin_pdf/surattugas';
$route['pdf/suratpengantar']                        = 'admin_pdf/suratpengantar';
$route['pdf/penilaianpembimbinglapang/(:any)']      = 'admin_pdf/penilaianpembimbinglapang/$1';
$route['pdf/penilaianpembimbinglapangkosong/(:any)']      = 'admin_pdf/penilaianpembimbinglapangkosong/$1';
$route['pdf/laporansupervisi']                      = 'admin_pdf/laporansupervisi';
$route['pdf/penilaiansupervisi/(:any)']             = 'admin_pdf/penilaiansupervisi/$1';
$route['pdf/penilaianujian/(:any)']                 = 'admin_pdf/penilaianujian/$1';
$route['pdf/nilaiakhir/(:any)']                     = 'admin_pdf/nilaiakhir/$1';
$route['pdf/penilaiandosenpembimbing/(:any)']       = 'admin_pdf/penilaiandosenpembimbing/$1';
$route['pdf/suratpenarikan']                        = 'admin_pdf/suratpenarikan';
$route['pdf/lembarperencanaankegiatanpkn/(:any)']   = 'admin_pdf/planningSheet/$1';
$route['pdf/kesediaanperusahaan']                   = 'admin_pdf/kesediaanperusahaan';
$route['pdf/kesediaanperusahaan/(:any)']            = 'admin_pdf/kesediaanperusahaan/$1';
$route['pdf/penarikan']                             = 'admin_pdf/finishLeter';
$route['pdf/laporansupervisipkn/(:any)']            = 'admin_pdf/supervisionReport/$1';
$route['pdf/nilaisupervisi/(:any)']                 = 'admin_pdf/supervisionValue/$1';

$route['pdf/logharian']                             = 'admin_pdf/dailyLog';
$route['pdf/logharian/(:any)']                      = 'admin_pdf/dailyLog/$1';
$route['pdf/nilaidosenpembimbing/(:any)']           = 'admin_pdf/guidanceValue/$1';
$route['pdf/kesediaanperusahaan']                   = 'admin_pdf/kesediaanperusahaan';
$route['pdf/kesediaanperusahaan/(:any)']            = 'admin_pdf/kesediaanperusahaan/$1';
$route['pdf/dosenpembimbing']                       = 'admin_pdf/dosenpembimbing';
$route['pdf/dosenpembimbing/(:any)']                = 'admin_pdf/dosenpembimbing/$1';
$route['pdf/pembimbinglapang']                      = 'admin_pdf/pembimbinglapang';
$route['pdf/pembimbinglapang/(:any)']               = 'admin_pdf/pembimbinglapang/$1';
$route['pdf/nilaiakhirpkn']                         = 'admin_pdf/nilaiakhirpkl';
$route['pdf/kehadiran/(:any)']                      = 'admin_pdf/kehadiran/$1';
$route['pdf/lembarisianpkn/(:any)']                 = 'admin_pdf/lembarisianpkn/$1'; //12. LEMBAR ISIAN_PKN
$route['pdf/permohonanpenggunaanapp']               = 'admin_pdf/permohonanpenggunaanapp';
$route['admin/verification']                        = 'Admin_verification';

//KETUA JURUSAN
$route['admin/master/head-of-program']              = 'Admin_head_program';
$route['admin/master/head-of-program/add']          = 'Admin_head_program/create';
$route['admin/master/head-of-program/update']       = 'Admin_head_program/update';

//KEUTA PRODI
$route['admin/master/head-of-program-study']        = 'Admin_head_program_study';
$route['admin/master/head-of-program-study/add']    = 'Admin_head_program_study/create';
$route['admin/master/head-of-program-study/update'] = 'Admin_head_program_study/update';


$route['admin/master/users']                        = 'Admin_users';
$route['admin/master/users/update/(:any)/(:any)']   = 'Admin_users/update/$1/$2';

$route['admin/master/pkn']                          = 'Admin_pkn';
$route['admin/master/pkn/(:any)']                   = 'Admin_pkn/index/$1';


//GUIDEBOOK
$route['admin/guidebook']                           = 'admin_guidebook';
$route['admin/guidebook/add']                       = 'admin_guidebook/create';
$route['admin/guidebook/detail']                    = 'admin_guidebook/detail';

// Kesediaan penerimaan
$route['admin/report_reception']                    = 'Admin_report_reception';
$route['admin/report_reception/detail/(:any)']      = 'Admin_report_reception/detail/$1';


// PLANNING ATTACHMENT
$route['admin/master/planning_attachment']          = 'admin_planning_attachment';
$route['admin/master/planning_attachment/add']      = 'admin_planning_attachment/create';
$route['admin/master/planning_attachment/detail']   = 'admin_planning_attachment/detail';

// RECAP
$route['admin/recap/advisers']                      = 'admin_recap/adviser';
$route['admin/recap/advisers/academic/(:any)']      = 'admin_recap/adviser/$1';
$route['admin/recap/supervisor']                    = 'admin_recap/supervisor';
$route['admin/recap/supervisor/academic/(:any)']    = 'admin_recap/supervisor/$1';
$route['admin/recap/daily_log']                     = 'admin_recap/dailyLog';
$route['admin/recap/daily_log/detail/(:any)']       = 'admin_recap/dailyLogDetail/$1';
$route['admin/recap/daily_log/detail_more']         = 'admin_recap/dailyLogDetailMore';
$route['admin/recap/attendance']                    = 'admin_recap/attendance';
$route['admin/recap/attendance/detail/(:any)']      = 'admin_recap/attendanceDetail/$1';
$route['admin/recap/supervision_report']            = 'admin_recap/supervisionReport';
$route['admin/recap/supervision_report/detail']     = 'admin_recap/supervisionReportDetail';
$route['admin/recap/status_pkn']                    = 'admin_recap/statusPkn';
$route['admin/recap/status_pkn/(:any)']             = 'admin_recap/statusPKL/$1';
$route['admin/recap/scoring']                       = 'admin_recap/scoring';
$route['admin/recap/video']                         = 'admin_recap/video';


/* ================================== STUDENT ROLE ================================== */

$route['mahasiswa/dashboard']                       = 'mahasiswa_dashboard';

$route['mahasiswa/document']                        = 'mahasiswa_document';
$route['mahasiswa/document/update']                 = 'mahasiswa_document/edit';

$route['mahasiswa/program']                        = 'mahasiswa_program';
$route['mahasiswa/program/add']                    = 'mahasiswa_program/create';
$route['mahasiswa/program/edit/(:any)/edit']       = 'mahasiswa_program/update/$1/edit';

$route['mahasiswa/daily/log']                       = 'mahasiswa_daily/logIndex';
$route['mahasiswa/daily/log/add']                   = 'mahasiswa_daily/logCreate';
$route['mahasiswa/daily/log/detail']                = 'mahasiswa_daily/logDetail';
$route['mahasiswa/daily/log/edit/(:any)/edit']      = 'mahasiswa_daily/logUpdate/$1/edit';

$route['mahasiswa/daily/check_point']               = 'mahasiswa_daily/checkPoint';
$route['mahasiswa/daily/check_point/add']           = 'mahasiswa_daily/checkPointCreate';

$route['mahasiswa/profile']                         = 'mahasiswa_profile';

$route['mahasiswa/config/getcapaian']               = 'mahasiswa_program/getCapaian';

$route['mahasiswa/data_pkn']                        = 'mahasiswa_data_pkn';
$route['mahasiswa/data_pkn/uploaded']               = 'mahasiswa_data_pkn/upload';
$route['mahasiswa/data_pkn/upload/update/(:any)']   = 'mahasiswa_data_pkn/uploadUpdate/$1';

$route['mahasiswa/quesioner']                       = 'quesioner';



/* ================================== PRODI ROLE ================================== */


//KAPRODI
//  Add List Routes Prodi here
$route['prodi/dashboard']                     = 'kaprodi_dashboard/index';

$route['prodi/registrations']                 = 'kaprodi_recap/registration';
$route['prodi/advisers']                      = 'kaprodi_recap/adviser';
$route['prodi/supervisor']                    = 'kaprodi_recap/supervisor';
$route['prodi/daily_log']                     = 'kaprodi_recap/dailyLog';
$route['prodi/daily_log/detail/(:any)']       = 'kaprodi_recap/dailyLogDetail/$1';
$route['prodi/daily_log/detail_more']         = 'kaprodi_recap/dailyLogDetailMore';
$route['prodi/attendance']                    = 'kaprodi_recap/attendance';
$route['prodi/attendance/detail/(:any)']      = 'kaprodi_recap/attendanceDetail/$1';
$route['prodi/supervision_report']            = 'kaprodi_recap/supervisionReport';
$route['prodi/supervision_report/detail']     = 'kaprodi_recap/supervisionReportDetail';
$route['prodi/status_pkn']                    = 'kaprodi_recap/statusPkn';
$route['prodi/status_pkn/(:any)']             = 'kaprodi_recap/statusPKL/$1';
$route['prodi/scoring']                       = 'kaprodi_recap/scoring';
$route['prodi/video']                         = 'recap_controller/video';


/* ================================== LECTURE ROLE ================================== */

$route['dosen/dashboard']                           = 'lecture_dashboard';
$route['dosen/profile']                             = 'lecture_profile';
$route['dosen/planning']                            = 'lecture_planning';
$route['dosen/planning/academic_year/(:any)']       = 'lecture_planning/index/$1';
$route['dosen/planning/detail/(:any)']              = 'lecture_planning/detail/$1';
$route['dosen/planning/verification/(:any)']        = 'lecture_planning/verification/$1';

$route['dosen/report_supervision']                  = 'lecture_report/reportSupervision';
$route['dosen/report_supervision/academic_year/(:any)'] = 'lecture_report/reportSupervision/$1';
$route['dosen/report_supervision/edit/(:any)/edit'] = 'lecture_report/updateReportSupervision/$1/edit';
$route['dosen/report_supervision/detail/(:any)']    = 'lecture_report/detailReportSupervision/$1';
$route['dosen/report_reception']                    = 'lecture_report/reportReception';
$route['dosen/report_reception/academic_year/(:any)'] = 'lecture_report/reportReception/$1';
$route['dosen/report_reception/detail/(:any)']      = 'lecture_report/detailReception/$1';
$route['dosen/report_supervision/pushed/(:any)/(:any)']    = 'lecture_report/pushed/$1/$2';

$route['dosen/data_pkn']                            = 'lecture_data_pkn';
$route['dosen/data_pkn/academic_year/(:any)']       = 'lecture_data_pkn/index/$1';
$route['dosen/data_pkn/assessment/(:any)']          = 'lecture_data_pkn/assessment/$1';
$route['dosen/data_pkn/assessment/supervision/(:any)'] = 'lecture_data_pkn/saveAssesmentSupervision/$1';
$route['dosen/data_pkn/assessment/guidance/(:any)'] = 'lecture_data_pkn/saveAssesmentGuidance/$1';
$route['dosen/data_pkn/assessment/test_score/(:any)'] = 'lecture_data_pkn/saveAssesmentFinalTest/$1';
$route['dosen/data_pkn/assessment/supervisor/(:any)'] = 'lecture_data_pkn/saveAssesmentSupervisor/$1';
$route['dosen/data_pkn/view_video']                       = 'recap_controller/video';

$route['dosen/activity/daily_log']                  = 'lecture_activity/dailyLog';
$route['dosen/activity/daily_log/detail/(:any)']    = 'lecture_activity/dailyLogDetail/$1';
$route['dosen/activity/daily_log/detail_more']      = 'recap_controller/dailyLogDetailMore';
$route['dosen/activity/daily_log/academic_year/(:any)']  = 'lecture_activity/dailyLog/$1';
$route['dosen/activity/attendance']                 = 'lecture_activity/attendance';
$route['dosen/activity/attendance/detail/(:any)']   = 'lecture_activity/attendanceDetail/$1';
$route['dosen/activity/attendance/academic_year/(:any)']  = 'lecture_activity/attendance/$1';

$route['dosen/quesioner']                           = 'quesioner';


/* ================================= SUPERVISOR ROLE ================================= */

$route['supervisor/dashboard']                      = 'supervisor_dashboard';
$route['supervisor/profile']                        = 'supervisor_profile';

$route['supervisor/planning']                       = 'supervisor_planning';
$route['supervisor/planning/detail/(:any)']         = 'supervisor_planning/detail/$1';
$route['supervisor/planning/verification/(:any)']   = 'supervisor_planning/verification/$1';

$route['supervisor/activity/daily_log']             = 'supervisor_activity/dailyLog';
$route['supervisor/activity/daily_log/detail/(:any)'] = 'supervisor_activity/dailyLogDetail/$1';
$route['supervisor/activity/daily_log/detail_more']   = 'recap_controller/dailyLogDetailMore';
$route['supervisor/daily_log/verification']         = 'supervisor_activity/verificationDailyLog';
$route['supervisor/activity/attendance']            = 'supervisor_activity/attendance';
$route['supervisor/activity/attendance/detail/(:any)'] = 'supervisor_activity/attendanceDetail/$1';
$route['supervisor/attendance/verification']        = 'supervisor_activity/verificationAttendance';

$route['supervisor/data_pkn']                       = 'supervisor_data_pkn';
$route['supervisor/data_pkn/assessment/(:any)']     = 'supervisor_data_pkn/assessment/$1';
$route['supervisor/data_pkn/assessment/save/(:any)'] = 'supervisor_data_pkn/save/$1';

$route['supervisor/report_reception']               = 'supervisor_report';
$route['supervisor/report_reception/add']           = 'supervisor_report/add';
$route['supervisor/report_reception/update/(:any)'] = 'supervisor_report/update/$1';
$route['supervisor/report_reception/cancel/(:any)'] = 'supervisor_report/cancel/$1';

$route['supervisor/quesioner']                      = 'supervisor_quesioner';
$route['supervisor/quesioner/add']                  = 'supervisor_quesioner/insert';
$route['supervisor/quesioner/(:any)/edit']          = 'supervisor_quesioner/$1/edit';

$route['supervisor/quesioner']                      = 'quesioner';


/* ================================== PUDIR ROLE ================================== */

$route['pudir/dashboard']                           = 'pudir_dashboard';
$route['pudir/pkn']                                 = 'pudir_pkl';
$route['pudir/pkn/(:any)']                          = 'pudir_pkl/index/$1';


/* ================================== KETUPLAK ROLE ================================== */

$route['ketuplak/dashboard']                        = 'ketuplak_dashboard';
$route['ketuplak/pkn']                              = 'ketuplak_pkl';
$route['ketuplak/pkn/(:any)']                       = 'ketuplak_pkl/index/$1';


$route['test'] = 'admin_registrations/generatedata';
$route['generateMhs/(:num)'] = 'admin_registrations/generateMhs/$1';
$route['generateCompany/(:num)'] = 'admin_registrations/generateCompany/$1';

$route['404_override'] = 'err';
$route['translate_uri_dashes'] = FALSE;
