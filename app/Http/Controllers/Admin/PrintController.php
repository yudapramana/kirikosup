<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mpdf\Mpdf as PDF;
use Illuminate\Support\Facades\Storage;
use DB;

class PrintController extends Controller
{
    public function document($monthYear)
    {
        if(!$monthYear) {
            return false;
        }

        $year = substr($monthYear, 0, 4);
        $month = substr($monthYear, 5, 2);

        // Setup a filename
        $documentFileName = "fun.pdf";

        // Create the mPDF document
        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_header' => '3',
            'margin_top' => '10',
            'margin_bottom' => '10',
            'margin_footer' => '1',
        ]);
        $document->showImageErrors = true;

        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        ];

        $user = auth()->user();
        if(!$user) {
            return redirect('/admin/dashboard');
        }
        $user_id = $user->id;
        $works = Work::groupBy('work_name', 'unit')
        ->selectRaw("*, sum(volume) as total_volume, GROUP_CONCAT(work_detail SEPARATOR '\n ') as work_detail_merge")
        ->whereHas('report', function ($q) use ($user_id, $year, $month) {
            $q->where([
                'user_id' => $user_id,
                'year' => $year,
                'month' => $month
            ]);
        })
        ->get();

        // return $works;


        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        $cDate = Carbon::createFromDate($year, $month, 1);
        $sMonth = $cDate->isoFormat('MMMM');

        $data = [
            'year' => $year,
            'month' => $sMonth,
            'user' => $user,
            'works' => $works
        ];

        // return $user;

        // $document->loadView(view('print_lckb'), ['data' => 'jancok']);
        $document->WriteHTML(view('print_lckb', $data));

        $document->Output('dompdf.pdf', 'I');

        // Save PDF on your public storage
        // Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));

        // Get file back from storage with the give header informations
        // return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }
}
