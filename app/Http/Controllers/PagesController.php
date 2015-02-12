<?php namespace App\Http\Controllers;

class PagesController extends Controller {

    /**
     * GET /
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * GET /about
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * GET /contact
     *
     * @return \Illuminate\View\View
     */
    public function getContact()
    {
        return view('pages.contact');
    }

    /**
     * POST /contact
     *
     * @return \Illuminate\View\View
     */
    public function postContact()
    {
        //
    }

}
