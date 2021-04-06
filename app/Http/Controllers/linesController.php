<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\Line;

class linesController extends Controller
{
    public $helper;
    public $model;
    public function __construct()
    {
        $this->helper = new Helper();
        $this->model = new Line();
    }

    public function index()
    {
        return $this->helper->responseJson(1, 'تمت العمليه بنجاح', $faculty = $this->model->with('trip')->get());
    }


}
