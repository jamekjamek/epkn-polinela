<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']                        = 'auth/login';

//AUTH
$route['auth']                                      = 'auth/login';
$route['auth/changedefault']                        = 'auth/changepasswordfromdefault';

/* ================ADMIN ROLE======================== */

//ADMIN
$route['admin/dashboard']                           = 'admin_dashboard/index';

//KONFIGURASI
//ACADEMIC YEAR
$route['admin/config/academic_year']                = 'admin_academic_year';
$route['admin/config/academic_year/add']            = 'admin_academic_year/create';
$route['admin/config/academic_year/edit/(:any)']    = 'admin_academic_year/update/$1';
$route['admin/config/academic_year/delete/(:any)']  = 'admin_academic_year/delete/$1';

//PERIODE
$route['admin/config/(:any)']                       = 'admin_periode/index/$1';
$route['admin/config/add/(:any)']                   = 'admin_periode/create/$1';
$route['admin/config/edit/(:any)/(:any)']           = 'admin_periode/update/$1/$2';


//LETTER
$route['admin/letter']                              = 'admin_letter';
$route['admin/letter/add']                          = 'admin_letter/add';
$route['admin/letter/logo']                         = 'admin_letter/uploadlogo';
$route['admin/letter/detail/(:any)']                = 'admin_letter/detail/$1';
$route['admin/master/letter/delete/(:any)']         = 'admin_letter/delete/$1';

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
$route['admin/master/company']                      = 'admin_company';
$route['admin/master/company/add']                  = 'admin_company/create';
$route['admin/master/company/exportRegency']        = 'admin_company/exportRegency';
$route['admin/master/company/edit/(:any)']          = 'admin_company/update/$1';
$route['admin/master/company/delete/(:any)']        = 'admin_company/delete/$1';
$route['admin/master/company/import']               = 'admin_company/import';
$route['admin/master/company/importcompany']        = 'admin_company/importcompany'; //action
$route['admin/master/company/export']               = 'admin_company/export';

//ROOM
$route['admin/master/room']                         = 'admin_room';
$route['admin/master/room/add']                     = 'admin_room/create';
$route['admin/master/room/edit/(:any)']             = 'admin_room/update/$1';
$route['admin/master/room/delete/(:any)']           = 'admin_room/delete/$1';


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

// $route['admin/registrations/member']                = 'admin_registrations/getmember';
// $route['admin/registrations/addgroup']              = 'admin_registrations/creategroup';
$route['admin/registrations/history']                           = 'admin_registrations/history';
$route['admin/registrations/historydetail']                     = 'admin_registrations/historydetail';
$route['admin/registrations/generatedata']                      = 'admin_registrations/generatedata';
$route['admin/registrations/getcompany']                        = 'admin_registrations/getcompany';



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


$route['admin/master/pkl']                          = 'Admin_pkl';
$route['admin/master/pkl/(:any)']                   = 'Admin_pkl/index/$1';
/*=================END ADMIN ROLE======================*/


/* ================SEKJUR ROLE======================== */
$route['major/dashboard']                           = 'Major_dashboard';
$route['major/verification']                        = 'Major_verification';


$route['major/persentasepkl']                       = 'Major_persentasepkl';
$route['major/persentasepkl/(:any)']                = 'Major_persentasepkl/index/$1';
/* ================END SEKJUR ROLE======================== */






/* ================MAHASISWA ROLE======================== */
$route['mahasiswa/dashboard']                       = 'mahasiswa_dashboard';
$route['mahasiswa/company']                         = 'mahasiswa_company';
$route['mahasiswa/company/add']                     = 'mahasiswa_company/create';
$route['mahasiswa/company/edit/(:any)/edit']        = 'mahasiswa_company/update/$1/edit';

$route['mahasiswa/registration']                    = 'mahasiswa_registration';
$route['mahasiswa/registration/add']                = 'mahasiswa_registration/create';
$route['mahasiswa/registration/member']             = 'mahasiswa_registration/getMember';
$route['mahasiswa/registration/addgroup']           = 'mahasiswa_registration/createGroup';
$route['mahasiswa/config/getcompanyregis']          = 'mahasiswa_registration/getCompany';

$route['mahasiswa/document']                        = 'mahasiswa_document';
$route['mahasiswa/document/update']                 = 'mahasiswa_document/edit';

$route['mahasiswa/registration/invited']            = 'mahasiswa_registration/invited';
$route['mahasiswa/registration/uploaded']           = 'mahasiswa_registration/uploaded';
$route['mahasiswa/registration/addnewmember']       = 'mahasiswa_registration/addnewmember';

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

$route['mahasiswa/data_pkl']                        = 'mahasiswa_data_pkl';
$route['mahasiswa/data_pkl/uploaded']               = 'mahasiswa_data_pkl/upload';




/*=================END MAHASISWA ROLE======================*/





//KAPRODI
//  Add List Routes Prodi here
$route['prodi/dashboard']                           = 'kaprodi_dashboard/index';

// Location CRUD Routes
$route['prodi/pkl_location']                        = 'kaprodi_pkl_location/index';
$route['prodi/pkl_location/create']                 = 'kaprodi_pkl_location/create';
$route['prodi/pkl_location/edit/(:any)']            = 'kaprodi_pkl_location/edit/$1';
$route['prodi/pkl_location/update/(:any)']          = 'kaprodi_pkl_location/update/$1';
$route['prodi/pkl_location/store']                  = 'kaprodi_pkl_location/store';
$route['prodi/pkl_location/delete/(:any)']          = 'kaprodi_pkl_location/destroy/$1';
$route['prodi/pkl_location/verifikasi/(:any)']      = 'kaprodi_pkl_location/verifikasi/$1';

