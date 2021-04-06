<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\Station;

class stationsController extends Controller
{
    public $helper;
    public $model;
    public function __construct()
    {
        $this->helper = new Helper();
        $this->model = new Station();
    }

    public function index()
    {
        return $this->helper->responseJson(1, 'تمت العمليه بنجاح', $this->model->get());
    }
}
