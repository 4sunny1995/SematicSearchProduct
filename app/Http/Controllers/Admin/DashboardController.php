<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\DashBoardRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getBroader(Request $request)
    {
        $limit = $request->limit;
        $repo = new DashBoardRepository();
        $result = $repo -> getBroader($limit);
        return $result;
    }
    public function getNarrower(Request $request)
    {
        $limit = $request->limit;
        $repo = new DashBoardRepository();
        $result = $repo -> getNarrower($limit);
        return $result;
    }
    public function getHistory(Request $request)
    {
        $limit = $request->limit;
        $repo = new DashBoardRepository();
        $result = $repo -> getHistory($limit);
        return $result;
    }
}
