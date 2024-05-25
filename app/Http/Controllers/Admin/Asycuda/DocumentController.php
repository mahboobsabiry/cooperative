<?php

namespace App\Http\Controllers\Admin\Asycuda;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use App\Models\Office\Position;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:asy_docs_view', ['only' => ['index', 'show']]);
        $this->middleware('permission:asy_docs_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:asy_docs_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:asy_docs_delete', ['only' => ['destroy']]);
    }

    // INDEX
    public function index()
    {
        $position = Position::where('title', 'مدیر عمومی اسیکودا و سیستم های گمرکی')->firstOrFail();
        $documents = $position->documents;

        return view('admin.asycuda.documents.index', compact('position', 'documents'));
    }

    // Create
    public function create()
    {
        $position = Position::where('title', 'مدیر عمومی اسیکودا و سیستم های گمرکی')->firstOrFail();
        return view('admin.asycuda.documents.create', compact('position'));
    }

    // Store
    public function store(Request $request)
    {
        $position = Position::where('title', 'مدیر عمومی اسیکودا و سیستم های گمرکی')->firstOrFail();
        $request->validate([
            'subject'       => 'required',
            'doc_number'    => 'required',
            'doc_date'      => 'required',
            'appendices'    => 'required',
            'document'      => 'required'
        ]);

        $document           = new Document();
        $document->position_id = $position->id;
        $document->type     = $request->type;
        $document->doc_type = $request->doc_type;
        $document->subject  = $request->subject;
        $document->doc_number   = $request->doc_number;
        $document->doc_date     = $request->doc_date;
        $document->appendices   = $request->appendices;
        $document->status   = 1;
        $document->info     = $request->info;
        $document->save();

        if ($request->hasFile('document')) {
            // File
            // $file = $request->file('document');
            foreach ($request->file('document') as $item) {
                // New Document
                $f = new File();
                $fileName = 'doc-file-' . time() . '.' . $item->getClientOriginalExtension();
                $item->storeAs('documents/files', $fileName, 'public');
                $f->path   = $fileName;
                $document->files()->save($f);
            }
        }

        return redirect()->route('admin.asycuda.documents.index')->with([
            'message'   => 'مکتوب موفقانه ذخیره گردید.',
            'alertType' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = Document::find($id);
        return view('admin.asycuda.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = Document::find($id);
        return view('admin.asycuda.documents.show', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect()->route('admin.asycuda.documents.index')->with([
            'message'   => 'مکتوب حذف گردید',
            'alertType' => 'secondary'
        ]);
    }
}
