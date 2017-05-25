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

        $zip = new \ZipArchive;
        $zip->open(base_path().'/runtime/filename.odt');
        $zip->deleteName('content.xml');
        $zip->extractTo(base_path().'/runtime/filename');

        $zip->addFile(base_path().'/runtime/filename/content.xml');
        $zip->close();
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
        /*$path2 = base_path().'/runtime/filename/content.xml';
        /*$b = file_get_contents($path2);
        $xml = new \SimpleXMLElement(file_get_contents($path2));
        $ns = $xml->getNamespaces(true);
        $xml->registerXPathNamespace('office', $ns['office']);
        $texts = $xml->xpath('/office:document-content/office:body/office:text');
        foreach ($texts as $text){
            $f = $text->asXML();
        }*/
        //$d= $sel[0]->asXML();
        $a = [];

        /*$doc = new \DOMDocument();
        $res = $doc->loadXML(file_get_contents($path2));
        $tags = $doc->getElementsByTagName('span');
        $var = false;
        foreach ($tags as $tag){

            /*if($tag->nodeValue === '{{') {
                $tag->nodeValue = '';
                $var = true;
                continue;
            }
            if($var){
                $tag->nodeValue = 'Значение';
            }
            if($tag->nodeValue === '}}') {
                $tag->nodeValue = '';
                $var = true;
                continue;
            }*/
           /* $span[] = $tag->nodeValue;

        }
        $tags = $doc->getElementsByTagName('p');

        foreach ($tags as $tag){
            $p[] = $tag->nodeValue;

        }
        $doc->saveXML();
        $doc->save($path2);

        $p = [];*/
        $p = [];

    }
    
    //
}
