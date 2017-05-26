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
        

        if($request->isMethod('post')){
            if($request->hasFile('odt')) {
                $file = $request->file('odt');
                $file->move(base_path().'/runtime','filename.odt');
                $zip = new \ZipArchive;
                $zip->open(base_path().'/runtime/filename.odt');
                $content = $zip->getFromName('content.xml');
                $zip->deleteName('content.xml');
                $contentPath = base_path().'/runtime/content.xml';
                $doc = new \DOMDocument();
                $res = $doc->loadXML($content);
                $spans = $doc->getElementsByTagName('span');
                $inVarible = false;
                foreach ($spans as $item) {
                    $arr['span'][] = $item;
                        $item->nodeValue = 'dfgdfgdfgdfg ';

                }
                $doc->saveXML();
                $doc->save($contentPath);
                $zip->addFile($contentPath, 'content.xml');
                $zip->close();
            }
        }
    }
    
    //
}
