<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainRequest;
use App\Models\Url;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create(MainRequest $request)
    {
        $url = Url::where('url', $request->url);

        if (!$url->exists()) {
            $random = substr(md5(time()), 0, 6);
            $tinyUrl = Url::create([
                'url' => $request->url,
                'unique_hash' => $random
            ]);
        }else {
            $tinyUrl = $url->first();
        }

        return view('welcome', compact('tinyUrl'));
    }

    public function redirect($id)
    {
        $url = Url::where('unique_hash', $id);
        if ($url->exists()) {
            return redirect($url->first()->url);
        }else {
            return redirect('/');
        }
    }
}
