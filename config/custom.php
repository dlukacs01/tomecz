<?php

return array(
    'author' => 'David Lukacs',
    'version' => '1.0',
    'photos' => 2,
    'videos' => 2,
    'alert' => 5000,
    'spinner' => 1000,
    'seeders' => array(
        'photos' => 100,
        'stories' => 100
    ),
    'pagination' => array(
        'photos' => 10,
        'stories' => 10,
        'admin' => 10
    ),
    'social' => array(
        'facebook' => array(
            'full' => 'https://www.facebook.com/dani.tomecz',
            'short' => 'facebook.com/dani.tomecz',
        ),
        'instagram' => array(
            'full' => 'https://www.instagram.com/tomeczdaniel',
            'short' => 'instagram.com/tomeczdaniel'
        ),
        'youtube' => array(
            'full' => 'https://www.youtube.com/@tomeczdaniel617',
            'short' => 'youtube.com/@tomeczdaniel617'
        )
    ),
    'random' => array(
        'filename' => 30
    ),
    'validations' => array(
        'tinymce' => array(
            'min' => 10,
            'max' => 65535
        ),
        'extensions' => ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'webp'],
        'filesize' => array(
            'display' => array(
                'min' => 1, // KB
                'max' => 30 // MB
            ),
            'calculation' => array(
                'min' => 1, // KB
                'max' => 30720 // 30 MB * 1024 = 30720 KB
            )
        )
    ),
    'confirm' => array(
        'categories' => 'Biztosan törölni szeretnéd ezt a kategóriát?',
        'projects' => 'Biztosan törölni szeretnéd ezt a projektet?',
        'photos' => 'Biztosan törölni szeretnéd ezt a képet?',
        'exhibitions' => 'Biztosan törölni szeretnéd ezt a kiállítást?',
    ),
    'flash' => array(
        'categories' => array(
            'store' => 'A kategória létrehozása sikeres volt.',
            'update' => 'A kategória frissítése sikeres volt.',
            'destroy' => 'A kategória törlése sikeres volt.'
        ),
        'projects' => array(
            'store' => 'A projekt létrehozása sikeres volt.',
            'update' => 'A projekt frissítése sikeres volt.',
            'destroy' => 'A projekt törlése sikeres volt.'
        ),
        'photos' => array(
            'store' => 'A műtárgy feltöltése sikeres volt.',
            'update' => 'A műtárgy frissítése sikeres volt.',
            'destroy' => 'A műtárgy törlése sikeres volt.'
        ),
        'exhibitions' => array(
            'store' => 'A kiállítás feltöltése sikeres volt.',
            'update' => 'A kiállítás frissítése sikeres volt.',
            'destroy' => 'A kiállítás törlése sikeres volt.'
        ),
    ),
    'paths' => array(
        'projects' => array(
            'upload' => 'app/public/images/projects',
            'public' => 'storage/images/projects',
            'delete' => 'images/projects'
        ),
        'photos' => array(
            'original' => array(
                'upload' => 'app/public/images/photos/original',
                'public' => 'storage/images/photos/original',
                'delete' => 'images/photos/original'
            ),
            'thumbnail' => array(
                'upload' => 'app/public/images/photos/thumbnail',
                'public' => 'storage/images/photos/thumbnail',
                'delete' => 'images/photos/thumbnail'
            ),
        ),
        'exhibitions' => array(
            'upload' => 'app/public/images/exhibitions',
            'public' => 'storage/images/exhibitions',
            'delete' => 'images/exhibitions'
        ),
    ),
    'sizes' => array(
        'projects' => array(
            'height' => 1000,
        ),
        'photos' => array(
            'original' => array(
                'height' => 1000
            ),
            'thumbnail' => array(
                'height' => 500
            )
        ),
        'exhibitions' => array(
            'height' => 1000,
        ),
    ),
    'keywords' => array(
        'hu' => [
            'tomecz',
            'dániel',
            'galéria',
            'művész',
            'művészet',
            'képzőművész',
            'képzőművészet',
            'kiállítás',
            'kultúra',
            'kortárs',
            'alkotás',
            'alkotó',
            'műtárgy',
            'festmény',
            'papír',
            'installáció',
            'videó',
            'nyomat'
        ],
        'en' => [
            'tomecz',
            'daniel',
            'gallery',
            'artist',
            'art',
            'exhibition',
            'culture',
            'contemporary',
            'artwork',
            'painting',
            'paper',
            'works',
            'installation',
            'video',
            'print'
        ]
    )
);
