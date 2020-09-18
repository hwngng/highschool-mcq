<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use PhpOffice\PhpWord\IOFactory;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function store(UploadRequest $uploadRequest)
    {
        $phpWord = IOFactory::createReader('ODText')->load($uploadRequest->file('file')->path());
        // dd($phpWord);
        $str = '';
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getElements')) {
                    foreach ($element->getElements() as $subEl) {
                        if (method_exists($subEl, 'getText')) {
                            $str .= $subEl->getText();
                        }
                    }
                }
            }
        }
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save('doc.html');
        return view('upload', ['content' => $str]);
    }
}
