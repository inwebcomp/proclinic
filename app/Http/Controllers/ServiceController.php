<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show($service = null)
    {
        $service = Service::findBySlug($service)->firstOrFail();

        $breadcrumbs = Breadcrumbs::service($service);

        $children = $service->children()->withTranslation()->with('images')->get();

        return view('pages.service', [
            'service'     => $service,
            'children'    => $children,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle'   => $service->title,
            'meta'        => optional($service->metadata)->toArray(),
        ]);
    }
}
