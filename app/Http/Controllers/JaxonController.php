<?php

namespace App\Http\Controllers;

use Jaxon\Laravel\Jaxon;
use Lagdo\DbAdmin\App\Package as DbAdmin;

class JaxonController extends Controller
{
    public function dbadmin(Jaxon $jaxon)
    {
        // Set the DbAdmin package as ready
        $dbadmin = $jaxon->package(DbAdmin::class);
        $dbadmin->ready();

        // Print the page
        return view('dbadmin', [
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "DbAdmin",
            // DbAdmin home
            'pageContent' => $dbadmin->getHtml(),
        ]);
    }
}
