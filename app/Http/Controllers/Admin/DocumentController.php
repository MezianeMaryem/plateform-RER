<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\DocumentRER;


class DocumentController extends Controller
{

    public function showDocuments(Request $request1)
    {
    
    $query = $request1->input('search');
    
    if ($query) {
        $documents = Document::where('nom', 'like', '%' . $query . '%')
        ->get();
    } else {
        $documents = Document::all();
    }

    return view('dashboard.user.userlocal', ['documents' => $documents]);
    }
    
    public function showDocumentspublic(Request $request1)
    {
    
    $query = $request1->input('search');
    
    if ($query) {
        $documents = Document::where('nom', 'like', '%' . $query . '%')
        ->where('prive', false)
        ->get();
    } else {
        $documents = Document::where('prive',0)->get();
    }

    return view('dashboard.user.userpublic', ['documents' => $documents]);
    }

    public function downloadDocument($id)
    {
        $document = Document::findOrFail($id);
        $filePath = storage_path('app/public/' . $document->chemin);
    
        if (file_exists($filePath)) {
            return response()->download($filePath, $document->nom);
        } else {
            abort(404);
        }
    }
    
    
    

    public function store(Request $request)
    {
        //dd($request->all(), $request->file('files'));


        // Vérifiez si le fichier a été envoyé
        if ($request->hasFile('files')) {
            $file = $request->file('files'); // Get the uploaded file
            
            $filename = time() . '_' . $file->getClientOriginalName(); // Generate a unique file name
    
            // Store the file in the 'documents' directory within the 'public' disk
            $path = $file->storeAs('documents', $filename, 'public');
    
            // Create a new document record and save it to the database
            $document = new Document();
            $document->nom = $filename;
            $document->chemin = $path;
            $document->nom_utilisateur = Auth::guard('admin')->user()->name;
            $document->prive = !($request->input('public') === 'yes');
            $document->save();
    
/*
                   // Enregistrez dans la base de données RER uniquement si 'public' est égal à 'yes'
        if ($request->input('public') === 'yes') {
            $documentRER = new DocumentRER();
            $documentRER->nom = $filename;
            $documentRER->chemin = $path;
            $documentRER->nom_utilisateur = Auth::guard('admin')->user()->name;
            $documentRER->Univ = 'UTBM';
            $documentRER->prive = false; // Puisque c'est public
            $documentRER->save();

        }

        */



         return response()->json(['success' => 'Document uploaded successfully.']);
        }
    
       return response()->json(['error' => 'No files were selected.'], 422);
       
    }
}