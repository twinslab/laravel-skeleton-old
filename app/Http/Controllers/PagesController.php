<?php namespace App\Http\Controllers;

use App\Http\Requests\SubmitContactFormRequest;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

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
                ->to('sample@example.com');

            // Mandrill-related headers
            $message->getHeaders()->addTextHeader('X-MC-Subaccount', '');
            $message->getHeaders()->addTextHeader('X-MC-SigningDomain', '');
        });

        Session::flash('alert-success', Lang::get('pages/contact.form.success'));

        return redirect()->route('contact');
    }

}
