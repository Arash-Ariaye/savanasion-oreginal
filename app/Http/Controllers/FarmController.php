<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use App\Models\Farm;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmController extends Controller
{

    public function index()
    {
        $title = 'لیست فارم ها';
        $list = DB::table('farms')->get();
        return view('farm.farms', compact('title', 'list'));
    }

    public function create()
    {
        $title = 'افزودن فارم';
        $breeders = DB::table('breeders')->get();
        return view('farm.add-farm', compact('title', 'breeders'));
    }

    public function insert(Request $request)
    {
        $check = $request->validate([
            'breeder' => 'required|',
            'gas' => 'required|',
            "fences" => 'required',
            "light_sys" => 'required',
            "drink_sys" => 'required',
            "water_tank" => 'required',
            "filtration" => 'required',
            "water" => 'required',
            "seeds" => 'required',
            "air_sys" => 'required',
            "form_area" => 'required',
            "cooling_sys" => 'required',
        ], [
            '*.required' => 'وارد کردن این مقدار الضامی می باشد.',
        ]);
        try {
            Farm::create([
                'breeder' => $request['breeder'],
                'breeder_phone' => DB::table('breeders')->where('name', $request['breeder'])->value('phone'),
                'gas' => collect($check['gas'])->implode('-'),
                'air_sys' => collect($check['air_sys'])->implode('-'),
                'light_sys' => collect($check['light_sys'])->implode('-'),
                'drink_sys' => collect($check['drink_sys'])->implode('-'),
                'water' => collect($check['water'])->implode('-'),
                'water_tank' => collect($check['water_tank'])->implode('-'),
                'septic_tank' => $request['septic_tank'],
                'filtration' => collect($check['filtration'])->implode('-'),
                'carcass' => $request['carcass'],
                'losses_pit' => $request['losses_pit'],
                'seeds' => collect($check['seeds'])->implode('-'),
                'seeds_transfer' => $request['seeds_transfer'],
                'form_area' => collect($check['form_area'])->implode('-'),
                'cooling_sys' => collect($check['cooling_sys'])->implode('-'),
                'generator' => $request['generator'],
                'power_alert' => $request['power_alert'],
                'air_alert' => $request['air_alert'],
                'cctv' => $request['cctv'],
                'weighbridge' => $request['weighbridge'],
                'input_quarantine' => $request['input_quarantine'],
                'fences' => collect($check['fences'])->implode('-'),

            ]);
            toastr()->success('با موفقیت ذخیره شد!');
            return redirect()->route('add-farm');
        } catch (\Exception $e) {
            toastr()->error($e, 'خطا در ذخیره سازی!');
            return redirect()->route('add-farm');
        }
    }

    public function edit(Farm $farm, Request $request)
    {
        $data = [
            'title' => 'ویرایش شنلسنامه فارم',
            'farm' => Farm::find($farm)->all(),
            'breeders' => Breeder::all(),
        ];

        return view('farm.edit-farm', $data);
    }

    public function update(Farm $farm, Request $request)
    {
        $check = $request->validate([
            'breeder' => 'required',
            'gas' => 'required',
            'air_sys' => 'required',
            'light_sys' => 'required',
            'drink_sys' => 'required',
            'water' => 'required',
            'water_tank' => 'required',
            'septic_tank' => 'required',
            'filtration' => 'required',
            'carcass' => 'required',
            'losses_pit' => 'required',
            'seeds' => 'required',
            'seeds_transfer' => 'required',
            'form_area' => 'required',
            'cooling_sys' => 'required',
            'generator' => 'required',
            'power_alert' => 'required',
            'air_alert' => 'required',
            'cctv' => 'required',
            'weighbridge' => 'required',
            'input_quarantine' => 'required',
            'fences' => 'required',
        ]);
        try {
            $farm->update([
                'breeder' => $request['breeder'],
                'breeder_phone' => DB::table('breeders')->where('name', $request['breeder'])->value('phone'),
                'gas' => collect($request['gas'])->implode('-'),
                'air_sys' => collect($request['air_sys'])->implode('-'),
                'light_sys' => collect($request['light_sys'])->implode('-'),
                'drink_sys' => collect($request['drink_sys'])->implode('-'),
                'water' => collect($request['water'])->implode('-'),
                'water_tank' => collect($request['water_tank'])->implode('-'),
                'septic_tank' => $request['septic_tank'],
                'filtration' => collect($request['filtration'])->implode('-'),
                'carcass' => $request['carcass'],
                'losses_pit' => $request['losses_pit'],
                'seeds' => collect($request['seeds'])->implode('-'),
                'seeds_transfer' => $request['seeds_transfer'],
                'form_area' => collect($request['form_area'])->implode('-'),
                'cooling_sys' => collect($request['cooling_sys'])->implode('-'),
                'generator' => $request['generator'],
                'power_alert' => $request['power_alert'],
                'air_alert' => $request['air_alert'],
                'cctv' => $request['cctv'],
                'weighbridge' => $request['weighbridge'],
                'input_quarantine' => $request['input_quarantine'],
                'fences' => collect($request['fences'])->implode('-'),
            ]);
            toastr()->success('با موفقیت بروزرسانی شد.');
            return redirect()->route('farms');
        } catch (\Exception $e) {
            toastr()->error($e, 'error');
            return redirect()->route('edit-farm', $farm);
        }
    }

    public function destroy(Farm $farm)
    {
        try {
            $farm->delete();
            toastr()->success('با موفقیت حذف شد!');
            return redirect()->route('farms');
        } catch (\Exception $e) {
            toastr()->success($e, 'خطا در حذف!');
            return redirect() - back();

        }

    }
}
