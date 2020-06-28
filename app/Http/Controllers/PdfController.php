<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DocumentModel;

class PdfController extends Controller
{
    public function getDocumentPdf($id) 
    {
    	$document = DocumentModel::find($id);

    	$view = \View::make('pdf', compact('document'))->render();
    	$pdf = \App::make('dompdf.wrapper')->setOptions(['isRemoteEnabled' => true,'isHtml5ParserEnabled' => true]);
    	$pdf->loadHTML($view);

    	return $pdf->stream();
    }

   
    
}
