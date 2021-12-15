<?php

namespace app\controllers;

use ti2018b\phpmvc\Application;
use ti2018b\phpmvc\Controller;
use ti2018b\phpmvc\Request;
use ti2018b\phpmvc\Response;
use app\models\ContactForm;

/**
 * Class SiteController
 * 
 * @author Aris Saputra <arissaputra362@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "The Code For Code"
        ];

        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();

        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->save()) {
                Application::$app->session->setFlash('success', 'Data Saved');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}
