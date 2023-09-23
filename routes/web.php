<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', [AuthManager::class , 'home'])->name('home');
});
Route::get('/login', [AuthManager::class , 'login'])->name('login');
Route::post('/login', [AuthManager::class , 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class , 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class , 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class , 'logout'])->name('logout');
Route::get('/universities',[AuthManager::class, 'universities'])->name('universities');
Route::post('/universities',[AuthManager::class, 'universitiesPost'])->name('universities.post');
Route::get('/delete_universities/{id}',[AuthManager::class, 'delete_universitiesPost'])->name('delete_universities.post');
Route::get('/live',[AuthManager::class, 'live'])->name('live');
Route::get('/departments',[AuthManager::class, 'departments'])->name('departments');
Route::post('/departments',[AuthManager::class, 'departmentsPost'])->name('departments.post');
Route::get('/delete_departments/{id}',[AuthManager::class, 'delete_departmentsPost'])->name('delete_departments.post');
Route::get('/accounts',[AuthManager::class, 'accounts'])->name('accounts');
Route::post('/accounts',[AuthManager::class, 'accountsPost'])->name('accounts.post');
Route::get('/delete_accounts/{id}',[AuthManager::class, 'delete_accountsPost'])->name('delete_accounts.post');
Route::get('/studies',[AuthManager::class, 'studies'])->name('studies');
Route::post('/studies',[AuthManager::class, 'studiesPost'])->name('studies.post');
Route::get('/delete_studies/{id}',[AuthManager::class, 'delete_studiesPost'])->name('delete_studies.post');
Route::get('/majors',[AuthManager::class, 'majors'])->name('majors');
Route::post('/majors',[AuthManager::class, 'majorsPost'])->name('majors.post');
Route::get('/delete_majors/{id}',[AuthManager::class, 'delete_majorsPost'])->name('delete_majors.post');
Route::get('/depmajors',[AuthManager::class, 'depmajors'])->name('depmajors');
Route::post('/depmajors',[AuthManager::class, 'depmajorsPost'])->name('depmajors.post');
Route::get('/delete_depmajors/{id}',[AuthManager::class, 'delete_depmajorsPost'])->name('delete_depmajors.post');

Route::get('/lecturerss',[AuthManager::class, 'lecturerss'])->name('lecturerss');
Route::post('/lecturerss',[AuthManager::class, 'lecturerssPost'])->name('lecturerss.post');
Route::get('/delete_lecturerss/{id}',[AuthManager::class, 'delete_lecturerssPost'])->name('delete_lecturerss.post');
Route::get('/deplecturerss',[AuthManager::class, 'deplecturerss'])->name('deplecturerss');
Route::post('/deplecturerss',[AuthManager::class, 'deplecturerssPost'])->name('deplecturerss.post');
Route::get('/delete_deplecturerss/{id}',[AuthManager::class, 'delete_deplecturerssPost'])->name('delete_deplecturerss.post');

Route::get('/subjects',[AuthManager::class, 'subjects'])->name('subjects');
Route::post('/subjects',[AuthManager::class, 'subjectsPost'])->name('subjects.post');
Route::get('/delete_subjects/{id}',[AuthManager::class, 'delete_subjectsPost'])->name('delete_subjects.post');
Route::get('/depsubjects',[AuthManager::class, 'depsubjects'])->name('depsubjects');
Route::post('/depsubjects',[AuthManager::class, 'depsubjectsPost'])->name('depsubjects.post');
Route::get('/delete_depsubjects/{id}',[AuthManager::class, 'delete_depsubjectsPost'])->name('delete_depsubjects.post');

Route::get('/students',[AuthManager::class, 'students'])->name('students');
Route::post('/students',[AuthManager::class, 'studentsPost'])->name('students.post');
Route::get('/delete_students/{id}',[AuthManager::class, 'delete_studentsPost'])->name('delete_students.post');
Route::get('/depstudents',[AuthManager::class, 'depstudents'])->name('depstudents');
Route::post('/depstudents',[AuthManager::class, 'depstudentsPost'])->name('depstudents.post');
Route::get('/delete_depstudents/{id}',[AuthManager::class, 'delete_depstudentsPost'])->name('delete_depstudents.post');

