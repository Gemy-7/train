<?php

namespace App\Http\Controllers;

use App\Models\Train;
use App\Helper\Helper;
use Illuminate\Http\Request;

class trainsController extends Controller
{
    public $helper;
    public $model;
    public function __construct()
    {
        $this->helper = new Helper();
        $this->model = new Train();
    }
    public function index()
    {
        return $this->helper->responseJson(1, 'تمت العمليه بنجاح', $this->model->get());
    }

    public function create(Request $request)
    {
        $validated = validator()->make($request->all(), [
            'trainid' => 'required|unique:trains|integer',
            'feast' => 'required|in:daily,summeronly,exceptholidays',
            'traintype' => 'required|in:distinctive,upgraded,1stclass,2stclass,sleeping,vip'
        ]);

        if ($validated->fails()) {
            return $this->helper->responseJson(0, $validated->errors()->first());
        }

        $record = $this->model->create($request->all());
        $record->save();
        return $this->helper->responseJson(1, 'تمت العمليه بنجاح');
    }
}