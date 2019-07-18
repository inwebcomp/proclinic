<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $canonical = false;

        $services = [
            [
                'icon' => 'decay',
                'img'  => '2.jpg',
                'name' => 'Профессиональная диагностика',
                'list' => true,
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
            [
                'icon' => 'tooth',
                'img'  => '2.jpg',
                'name' => 'Профессиональная диагностика',
                'list' => true,
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
            [
                'icon' => 'tooth1',
                'img'  => '3.jpg',
                'name' => 'Профессиональная диагностика',
                'list' => true,
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
            [
                'icon' => 'brackets',
                'img'  => '4.jpg',
                'list' => false,
                'name' => 'Профессиональная диагностика',
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
            [
                'icon' => 'dentures',
                'img'  => '5.jpg',
                'name' => 'Профессиональная диагностика',
                'list' => false,
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
            [
                'icon' => 'tooth2',
                'img'  => '6.jpg',
                'name' => 'Профессиональная диагностика',
                'list' => false,
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
            [
                'icon' => 'tooth4',
                'img'  => '7.jpg',
                'name' => 'Профессиональная диагностика',
                'list' => false,
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
            [
                'icon' => 'tooth3',
                'img'  => '8.jpg',
                'name' => 'Профессиональная диагностика',
                'list' => false,
                'text' => 'Консультации всех наших специалистов в области терапии, ортопедии, ортодонтологии'
            ],
        ];

        $advantages = [
            [
                'icon'  => 'tooth-whitening',
                'count' => '01',
                'name'  => 'Материалы и оборудование',
                'text'  => 'Десятилетний опыт создания концепции
                        индивидуального лечения для сохранения
                        красоты и здоровья ваших зубов'
            ],
            [
                'icon'  => 'doctor',
                'count' => '02',
                'name'  => 'Материалы',
                'text'  => 'Десятилетний опыт создания концепции
                        индивидуального лечения для сохранения
                        красоты и здоровья ваших зубов'
            ],
            [
                'icon'  => 'cardiogram',
                'count' => '03',
                'name'  => 'Материалы',
                'text'  => 'Десятилетний опыт создания концепции
                        индивидуального в'
            ],
            [
                'classMod' => 'advantage--lg',
                'icon'     => 'technology',
                'count'    => '04',
                'name'     => 'Материалы',
                'text'     => 'Десятилетний опыт создания концепции
                        индивидуального в'
            ],
            [
                'classMod' => 'advantage--lg',
                'icon'     => 'respect',
                'count'    => '05',
                'name'     => 'Материалы',
                'text'     => 'Десятилетний опыт создания концепции
                        индивидуального в'
            ],
        ];

        return view('pages.index', compact('services', 'advantages', 'canonical'));
    }

    public function show($page)
    {
        $page = Page::findBySlug($page)->firstOrFail();

        return view('pages.page', [
            'page'        => $page,
            'breadcrumbs' => Breadcrumbs::page($page),
            'pageTitle'   => $page->title,
            'meta'        => $page->metadata->toArray(),
        ]);
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function doctor()
    {
        return view('pages.doctor');
    }
}
