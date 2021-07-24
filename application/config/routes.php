<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']                        = 'auth/login';

//AUTH
$route['auth']                                      = 'auth/login';
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
$route['pdf/surattugas']                            = 'admin_pdf/surattugas'; //7.Surat Tugas mahasiswa PKN (F-PAI-030)
$route['pdf/suratpengantar']                        = 'admin_pdf/suratpengantar'; //8.Surat Pengantar mahasiswa PKN (F-PAI-031)
$route['pdf/penilaianpembimbinglapang']             = 'admin_pdf/penilaianpembimbinglapang'; //9.Formulir penilaian mahasiswa PKN oleh pembimbing lapang PKN (F-PAI-032)
$route['pdf/laporansupervisi']                      = 'admin_pdf/laporansupervisi'; //11.Laporan Supervisi PKN (F-PAI-034)
$route['pdf/penilaiansupervisi']                    = 'admin_pdf/penilaiansupervisi'; //12.Formulir penilaian supervisi PKN (F-PAI-035)
$route['pdf/penilaianujian']                        = 'admin_pdf/penilaianujian'; //13.Formulir penilaian ujian PKN (F-PAI-036)
$route['pdf/nilaiakhir']                            = 'admin_pdf/nilaiakhir'; //14.Nilai akhir PKN (F-PAI-037)
$route['pdf/penilaiandosenpembimbing']              = 'admin_pdf/penilaiandosenpembimbing'; //15.Penilaian dosen pembimbing (F-PAI-038)

//VERIFICATION
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




/* ================================== STUDENT ROLE ================================== */

$route['mahasiswa/dashboard']                       = 'mahasiswa_dashboard';

$route['mahasiswa/document']                        = 'mahasiswa_document';
$route['mahasiswa/document/update']                 = 'mahasiswa_document/edit';

$route['mahasiswa/planning']                        = 'mahasiswa_planning';
$route['mahasiswa/planning/add']                    = 'mahasiswa_planning/create';
$route['mahasiswa/planning/edit/(:any)/edit']       = 'mahasiswa_planning/update/$1/edit';

$route['mahasiswa/daily/log']                       = 'mahasiswa_daily/logIndex';
$route['mahasiswa/daily/log/add']                   = 'mahasiswa_daily/logCreate';
$route['mahasiswa/daily/log/detail']                = 'mahasiswa_daily/logDetail';
$route['mahasiswa/daily/log/edit/(:any)/edit']      = 'mahasiswa_daily/logUpdate/$1/edit';

$route['mahasiswa/daily/check_point']               = 'mahasiswa_daily/checkPoint';
$route['mahasiswa/daily/check_point/add']           = 'mahasiswa_daily/checkPointCreate';

$route['mahasiswa/profile']                         = 'mahasiswa_profile';

$route['mahasiswa/config/getcapaian']               = 'mahasiswa_planning/getCapaian';
$route['mahasiswa/config/getsubcapaian']            = 'mahasiswa_planning/getSubCapaian';

$route['mahasiswa/data_pkn']                        = 'mahasiswa_data_pkn';
$route['mahasiswa/data_pkn/uploaded']               = 'mahasiswa_data_pkn/upload';




/* ================================== PRODI ROLE ================================== */


//KAPRODI
//  Add List Routes Prodi here
$route['prodi/dashboard']                           = 'kaprodi_dashboard/index';

// Location CRUD Routes
$route['prodi/pkn_location']                        = 'kaprodi_pkn_location/index';

$route['prodi/pkn_registrasi/period/(:any)']        = 'kaprodi_pkn_registration/index/$1';
$route['prodi/pkn_registrasi']                      = 'kaprodi_pkn_registration/index';

$route['prodi/pkn_group_activity']                  = 'kaprodi_pkn_group_activity/index';
$route['prodi/pkn_group_activity/detail/(:any)']    = 'kaprodi_pkn_group_activity/detail/$1';
$route['prodi/pkn_group_activity/dailylog/(:any)']  = 'kaprodi_pkn_group_activity/memberDailyLog/$1';
$route['prodi/pkn_group_activity/present/(:any)']   = 'kaprodi_pkn_group_activity/memberPresent/$1';
$route['prodi/pkn_group_activity/final_score/(:any)'] = 'kaprodi_pkn_group_activity/memberFinalScore/$1';
// AJAX API
$route['prodi/pkn_location/regency']['get']          = 'kaprodi_pkn_location/getRegecy';
$route['prodi/pkn_location/province']['get']         = 'kaprodi_pkn_location/getProvince';
$route['prodi/pkn_registrasi/academic_year']['get']  = 'kaprodi_pkn_registration/getPklAcademicYear';
$route['prodi/pkn_registrasi/lecture']['get']        = 'kaprodi_pkn_registration/getLecture';
$route['prodi/pkn_registrasi/approval']['post']      = 'kaprodi_pkn_registration/approvalAPI';
$route['prodi/pkn_registrasi/location/(:any)']['get'] = 'kaprodi_pkn_registration/getPklLocation/$1';
$route['prodi/pkn_registrasi/location']['post']       = 'kaprodi_pkn_registration/changeLocation';


