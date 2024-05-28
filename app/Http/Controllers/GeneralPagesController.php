<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Support\StatusReport;
use App\Traits\Address\AddressCode;

class GeneralPagesController extends Controller
{

    public function test() {

        return response("Test Page ! ! ! ");
    }
    public function home() {
        return view('general.index');
    }
    public function about() {
        return view('general.about');
    }
    public function contact_us() {
        return view('general.contact-us');
    }
    public function help() {
        return view('general.help');
    }
}
