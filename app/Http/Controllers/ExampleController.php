<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    private $isOpen = '';
    private $isClouse = '';
    private $templVariable = '';

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

    private function isValid()
    {
        switch ($this->isOpen) {
            case '{{':
                return true;
            case '{':
                return true;
            case '':
                return true;
            default:
                abort(404, 'Template variable Error. You should use {{variable}}');
        }

        switch ($this->isClouse) {
            case '}}':
                return true;
            case '}':
                return true;
            case '':
                return true;
            default:
                abort(404, 'Template variable Error. You should use {{variable}}');
        }
    }

    private function processParam($param)
    {
        $this->isValid();
        if($param === '{' || $param === '{{') {
            $this->isOpen .= $param;
            return '';
        }elseif ($param === '}' || $param === '}}') {
            $this->isClouse .= $param;
            return '';
        }
        if($this->isClouse === '}}') {
            $this->isOpen = '';
            $this->isClouse = '';
            return 'Замена';
        }
        if($this->isOpen === '{{' && $this->isClouse === '') {
            $this->templVariable .= $param;
            return '';
        }
        return 'text';

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
                foreach ($spans as $item) {
                    $var = $this->processParam($item->nodeValue);
                    if($var !== 'text') {
                        $item->nodeValue = $var;
                    }
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
