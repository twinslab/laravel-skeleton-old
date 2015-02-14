<?php namespace App\Http\Controllers;

use Lang, Mail, Session;
use App\Http\Requests\SubmitContactFormRequest;

class PagesController extends Controller {

    /**
     * GET /
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $data = [
            'pageTitle' => Lang::get('pages/home.page_title'),
            'pageDesc' => Lang::get('pages/home.page_desc'),
        ];

        return view('pages.home', $data);
    }

    /**
     * GET /about
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $data = [
            'pageTitle' => Lang::get('pages/about.page_title'),
            'pageDesc' => Lang::get('pages/about.page_desc'),
        ];

        return view('pages.about', $data);
    }

    /**
     * GET /contact
     *
     * @return \Illuminate\View\View
     */
    public function getContact()
    {
        $data = [
            'pageTitle' => Lang::get('pages/contact.page_title'),
            'pageDesc' => Lang::get('pages/contact.page_desc'),
        ];

        return view('pages.contact', $data);
    }

    /**
     * POST /contact
     *
     * @param SubmitContactFormRequest $request
     * @return \Illuminate\View\View
     */
    public function postContact(SubmitContactFormRequest $request)
    {
        $input = $request->all();

        Mail::send('emails.contact-form', $input, function($message) use ($input)
        {
            $message->subject('Contact Form Message')
                ->from($input['email'], $input['name'])
                ->to(env('EMAIL_ADDRESS_TO'));

            // Mandrill-related headers
            $message->getHeaders()->addTextHeader('X-MC-Subaccount', '');
            $message->getHeaders()->addTextHeader('X-MC-SigningDomain', '');
        });

        Session::flash('alert-success', Lang::get('pages/contact.form.success'));

        return redirect()->route('contact');
    }

}
