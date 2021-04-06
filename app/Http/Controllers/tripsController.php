<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\Trip;

class tripsController extends Controller
{
    public $helper;
    public $model;
    public function __construct()
    {
        $this->helper = new Helper();
        $this->model = new Trip();
    }

    public function index()
    {
        return $this->helper->responseJson(1, 'تمت العمليه بنجاح', $this->model->get());
    }
}
