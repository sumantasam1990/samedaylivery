<?php

namespace App\Http\Controllers;

use App\Mail\Contactus;
use App\Models\Faqcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;


class PagesController extends Controller
{
    public function home()
    {
        return view('staticpages.index', ['title' => 'Welcome to Same daylivery']);
    }

    public function how_it_works()
    {
        return view('staticpages.howitworks', ['title' => 'How It Works - Same daylivery']);
    }

    public  function benefits()
    {
        return view('staticpages.benefits', ['title' => 'Benefits - Same daylivery']);
    }

    public  function about()
    {
        return view('staticpages.about', ['title' => 'About Us - Same daylivery']);
    }

    public  function pricing()
    {
        return view('staticpages.pricing', ['title' => 'Pricing - Same daylivery']);
    }

    public function terms()
    {
        return view('staticpages.terms', ['title' => 'Terms & Conditions - Same daylivery']);
    }

    public function privacy()
    {
        return view('staticpages.privacy', ['title' => 'Privacy & Policy - Same daylivery']);
    }

    public function faq()
    {
        $faqcategory = Faqcategory::all()->where('status', '=', 0);

        return view('staticpages.faq', ['title' => 'FAQ', 'faqcategory' => $faqcategory]);
    }

    public function faqs_info($id)
    {
        try {
            $faqs = DB::table('faqs','f')->join('faqscategories', 'f.faqscategory_id', '=', 'faqscategories.id')->where('f.status', '=', '0')->where('f.faqscategory_id', '=', $id)->get();

            return view('staticpages.faqs', ['title' => $faqs[0]->title, 'faqs' => $faqs]);

        } catch (\Throwable $th) {
            return view('staticpages.faqs', ['title' => 'Not found', 'faqs' => [], 'notFound' => 'Sorry! No data found.']);
        }

    }

    public function contact()
    {
        return view('staticpages.contact', ['title' => 'Contact us']);
    }

    public function sendemailToContact(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'nam_e' => 'required',
            'msg' => 'required'
        ]);

        $mailData = [
            'email' => $request->email,
            'phone' => $request->phone,
            'nam_e' => $request->nam_e,
            'msg' => $request->msg
        ];

        try {
            $this->sendEmail($mailData);
            return back()
                ->with('msg', 'Your email has been sent successfully.');
        } catch (\Throwable $th) {
            return back()
                ->with('err', 'Error! ' . $th->getMessage());
        }

    }

    private function sendEmail($mailData): void
    {//Mail::to($email)->send(new Contactus($mailData));
        Mail::to('hello@samedaylivery.com')->queue(new Contactus($mailData));

        response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }
}