$route['prodi/pkl_verifikasi/verifikasi/(:any)']    = 'kaprodi_pkl_registration/verifikasi/$1';
$route['prodi/pkl_registrasi/period/(:any)']        = 'kaprodi_pkl_registration/index/$1';
$route['prodi/pkl_registrasi']                      = 'kaprodi_pkl_registration/index';
$route['prodi/pkl_registrasi/uploaded']             = 'kaprodi_pkl_registration/uploaded';

$route['prodi/pkl_group_activity']                        = 'kaprodi_pkl_group_activity/index';
$route['prodi/pkl_group_activity/detail/(:any)']          = 'kaprodi_pkl_group_activity/detail/$1';
$route['prodi/pkl_group_activity/dailylog/(:any)']        = 'kaprodi_pkl_group_activity/memberDailyLog/$1';
$route['prodi/pkl_group_activity/present/(:any)']         = 'kaprodi_pkl_group_activity/memberPresent/$1';
$route['prodi/pkl_group_activity/final_score/(:any)']      = 'kaprodi_pkl_group_activity/memberFinalScore/$1';
// AJAX API
$route['prodi/pkl_location/regency']['get']                 = 'kaprodi_pkl_location/getRegecy';
$route['prodi/pkl_location/province']['get']                = 'kaprodi_pkl_location/getProvince';
$route['prodi/pkl_registrasi/academic_year']['get']         = 'kaprodi_pkl_registration/getPklAcademicYear';
$route['prodi/pkl_registrasi/lecture']['get']               = 'kaprodi_pkl_registration/getLecture';
$route['prodi/pkl_registrasi/approval']['post']             = 'kaprodi_pkl_registration/approvalAPI';
$route['prodi/pkl_registrasi/location/(:any)']['get']       = 'kaprodi_pkl_registration/getPklLocation/$1';
$route['prodi/pkl_registrasi/location']['post']             = 'kaprodi_pkl_registration/changeLocation';


/*=================ROLE LECTURE======================*/
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

$route['dosen/data_pkl']                            = 'lecture_data_pkl';
$route['dosen/data_pkl/academic_year/(:any)']       = 'lecture_data_pkl/index/$1';
$route['dosen/data_pkl/assessment/(:any)']          = 'lecture_data_pkl/assessment/$1';
$route['dosen/data_pkl/assessment/supervision/(:any)'] = 'lecture_data_pkl/saveAssesmentSupervision/$1';
$route['dosen/data_pkl/assessment/guidance/(:any)'] = 'lecture_data_pkl/saveAssesmentGuidance/$1';
$route['dosen/data_pkl/assessment/test_score/(:any)'] = 'lecture_data_pkl/saveAssesmentFinalTest/$1';


$route['dosen/activity/daily_log']                  = 'lecture_activity/dailyLog';
$route['dosen/activity/daily_log/academic_year/(:any)']  = 'lecture_data_pkl/dailyLog/$1';
$route['dosen/activity/attendance']                 = 'lecture_activity/attendance';
$route['dosen/activity/attendance/academic_year/(:any)']  = 'lecture_activity/attendance/$1';


/*=================ROLE SUPERVISOR======================*/
$route['supervisor/dashboard']                      = 'supervisor_dashboard';

$route['supervisor/planning']                       = 'supervisor_planning';
$route['supervisor/planning/detail/(:any)']         = 'supervisor_planning/detail/$1';
$route['supervisor/planning/verification/(:any)/(:any)'] = 'supervisor_planning/verification/$1/$2';

$route['supervisor/activity/daily_log']                      = 'supervisor_activity/dailyLog';
$route['supervisor/daily_log/verification/(:any)/(:any)'] = 'supervisor_activity/verificationDailyLog/$1/$2';
$route['supervisor/activity/attendance']                     = 'supervisor_activity/attendance';
$route['supervisor/attendance/verification/(:any)/(:any)'] = 'supervisor_activity/verificationAttendance/$1/$2';

$route['supervisor/data_pkl']                       = 'supervisor_data_pkl';
$route['supervisor/data_pkl/assessment/(:any)']     = 'supervisor_data_pkl/assessment/$1';
$route['supervisor/data_pkl/assessment/save/(:any)'] = 'supervisor_data_pkl/save/$1';

$route['supervisor/report_reception']               = 'supervisor_report';
$route['supervisor/report_reception/add']           = 'supervisor_report/add';
$route['supervisor/report_reception/update/(:any)'] = 'supervisor_report/update/$1';
$route['supervisor/report_reception/cancel/(:any)'] = 'supervisor_report/cancel/$1';

$route['supervisor/quesioner']                      = 'supervisor_quesioner';
$route['supervisor/quesioner/add']                  = 'supervisor_quesioner/insert';
$route['supervisor/quesioner/(:any)/edit']          = 'supervisor_quesioner/$1/edit';



/*=================PUDIR ROLE======================*/
$route['pudir/dashboard']                           = 'pudir_dashboard';
$route['pudir/pkl']                                 = 'pudir_pkl';
$route['pudir/pkl/(:any)']                          = 'pudir_pkl/index/$1';


/*=================KETUPLAK ROLE======================*/
$route['ketuplak/dashboard']                        = 'ketuplak_dashboard';
$route['ketuplak/pkl']                              = 'ketuplak_pkl';
$route['ketuplak/pkl/(:any)']                       = 'ketuplak_pkl/index/$1';




$route['test'] = 'admin_registrations/generatedata';

$route['404_override'] = 'err';
$route['translate_uri_dashes'] = FALSE;
