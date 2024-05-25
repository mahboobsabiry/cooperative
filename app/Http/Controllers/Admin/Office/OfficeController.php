<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\Office\Position;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    // Documents
    public function documents()
    {
        $position = Position::where('title', 'مدیر عمومی مالی و اداری')->firstOrFail();
        if (!empty($position)) {
            $documents = $position->documents;
        } else {
            $documents = '';
        }

        return view('admin.office.documents.index', compact('documents'));
    }

    // Store Document
    public function store_document(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'subject'       => 'required',
                'doc_number'    => 'required',
                'doc_date'      => 'required',
                'appendices'    => 'required',
                'document'      => 'required'
            ]);

            $position = Position::where('title', 'مدیر عمومی اسیکودا و سیستم های گمرکی')->firstOrFail();
            $document           = new Document();
            $document->type     = $request->type;
            $document->doc_type = $request->doc_type;
            $document->subject  = $request->subject;
            $document->doc_number   = $request->doc_number;
            $document->doc_date     = $request->doc_date;
            $document->appendices   = $request->appendices;
            $document->status   = 1;
            $document->info     = $request->info;
            $position->documents()->save($document);

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
        return view('admin.office.documents.create');
    }
}
