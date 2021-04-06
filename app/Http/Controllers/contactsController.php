<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\Contact;

class contactsController extends Controller
{
    public $helper;
    public $model;
    public function __construct()
    {
        $this->helper = new Helper();
        $this->model = new Contact();
    }
}
