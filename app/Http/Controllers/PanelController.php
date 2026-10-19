<?php

namespace App\Http\Controllers;

use App\Helpers\PanelHelper;
use App\Models\Access;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function GetAccessView()
    {
        return view('accessor');
    }

    public function GetPanelView()
    {
        return view('panel');
    }

    public function Connection(Request $request)
    {
        $access = $request->attributes->get('access');

        return self::Response(true, 'Success', 200, [
            'valid_until' => now()->diffInMinutes($access->valid_until),
        ]);
    }

    public function ValidateAccess(Request $request, string $url)
    {
        $access = Access::where('url', $url)
            ->where('valid_until', '>', now())
            ->first();

        if (!$access || !hash_equals($access->token, hash('sha512', $request->input('token', '')))) {
            return self::Response(false, 'Invalid access key', 401);
        }

        return response()->json(['success' => true])
            ->cookie('token', $request->input('token'), 60, '/', null, true, true, false, 'Strict');
    }

    public function GetAllData()
    {
        $data = PanelHelper::getAllData();
        if (is_numeric($data))
            return self::Response(false, 'Error code: ' . $data, 400);

        return $data;
    }
}
