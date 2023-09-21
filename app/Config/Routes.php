<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout', ['filter' => 'authGuard']);
$routes->post('/login/auth', 'Login::loginAuth');

$routes->get('/admin', 'Admin::index', ['filter' => 'authGuard']);
$routes->get('/admin/index.html', 'Admin::index', ['filter' => 'authGuard']);
$routes->get('/admin/nilai/(:segment).html', 'Nilai::index/$1', ['filter' => 'authGuard']);
$routes->get('/admin/nilai/r_jadwal/(:segment).html', 'Nilai::getJadwalAjax/$1', ['filter' => 'authGuard']);
// entri nilai /tipe/id_kelas/kodepel/
$routes->get('/admin/nilai/harian/entri/(:num)/(:num)/(:segment).html', 'Nilai::entriNilai/$1/$2/$3', ['filter' => 'authGuard']);
$routes->post('/admin/nilai/harian/entri/proses', 'Nilai::prosesNilai', ['filter' => 'authGuard']);