Route::get('/channels',[AuthManager::class, 'channels'])->name('channels');
Route::post('/channels',[AuthManager::class, 'channelsPost'])->name('channels.post');
Route::get('/delete_channels/{id}',[AuthManager::class, 'delete_channelsPost'])->name('delete_channels.post');

Route::get('/studentstudy/{id}',[AuthManager::class, 'studentstudy'])->name('studentstudy');
Route::post('/studentstudy/{id}',[AuthManager::class, 'studentstudyPost'])->name('studentstudy.post');
Route::get('/delete_studentstudy/{id}',[AuthManager::class, 'delete_studentstudyPost'])->name('delete_studentstudy.post');
Route::get('/depstudentstudy/{id}',[AuthManager::class, 'depstudentstudy'])->name('depstudentstudy');
Route::post('/depstudentstudy/{id}',[AuthManager::class, 'depstudentstudyPost'])->name('depstudentstudy.post');
Route::get('/delete_depstudentstudy/{id}',[AuthManager::class, 'delete_depstudentstudyPost'])->name('delete_depstudentstudy.post');

Route::get('/ststate/{id}',[AuthManager::class, 'ststate'])->name('ststate');
Route::get('/getdiscussion/{id}',[AuthManager::class, 'getdiscussion'])->name('getdiscussion');
Route::post('/discussionpost/{id} {dicid}',[AuthManager::class, 'discussionpost'])->name('discussionpost');

Route::post('/resyear/{id}',[AuthManager::class, 'resyear'])->name('resyear');
Route::get('/getrestitles/{id}',[AuthManager::class, 'getrestitles'])->name('getrestitles');
Route::post('/restitles/{id}',[AuthManager::class, 'restitles'])->name('restitles');
Route::get('/delete_restitles/{id}',[AuthManager::class, 'delete_restitlesPost'])->name('delete_restitles.post');

Route::get('/getskills/{id}',[AuthManager::class, 'getskills'])->name('getskills');
Route::post('/skills/{id}',[AuthManager::class, 'skills'])->name('skills');
Route::get('/delete_skills/{id}',[AuthManager::class, 'delete_skillsPost'])->name('delete_skills.post');

Route::get('/getsresearches/{id}',[AuthManager::class, 'getsresearches'])->name('getsresearches');
Route::post('/researches/{id}',[AuthManager::class, 'researches'])->name('researches');
Route::get('/delete_researches/{id}',[AuthManager::class, 'delete_researchesPost'])->name('delete_researches.post');

Route::get('/stposition/{id}',[AuthManager::class, 'stposition'])->name('stposition');

Route::post('/state_studentstudy/{id}',[AuthManager::class, 'state_studentstudy'])->name('state_studentstudy');
Route::post('/position_studentstudy/{id}',[AuthManager::class, 'position_studentstudy'])->name('position_studentstudy');
Route::get('/supervisors/{id}',[AuthManager::class, 'supervisors'])->name('supervisors');
Route::post('/supervisors/{id}',[AuthManager::class, 'supervisorsPost'])->name('supervisors.post');
Route::get('/delete_supervisors/{id}',[AuthManager::class, 'delete_supervisorsPost'])->name('delete_supervisors.post');
Route::get('/active_supervisors/{id}',[AuthManager::class, 'active_supervisors'])->name('active_supervisors');


Route::get('/index_filtering',[AuthManager::class, 'index_filtering'])->name('index_filtering');
Route::get('/index_filtering_deps',[AuthManager::class, 'index_filtering_deps'])->name('index_filtering_deps');
Route::get('/index_filtering_accounts',[AuthManager::class, 'index_filtering_accounts'])->name('index_filtering_accounts');
Route::get('/index_filtering_studies',[AuthManager::class, 'index_filtering_studies'])->name('index_filtering_studies');
Route::get('/index_filtering_channels',[AuthManager::class, 'index_filtering_channels'])->name('index_filtering_channels');
Route::get('/index_filtering_majors',[AuthManager::class, 'index_filtering_majors'])->name('index_filtering_majors');
Route::get('/index_filtering_depmajors',[AuthManager::class, 'index_filtering_depmajors'])->name('index_filtering_depmajors');
Route::get('/index_filtering_subjects',[AuthManager::class, 'index_filtering_subjects'])->name('index_filtering_subjects');
Route::get('deps', [AuthManager::class, 'deps'])->name('deps');
Route::get('majs', [AuthManager::class, 'majs'])->name('majs');


