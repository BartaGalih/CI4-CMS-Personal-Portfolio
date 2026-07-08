<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('sendmessages', 'Home::sendMessages');

$routes->get('admin/login', 'Auth::login');
$routes->post('admin/login', 'Auth::login');
$routes->get('admin/logout', 'Auth::logout');

// Admin Dashboard
$routes->get('admin/dashboard', 'Dashboard::index');

// Admin Profile Routes
$routes->get('admin/profil', 'Profil::index');
$routes->post('admin/profil/update', 'Profil::update');
// Admin Skills Routes
$routes->get('admin/skills', 'Skills::index');
$routes->get('admin/skills/add', 'Skills::add');
$routes->post('admin/skills/add', 'Skills::add');
$routes->get('admin/skills/edit/(:num)', 'Skills::edit/$1');
$routes->post('admin/skills/edit/(:num)', 'Skills::edit/$1');
$routes->get('admin/skills/delete/(:num)', 'Skills::delete/$1');

// Admin Pendidikan Routes
$routes->get('admin/pendidikan', 'Pendidikan::index');
$routes->get('admin/pendidikan/add', 'Pendidikan::add');
$routes->post('admin/pendidikan/add', 'Pendidikan::add');
$routes->get('admin/pendidikan/edit/(:num)', 'Pendidikan::edit/$1');
$routes->post('admin/pendidikan/edit/(:num)', 'Pendidikan::edit/$1');
$routes->get('admin/pendidikan/delete/(:num)', 'Pendidikan::delete/$1');

// Admin Pekerjaan Routes
$routes->get('admin/pekerjaan', 'Pekerjaan::index');
$routes->get('admin/pekerjaan/add', 'Pekerjaan::add');
$routes->post('admin/pekerjaan/add', 'Pekerjaan::add');
$routes->get('admin/pekerjaan/edit/(:num)', 'Pekerjaan::edit/$1');
$routes->post('admin/pekerjaan/edit/(:num)', 'Pekerjaan::edit/$1');
$routes->get('admin/pekerjaan/delete/(:num)', 'Pekerjaan::delete/$1');

// Admin Projects Routes
$routes->get('admin/projects', 'Projects::index');
$routes->get('admin/projects/add', 'Projects::add');
$routes->post('admin/projects/add', 'Projects::add');
$routes->get('admin/projects/edit/(:num)', 'Projects::edit/$1');
$routes->post('admin/projects/edit/(:num)', 'Projects::edit/$1');
$routes->get('admin/projects/delete/(:num)', 'Projects::delete/$1');

// Admin Messages Routes
$routes->get('admin/messages', 'Messages::index');
$routes->get('admin/messages/detail/(:num)', 'Messages::detail/$1');
$routes->get('admin/messages/read/(:num)', 'Messages::markRead/$1');
$routes->get('admin/messages/unread/(:num)', 'Messages::markUnread/$1');
$routes->get('admin/messages/delete/(:num)', 'Messages::delete/$1');

// Redirect admin root to dashboard
$routes->get('admin', 'Dashboard::index');
