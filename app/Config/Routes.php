<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->post('/', 'Auth::login');
$routes->get('/deconnexion', 'Auth::logout');

$routes->group('super-admin', ['filter' => 'superAdmin'], function ($routes) {
    $routes->get('/', 'SuperAdmin::index');
    $routes->post('modifer/mot-de-passe', 'Utilisateurs::changePassword');
    $routes->group('utilisateurs', function ($routes) {
        $routes->get('/', 'Utilisateurs::list');
        $routes->post('/', 'Utilisateurs::create');
        $routes->get('supprimer', 'Utilisateurs::delete');
    });

    $routes->group('chauffeurs', function ($routes) {
        $routes->get('/', 'Chauffeurs::list');
        $routes->post('/', 'Chauffeurs::create');
        $routes->get('supprimer', 'Chauffeurs::delete');
        $routes->get('modifier/(:segment)', 'Chauffeurs::edit/$1');
        $routes->post('modifier', 'Chauffeurs::save');
    });

    $routes->group('transporteurs', function ($routes) {
        $routes->get('/', 'Transporteurs::list');
        $routes->post('/', 'Transporteurs::create');
        $routes->get('supprimer', 'Transporteurs::delete');
        $routes->get('modifier/(:segment)', 'Transporteurs::edit/$1');
        $routes->post('modifier', 'Transporteurs::save');
    });

    $routes->group('tracteurs', function ($routes) {
        $routes->get('/', 'Tracteurs::list');
        $routes->post('/', 'Tracteurs::create');
        $routes->get('supprimer', 'Tracteurs::delete');
        $routes->get('modifier/(:segment)', 'Tracteurs::edit/$1');
        $routes->post('modifier', 'Tracteurs::save');
    });

    $routes->group('remorques', function ($routes) {
        $routes->get('/', 'Remorques::list');
        $routes->post('/', 'Remorques::create');
        $routes->get('supprimer', 'Remorques::delete');
        $routes->get('modifier/(:segment)', 'Remorques::edit/$1');
        $routes->post('modifier', 'Remorques::save');
    });

    $routes->group('garage', function ($routes) {
        $routes->get('/', 'Garage::index');
        $routes->post('/', 'Garage::save');
        $routes->get('supprimer/(:segment)', 'Garage::delete/$1');
    });

    $routes->group('carburant', function ($routes) {
        $routes->get('/', 'Carburant::index');
        $routes->post('/', 'Carburant::save');
        $routes->get('supprimer/(:segment)', 'Carburant::delete/$1');
    });

    $routes->group('livraisons', function ($routes) {
        $routes->get('/', 'Livraisons::dashboard');
        $routes->post('/', 'Livraisons::create');
        $routes->get('supprimer', 'Livraisons::delete');
        $routes->get('modifier/(:segment)', 'Livraisons::edit/$1');
        $routes->post('modifier', 'Livraisons::save');
    });

    $routes->group('transferts', function ($routes) {
        $routes->get('/', 'Transferts::dashboard');
        $routes->post('/', 'Transferts::create');
        $routes->get('supprimer', 'Transferts::delete');
        $routes->get('modifier/(:segment)', 'Transferts::edit/$1');
        $routes->post('modifier', 'Transferts::save');
    });

    $routes->group('exports', function ($routes) {
        $routes->get('/', 'Exports::dashboard');
        $routes->post('/', 'Exports::create');
        $routes->get('supprimer', 'Exports::delete');
        $routes->get('modifier/(:segment)', 'Exports::edit/$1');
        $routes->post('modifier', 'Exports::save');
    });


    $routes->group('rapports', function ($routes) {
        $routes->get('/', 'Rapports::index');
        $routes->post('operations', 'Rapports::genOps');
        $routes->post('garage', 'Rapports::genGarage');
        $routes->post('carburant', 'Rapports::genCarb');
        $routes->post('tracteurs', 'Rapports::genTrac');
        $routes->post('class', 'Rapports::genClass');
    });

    $routes->get('archives', 'Archives::index');
    $routes->post('archives', 'Archives::generate');
    $routes->get('suivi-flotte', 'Suivi::index');
});

