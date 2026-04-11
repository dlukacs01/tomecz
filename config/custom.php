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
        'videos' => 'Biztosan törölni szeretnéd ezt a videót?',
        'exhibitions' => 'Biztosan törölni szeretnéd ezt a kiállítást?',
        'stories' => 'Biztosan törölni szeretnéd ezt a hírt?'
    ),
    'flash' => array(
        'users' => array(
            'update' => 'A felhasználó frissítése sikeres volt.',
        ),
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
        'videos' => array(
            'store' => 'A videó létrehozása sikeres volt.',
            'update' => 'A videó frissítése sikeres volt.',
            'destroy' => 'A videó törlése sikeres volt.'
        ),
        'exhibitions' => array(
            'store' => 'A kiállítás feltöltése sikeres volt.',
            'update' => 'A kiállítás frissítése sikeres volt.',
            'destroy' => 'A kiállítás törlése sikeres volt.'
        ),
        'stories' => array(
            'store' => 'A hír létrehozása sikeres volt.',
            'update' => 'A hír frissítése sikeres volt.',
            'destroy' => 'A hír törlése sikeres volt.'
        ),
    ),
    'paths' => array(
        'projects' => array(
            'upload' => 'app/public/images/projects',
            'public' => 'storage/images/projects',
            'delete' => 'images/projects'
        ),
        'photos' => array(
            'upload' => 'app/public/images/photos',
            'public' => 'storage/images/photos',
            'delete' => 'images/photos'
        ),
        'videos' => array(
            'upload' => 'app/public/images/videos',
            'public' => 'storage/images/videos',
            'delete' => 'images/videos'
        ),
        'exhibitions' => array(
            'upload' => 'app/public/images/exhibitions',
            'public' => 'storage/images/exhibitions',
            'delete' => 'images/exhibitions'
        ),
        'stories' => array(
            'upload' => 'app/public/images/stories',
            'public' => 'storage/images/stories',
            'delete' => 'images/stories'
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
        'videos' => array(
            'height' => 1000,
        ),
        'exhibitions' => array(
            'height' => 1000,
        ),
        'stories' => array(
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
