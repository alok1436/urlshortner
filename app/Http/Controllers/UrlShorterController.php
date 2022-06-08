<?php

namespace App\Http\Controllers;
use Str;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlShorterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = Url::latest()->first();
        return view('home', compact('shortLinks'));
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'link' => 'required'
        ]);
        $link = explode('/',$request->link);
        array_pop($link);
        $link = implode('/', $link);
        $url = Url::where('url',$link)->first();
        if(!$url){

            $url = Url::create([
                'url'=> $link,
                'code'=>Str::random(5),
            ]);
        }

        session()->put('generatedLink', url($url->code));
        return redirect()->route('home')->with('success', 'Link Generated Successfully!');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortLink($code)
    {
        $find = Url::where('code', $code)->first();
        if(!$find){
            abort(404);
        }
        $find->increment('count');
        return redirect($this->addhttp($find->url));
    }

    public function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "//" . $url;
        }
        return $url;
    }
}
