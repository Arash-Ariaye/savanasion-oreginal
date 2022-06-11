<?php

namespace App\Http\Controllers;

use App\Charts\Talafat;
use App\Charts\vTalafat;
use App\Models\Breeder;
use App\Models\Category;
use App\Models\DailyReport;
use App\Models\Dr;
use App\Models\Expert;
use App\Models\Period;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Help;

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
            'period' => Period::where('status', 1)->get(),

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
            'title' => 'دوره های جاری',
            'periods' => Period::where('status', 1)->get(),
            'now' => new DateTime(Verta()),
            'help' => new Help(),
        ];

        return view('period.periods', $data);
    }

    public function end_periods()
    {
        $data = [
            'title' => 'دوره های خاتمه یافته',
            'periods' => Period::where('status', 0)->get(),
            'now' => new DateTime(Verta()),
            'help' => new Help(),
        ];

        return view('period.end-periods', $data);

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


    public function create_end_period(Request $request, Period $period = null)
    {
        $check = $request->validate([
            'tarikh_end' => 'required',
            'period' => 'required',
            'cat_end' => 'required',
            'dan_baghimande' => 'nullable|numeric',
            'v_morgh_tah_salon' => 'nullable|numeric',
            't_morgh_tah_salon' => 'nullable|numeric',
            'dan' => 'nullable|numeric',
            'dan_price' => 'nullable|numeric',
        ], [
            '*.required' => 'حتما مقداری وارد کنید.',
            '*.numeric' => 'فقط مقدار عددی وارد کنید.',
        ]);
        $update = Period::find($check['period']);

        try {
            $update = Period::find($check['period']);
            $update->update([
                'tarikh_end' => $check['tarikh_end'],
                'cat_end' => $check['cat_end'],
                'dan_baghimande' => $check['dan_baghimande'],
                'v_morgh_tah_salon' => $check['v_morgh_tah_salon'],
                't_morgh_tah_salon' => $check['t_morgh_tah_salon'],
                'dan' => $check['dan'],
                'dan_price' => $check['dan_price'],
                'status' => 0
            ]);
            toastr()->success('با موفقیت ثبت شد.');
            return redirect()->route('periods');
        } catch (\Exception $e) {
            toastr()->error('خطا در ذخیره سازی.');
            return redirect()->back();
        }
    }


    public function undo_end_period(Request $request, Period $period)
    {

        try {
            $period->update([
                'tarikh_end' => null,
                'cat_end' => null,
                'dan_baghimande' => null,
                'v_morgh_tah_salon' => null,
                't_morgh_tah_salon' => null,
                'dan' => null,
                'dan_price' => null,
                'status' => 1
            ]);
            toastr()->success('دوره با موفقیت جاری شد.');
            return redirect()->route('periods');
        } catch (\Exception $e) {
            toastr()->error('خطا در ذخیره سازی.');
            return redirect()->back();
        }
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
        $dReports = DailyReport::where('breeder', $request['breeder'])->where('period_date', $request['tarikh_start'])->whereNotNull('t_send_koshtargah')->whereNotNull('avr_v_koshtar')->orderBy('age', 'asc')->get();
        $period = Period::where('breeder', $request['breeder'])->where('tarikh_start', $request['tarikh_start'])->get();
        $data = [
            'title' => 'گزارش گیری از دوره',
            'period' => $period,
            'dailyReports' => $d_R,
            'zaribMandegari' => $d_R->sum('t_send_koshtargah') / $period[0]->t_joje * 100,
            'aveBw' => (new Help)->aveBw($dReports, (int)$period[0]->t_joje),
            'aveDay' => (new Help)->aveDay($dReports, (int)$period[0]->t_joje),
            'tTalafat' => (new Help)->sumReport(
                $d_R->sum('t_talafat_s1'),
                $d_R->sum('t_talafat_s2'),
                $d_R->sum('t_talafat_s3'),
                $d_R->sum('t_talafat_s4'),
                $d_R->sum('t_talafat_s5'),
                $d_R->sum('t_talafat_s6')
            ),
            'vTalafat' => (new Help)->sumReport(
                $d_R->sum('v_talafat_s1'),
                $d_R->sum('v_talafat_s2'),
                $d_R->sum('v_talafat_s3'),
                $d_R->sum('v_talafat_s4'),
                $d_R->sum('v_talafat_s5'),
                $d_R->sum('v_talafat_s6')
            ),
            'danMasrafi' => (new Help)->sumReport(
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
        $data['liveAbility'] = 100 - round($data['tTalafat'] / $period[0]->t_joje * 100, 2);
        if (!is_null($period['0']->dan)){
            $data['fcr'] = round($data['danMasrafi'] / (int)$period[0]->dan , 3);
            $data['fcrc'] = round($data['danMasrafi'] / ((int)$period[0]->dan + $data['vTalafat']) , 3);
            $data['epef'] = round(($data['liveAbility'] * (int)$period[0]->dan * 100) / ($data['aveDay'] * $data['fcrc']) , 2);
        }
        return view('period.report-period', $data);
    }

}
