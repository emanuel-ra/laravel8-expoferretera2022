<?php

namespace App\Exports;

use App\Models\prospects;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProspectsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.prospects', [
            'prospects' => prospects::all()
        ]);
    }
   
}