//admin
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Utilisateurs::list');
    $routes->post('modifer/mot-de-passe', 'Utilisateurs::changePassword');
    $routes->group('utilisateurs', function ($routes) {
        $routes->get('/', 'Utilisateurs::list');
        $routes->post('/', 'Utilisateurs::create');
        $routes->get('supprimer', 'Utilisateurs::delete');
    });

    $routes->group('chauffeurs', function ($routes) {
        $routes->get('/', 'Chauffeurs::list');
        $routes->post('/', 'Chauffeurs::create');
        $routes->get('supprimer', 'Chauffeurs::delete');
        $routes->get('modifier/(:segment)', 'Chauffeurs::edit/$1');
        $routes->post('modifier', 'Chauffeurs::save');
    });

    $routes->group('tracteurs', function ($routes) {
        $routes->get('/', 'Tracteurs::list');
        $routes->post('/', 'Tracteurs::create');
        $routes->get('supprimer', 'Tracteurs::delete');
        $routes->get('modifier/(:segment)', 'Tracteurs::edit/$1');
        $routes->post('modifier', 'Tracteurs::save');
    });

    $routes->group('remorques', function ($routes) {
        $routes->get('/', 'Remorques::list');
        $routes->post('/', 'Remorques::create');
        $routes->get('supprimer', 'Remorques::delete');
        $routes->get('modifier/(:segment)', 'Remorques::edit/$1');
        $routes->post('modifier', 'Remorques::save');
    });

    $routes->group('garage', function ($routes) {
        $routes->get('/', 'Garage::index');
        $routes->post('/', 'Garage::save');
        $routes->get('supprimer/(:segment)', 'Garage::delete/$1');
    });

    $routes->group('carburant', function ($routes) {
        $routes->get('/', 'Carburant::index');
        $routes->post('/', 'Carburant::save');
        $routes->get('supprimer/(:segment)', 'Carburant::delete/$1');
    });

    $routes->group('livraisons', function ($routes) {
        $routes->get('/', 'Livraisons::dashboard');
        $routes->post('/', 'Livraisons::create');
        $routes->get('supprimer', 'Livraisons::delete');
        $routes->get('modifier/(:segment)', 'Livraisons::edit/$1');
        $routes->post('modifier', 'Livraisons::save');
    });

    $routes->group('transferts', function ($routes) {
        $routes->get('/', 'Transferts::dashboard');
        $routes->post('/', 'Transferts::create');
        $routes->get('supprimer', 'Transferts::delete');
        $routes->get('modifier/(:segment)', 'Transferts::edit/$1');
        $routes->post('modifier', 'Transferts::save');
    });

    $routes->group('exports', function ($routes) {
        $routes->get('/', 'Exports::dashboard');
        $routes->post('/', 'Exports::create');
        $routes->get('supprimer', 'Exports::delete');
        $routes->get('modifier/(:segment)', 'Exports::edit/$1');
        $routes->post('modifier', 'Exports::save');
    });

    $routes->get('suivi-flotte', 'Suivi::index');
});

//OPS
$routes->group('ops', ['filter' => 'ops'], function ($routes) {

    $routes->get('/', 'Livraisons::dashboard');
    $routes->post('modifer/mot-de-passe', 'Utilisateurs::changePassword');

    $routes->group('livraisons', function ($routes) {
        $routes->get('/', 'Livraisons::dashboard');
        $routes->post('/', 'Livraisons::create');
        $routes->get('supprimer', 'Livraisons::delete');
        $routes->get('modifier/(:segment)', 'Livraisons::edit/$1');
        $routes->post('modifier', 'Livraisons::save');
    });

    $routes->group('transferts', function ($routes) {
        $routes->get('/', 'Transferts::dashboard');
        $routes->post('/', 'Transferts::create');
        $routes->get('supprimer', 'Transferts::delete');
        $routes->get('modifier/(:segment)', 'Transferts::edit/$1');
        $routes->post('modifier', 'Transferts::save');
    });

    $routes->group('exports', function ($routes) {
        $routes->get('/', 'Exports::dashboard');
        $routes->post('/', 'Exports::create');
        $routes->get('supprimer', 'Exports::delete');
        $routes->get('modifier/(:segment)', 'Exports::edit/$1');
        $routes->post('modifier', 'Exports::save');
    });

    $routes->get('archives', 'Archives::index');
    $routes->post('archives', 'Archives::generate');
});

//facturation
$routes->group('facturation', ['filter' => 'facturation'], function ($routes) {
    $routes->get('/', 'Rapports::index');
    $routes->post('modifer/mot-de-passe', 'Utilisateurs::changePassword');
    $routes->group('rapports', function ($routes) {
        $routes->get('/', 'Rapports::index');
        $routes->post('operations', 'Rapports::genOps');
        // $routes->post('garage', 'Rapports::genGarage');
        // $routes->post('carburant', 'Rapports::genCarb');
        // $routes->post('tracteurs', 'Rapports::genTrac');
    });
});

//garage
$routes->group('garagiste', ['filter' => 'garage'], function ($routes) {
    $routes->get('/', 'Garage::index');
    $routes->post('modifer/mot-de-passe', 'Utilisateurs::changePassword');
    $routes->group('garage', function ($routes) {
        $routes->get('/', 'Garage::index');
        $routes->post('/', 'Garage::save');
        $routes->get('supprimer/(:segment)', 'Garage::delete/$1');
    });
});

// g_carb
$routes->group('g_carburant', ['filter' => 'g_carburant'], function ($routes) {
    $routes->get('/', 'Carburant::index');
    $routes->post('modifer/mot-de-passe', 'Utilisateurs::changePassword');
    $routes->group('carburant', function ($routes) {
        $routes->get('/', 'Carburant::index');
        $routes->post('/', 'Carburant::save');
        $routes->get('supprimer/(:segment)', 'Carburant::delete/$1');
    });
});

$routes->get('line', 'Graph::line');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
