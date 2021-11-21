<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return view('auth.login');
    }
});

Auth::routes();
Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('comptes', 'CompteController');
Route::get('/comptes/{id}/destroy', 'CompteController@destroy')->name('compte.destroy');
Route::resource('quotas', 'QuotaController');
Route::post('/quota.filter', 'QuotaController@index')->name('quota.filter');
Route::get('/quotas/{id}/destroy', 'QuotaController@destroy')->name('quota.destroy');
//-----------------------------------------------------------------------------------
Route::resource('demandes', 'DemandeController');
//-----------------------------------------------------------------------------------
Route::resource('reservations', 'ReservationController');
Route::get('/reservations/{id}/destroy', 'ReservationController@destroy')->name('reservation.destroy');
Route::get('/reservations/{id}/send', 'ReservationController@send')->name('reservation.send');
Route::get('/reservations/{id}/valider', 'ReservationController@valider')->name('reservation.valider');
Route::get('/reservations/{id}/refuser', 'ReservationController@refuser')->name('reservation.refuser');
Route::get('/reservations/{id}/vols', 'ReservationController@vols')->name('reservations.vols');
Route::post('/reservations/{id}/reserver', 'ReservationController@reserver')->name('reservations.reserver');
Route::get('/reservations/{id}/paiement', 'ReservationController@paiement')->name('reservations.paiement');
Route::post('/reservations/{id}/payer', 'ReservationController@payer')->name('reservations.payer');
Route::get('/reservations/{id}/ticket', 'ReservationController@ticket')->name('reservations.ticket');
//-----------------------------------------------------------------------------------
Route::resource('reclamations', 'ReclamationController');
Route::get('/reclamations/{id}/destroy', 'ReclamationController@destroy')->name('reclamation.destroy');
Route::get('/reclamations/{id}/demarrer', 'ReclamationController@demarrer')->name('reclamation.demarrer');
Route::get('/reclamations/{id}/cloturer', 'ReclamationController@cloturer')->name('reclamation.cloturer');
Route::resource('justificatifs', 'JustificatifController');
Route::get('/justificatifs/{id}/destroy', 'JustificatifController@destroy')->name('justificatif.destroy');
Route::get('/justificatifs/{id}/valider', 'JustificatifController@valider')->name('reclamation.valider');
Route::get('/justificatifs/{id}/refuser', 'JustificatifController@refuser')->name('reclamation.refuser');

//-----------------------------------------------------------------------------
Route::resource('familles', 'FamilleController');
Route::get('/familles/{id}/destroy', 'FamilleController@destroy')->name('famille.destroy');
Route::get('/familles/{id}/valider', 'FamilleController@valider')->name('famille.valider');
Route::get('/familles/{id}/refuser', 'FamilleController@refuser')->name('famille.refuser');
//------------------------------------------------------------------------------
Route::resource('fonctions', 'FonctionController');
//------------------------------------------------------------------------------
Route::resource('fonctionsquotas', 'FonctionQuotaController');
Route::get('/fonctionsquotas/{id}/destroy', 'FonctionQuotaController@destroy')->name('fonctionsquotas.destroy');