/* ================================== LECTURE ROLE ================================== */

$route['dosen/dashboard']                           = 'lecture_dashboard';

$route['dosen/planning']                            = 'lecture_planning';
$route['dosen/planning/academic_year/(:any)']       = 'lecture_planning/index/$1';
$route['dosen/planning/detail/(:any)']              = 'lecture_planning/detail/$1';
$route['dosen/planning/verification/(:any)/(:any)'] = 'lecture_planning/verification/$1/$2';

$route['dosen/report_supervision']                  = 'lecture_report/reportSupervision';
$route['dosen/report_supervision/academic_year/(:any)'] = 'lecture_report/reportSupervision/$1';
$route['dosen/report_supervision/edit/(:any)/edit'] = 'lecture_report/updateReportSupervision/$1/edit';
$route['dosen/report_supervision/detail/(:any)']    = 'lecture_report/detailReportSupervision/$1';
$route['dosen/report_reception']                    = 'lecture_report/reportReception';
$route['dosen/report_reception/academic_year/(:any)'] = 'lecture_report/reportReception/$1';

$route['dosen/data_pkn']                            = 'lecture_data_pkn';
$route['dosen/data_pkn/academic_year/(:any)']       = 'lecture_data_pkn/index/$1';
$route['dosen/data_pkn/assessment/(:any)']          = 'lecture_data_pkn/assessment/$1';
$route['dosen/data_pkn/assessment/supervision/(:any)'] = 'lecture_data_pkn/saveAssesmentSupervision/$1';
$route['dosen/data_pkn/assessment/guidance/(:any)'] = 'lecture_data_pkn/saveAssesmentGuidance/$1';
$route['dosen/data_pkn/assessment/test_score/(:any)'] = 'lecture_data_pkn/saveAssesmentFinalTest/$1';

$route['dosen/activity/daily_log']                  = 'lecture_activity/dailyLog';
$route['dosen/activity/daily_log/academic_year/(:any)']  = 'lecture_activity/dailyLog/$1';
$route['dosen/activity/attendance']                 = 'lecture_activity/attendance';
$route['dosen/activity/attendance/academic_year/(:any)']  = 'lecture_activity/attendance/$1';


/* ================================= SUPERVISOR ROLE ================================= */

$route['supervisor/dashboard']                      = 'supervisor_dashboard';

$route['supervisor/planning']                       = 'supervisor_planning';
$route['supervisor/planning/detail/(:any)']         = 'supervisor_planning/detail/$1';
$route['supervisor/planning/verification/(:any)/(:any)'] = 'supervisor_planning/verification/$1/$2';

$route['supervisor/activity/daily_log']             = 'supervisor_activity/dailyLog';
$route['supervisor/daily_log/verification/(:any)/(:any)'] = 'supervisor_activity/verificationDailyLog/$1/$2';
$route['supervisor/activity/attendance']            = 'supervisor_activity/attendance';
$route['supervisor/attendance/verification/(:any)/(:any)'] = 'supervisor_activity/verificationAttendance/$1/$2';

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


/* ================================== PUDIR ROLE ================================== */

$route['pudir/dashboard']                           = 'pudir_dashboard';
$route['pudir/pkn']                                 = 'pudir_pkn';
$route['pudir/pkn/(:any)']                          = 'pudir_pkn/index/$1';


/* ================================== KETUPLAK ROLE ================================== */

$route['ketuplak/dashboard']                        = 'ketuplak_dashboard';
$route['ketuplak/pkn']                              = 'ketuplak_pkn';
$route['ketuplak/pkn/(:any)']                       = 'ketuplak_pkn/index/$1';


$route['test'] = 'admin_registrations/generatedata';

$route['404_override'] = 'err';
$route['translate_uri_dashes'] = FALSE;
