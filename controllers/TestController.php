<?php

namespace app\controllers;

use ti2018b\phpmvc\Controller;

class TestController extends Controller
{
    public function index()
    {
        $params = [
            'name' => "Mohammad Aris Saputra"
        ];

        // Eksekusi code di sini
        return $this->render('test', $params);
    }
}
