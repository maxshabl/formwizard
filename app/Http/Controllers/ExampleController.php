<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['auth']]);
    }

    public function auth(Request $request)
    {
        
        return response()->json(['auth_token' => 'sd57sdfK4sdfsd5sdfsd5']);
    }

    public function docxParser()
    {
        return response()->json(['auth_token' => 'sd57sdfK4sdfsd5sdfsd5']);
        $b = [];
    }

    public function odtParser(Request $request)
    {
        $req = $request;
       /* if($request->isMethod('post')){

            if($request->hasFile('odt')) {
                $file = $request->file('odt');
                $file->move(base_path().'/runtime','filename.odt');
                $path = base_path().'/runtime'.'/'.'filename.odt';
                $zip = new \ZipArchive;
                $zip->open($path);
                $zip->extractTo(base_path().'/runtime/filename');
                $zip->close();
                $path2 = base_path().'/runtime/filename/content.xml';
                $xml = \simplexml_load_file($path2);
                //$xml = simplexml_load_file($path2);
                $a = [];
            }
        }*/
        $path2 = base_path().'/runtime/filename/content.xml';
        $b = file_get_contents($path2);
        $xml = $xml = new \SimpleXMLElement(file_get_contents($path2));
        $ns=$xml->getNamespaces(true);
        $c = $xml->asXML();
        $a = [];

    }
    
    //
}
