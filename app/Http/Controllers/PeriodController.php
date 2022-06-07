<?php

namespace App\Http\Controllers;

use App\Charts\Talafat;
use App\Charts\vTalafat;
use App\Http\Help;
use App\Models\Breeder;
use App\Models\Category;
use App\Models\DailyReport;
use App\Models\Dr;
use App\Models\Expert;
use App\Models\Period;
use DateTime;
use Illuminate\Http\Request;

class PeriodController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'ثبت دوره جوجه ریزی',
            'experts' => Expert::all(),
            'drs' => Dr::all(),
            'categories' => Category::all(),
            'breeder' => Breeder::all(),

        ];
        return view('period.start-period', $data);
    }

    public function end_period_index()
    {
        $data = [
            'title' => 'گزارش پایان دوره',
            'categories' => Category::all(),
            'breeder' => Period::where('status', 1)->get(),

        ];
        return view('period.end-period', $data);
    }


    public function create(Period $period, Request $request)
    {
        $check = $request->validate([
            'tarikh_start' => 'required',
            'cat_start' => 'required',
            'breeder' => 'required',
            'dr' => 'required',
            'expert' => 'required',
            'bed' => 'required',
            'v_joje' => 'required',
            't_joje' => 'required',
            'joje_keshi' => 'required',
            'farm_madar' => 'required',
            'soye' => 'required',
            'sen_gale_madar' => 'required',
            't_joje_s1' => 'nullable',
            't_joje_s2' => 'nullable',
            't_joje_s3' => 'nullable',
            't_joje_s4' => 'nullable',
            't_joje_s5' => 'nullable',
            't_joje_s6' => 'nullable',
            'sex_joje_s1' => 'nullable',
            'sex_joje_s2' => 'nullable',
            'sex_joje_s3' => 'nullable',
            'sex_joje_s4' => 'nullable',
            'sex_joje_s5' => 'nullable',
            'sex_joje_s6' => 'nullable',
            'sln' => 'nullable',
        ], [
            '*.required' => 'حتما مقداری وارد کنید.'
        ]);

        try {
            Period::create($check);
            toastr()->success('جوجه ریزی با موفقیت ثبت شد.');
            return redirect()->route('add-period');
        } catch (\Exception $e) {
            toastr()->error($e, 'خطا.');
            return redirect()->route('add-period');
        }
    }


    public function show(Period $period)
    {
        $data = [
            'title' => '',
            'periods' => Period::all(),
            'now' => new DateTime(Verta()),
        ];

        return view('period.periods', $data);
    }


    public function editStart(Period $period, Request $request)
    {
        $data = [
            'title' => 'ویرایش شروع دوره',
            'experts' => Expert::all(),
            'drs' => Dr::all(),
            'categories' => Category::all(),
            'breeder' => Breeder::all(),
            'period' => Period::find($period)->all(),
        ];

        return view('period.edit-start-period', $data);

    }


    public function update_start(Request $request, Period $period)
    {
        $check = $request->validate([
            'tarikh_start' => 'required',
            'cat_start' => 'required',
            'breeder' => 'required',
            'dr' => 'required',
            'expert' => 'required',
            'bed' => 'required',
            'v_joje' => 'required',
            't_joje' => 'required',
            'joje_keshi' => 'required',
            'farm_madar' => 'required',
            'soye' => 'required',
            'sen_gale_madar' => 'required',
            't_joje_s1' => 'nullable',
            't_joje_s2' => 'nullable',
            't_joje_s3' => 'nullable',
            't_joje_s4' => 'nullable',
            't_joje_s5' => 'nullable',
            't_joje_s6' => 'nullable',
            'sex_joje_s1' => 'nullable',
            'sex_joje_s2' => 'nullable',
            'sex_joje_s3' => 'nullable',
            'sex_joje_s4' => 'nullable',
            'sex_joje_s5' => 'nullable',
            'sex_joje_s6' => 'nullable',
            'sln' => 'nullable',
        ], [
            '*.required' => 'حتما مقداری وارد کنید.'
        ]);


        try {

            $period->update($check);
            toastr()->success('شروع دوره با موفقیت بروز رسانی شد.');
            return redirect()->route('periods');
        } catch (\Exception $e) {
            toastr()->error($e, 'خطا.');

            return redirect()->route('periods');
        }

    }


    public function create_end_period(Request $request)
    {
        $check = $request->validate([
            'tarikh_end' => 'required',
            'breeder' => '',
            'cat_end' => 'required',
            'dan_baghimande' => 'required|numeric',
            'v_morgh_tah_salon' => 'required|numeric',
            't_morgh_tah_salon' => 'required|numeric',
        ], [
            '*.required' => 'حتما مقداری وارد کنید.'
        ]);
        dd($check);
    }


    public function destroy(Period $period)
    {
        try {
            $period->delete();
            toastr()->success('با موفقیت حذف شد.');
            return redirect()->route('periods');
        } catch (\Exception $e) {
            toastr()->error($e, 'خطا!');
            return redirect()->route('periods');
        }
    }


    public function report(Request $request, Talafat $tTalafatch, vTalafat $vTalafatch)
    {
        $d_R = DailyReport::where('breeder', $request['breeder'])->where('period_date', $request['tarikh_start'])->orderBy('id', 'desc');

        $data = [
            'title' => 'گزارش گیری از دوره',
            'period' => Period::where('breeder', $request['breeder'])->where('tarikh_start', $request['tarikh_start'])->get(),
            'dailyReports' => $d_R,
            'tTalafat' => $tTalafat = Help::sumReport(
            $d_R->sum('t_talafat_s1'),
            $d_R->sum('t_talafat_s2'),
            $d_R->sum('t_talafat_s3'),
            $d_R->sum('t_talafat_s4'),
            $d_R->sum('t_talafat_s5'),
            $d_R->sum('t_talafat_s6')
        ),
            'vTalafat' => $vTalafat = Help::sumReport(
            $d_R->sum('v_talafat_s1'),
            $d_R->sum('v_talafat_s2'),
            $d_R->sum('v_talafat_s3'),
            $d_R->sum('v_talafat_s4'),
            $d_R->sum('v_talafat_s5'),
            $d_R->sum('v_talafat_s6')
        ),
            'danMasrafi' => $danMasrafi = Help::sumReport(
            $d_R->sum('dan_masrafi_s1'),
            $d_R->sum('dan_masrafi_s2'),
            $d_R->sum('dan_masrafi_s3'),
            $d_R->sum('dan_masrafi_s4'),
            $d_R->sum('dan_masrafi_s5'),
            $d_R->sum('dan_masrafi_s6')
        ),
            'chTalafat' => $tTalafatch->build($request['tarikh_start'], $request['breeder']),
            'chvTalafat' => $vTalafatch->build($request['tarikh_start'], $request['breeder']),

        ];
        return view('period.report-period', $data);
    }

}
