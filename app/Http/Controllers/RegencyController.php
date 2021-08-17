<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegencyController extends Controller
{
    // http://localhost/regencies?id=abcd-1234-defg-5678
    // http://localhost/regencies?name=surabaya
    public function index(Request $request)
    {
        $regencies = Regency::select('id', 'name');

        if ($request->id) {
            $regencies = $regencies->where('id', $request->id); // abcd-1234-defg-5678
        }
        if ($request->name) {
            $regencies = $regencies->where('name', $request->name); // surabaya
        }

        $regencies = $regencies->get()->toArray();

        return response()->json(['regencies' => $regencies]);
    }

    public function test()
    {
        $transactionDateTime = '2021/08/16';

        $transactionDateTime = Carbon::parse($transactionDateTime)
            ->startOfMonth()
            ->addWeek()
            ->endOfDay()
            ->format('Y-m-d H:i:s');

        ddd($transactionDateTime);
    }
}
