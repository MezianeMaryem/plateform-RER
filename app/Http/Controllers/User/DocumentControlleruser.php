<?php

namespace App\Http\Controllers\User;

use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    
    public function showDocuments(Request $request)
    {
       
    $query = $request->input('search');
    
    if ($query) {
        $documents = Document::where('nom', 'like', '%' . $query . '%')->get();
    } else {
        $documents = Document::all();
    }

    return view('dashboard.user.userlocal', ['documents' => $documents]);
    }
}
