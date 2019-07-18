<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function show($doctor = null)
    {
        $doctor = Doctor::findBySlug($doctor)->firstOrFail();

        $breadcrumbs = Breadcrumbs::doctor($doctor);

        return view('pages.doctor', [
            'doctor'     => $doctor,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle'   => $doctor->title,
            'meta'        => $doctor->metadata->toArray(),
        ]);
    }
}
