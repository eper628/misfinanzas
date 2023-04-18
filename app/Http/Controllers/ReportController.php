<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
         
        /* $records = Record::whereMonth('created_at', now()->month(3))->sum('amount');
        dd($records); */
        /* $subcategories = Subcategory::select("id", "name")
                ->whereHas('record', function($query) use ($fecha1, $fecha2){
                    $query->whereBetween('created_at', [$fecha1, $fecha2]);
                }) 
                ->whereHas('record', function($query) use ($mes){
                    $query->whereMonth('created_at', $mes);
                }) 
                ->withSum(['record' => function($query) {
                        $query->where('type', 2);
                    }], 'amount')          
                ->get(); */

        

        /* $records = DB::table('records')
        ->whereNotIn('subcategory_id', [1, 2, 3])
        ->join('subcategories', 'subcategories.id', '=', 'records.subcategory_id')
        ->selectRaw('subcategories.name as subcategory, SUM(amount) as total')
        ->groupBy('subcategory_id')
        ->get(); */

        /* $type = $request->type;
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $amount = $request->amount;
        
        $datas = DB::table('records')
        ->select('records.*')
        ->when($type, function($query, $type){
            $query->where('type', $type);
        })
        ->when($amount, function($query, $amount){
            $query->where('amount', (float)$amount);
        })
        ->when($fecha1, function($query) use($request){
            $query->whereBetween('created_at', [$request->fecha1, $request->fecha2]);
        })
        ->when($request->order, function($query) use($request) {
            switch ($request->order){
                case 'concept':
                    return $query->orderBy('concept');
                break;
                case 'amount':
                    return $query->orderBy('amount');
                break;        
            }
        }, function($query){
            return $query->orderBy('records.created_at', 'desc');
        })
        ->get();

        $suma = $datas->sum('amount'); */
    }

    public function out(Request $request)
    {
        $start = $request->start;
        $finish = $request->finish;
        $dia = $request->days;
        $mes = $request->month;
        $anio = $request->year;
        if ($dia == 1) {
            $days = now()->subDays(7);
        } elseif ($dia == 2) {
            $days = now()->subDays(15);
        } else {
            $days = "";
        }
        
        if ($mes == 1) {
            $month = now()->month;
        } elseif ($mes == 2) {
            $month = now()->subMonth(1);
        } else {
            $month = "";
        }
        
        if ($anio == 1) {
            $year = now()->year;
        } elseif ($anio == 2) {
            $year = now()->subYear(1);
        } else {
            $year = "";
        }
        
        $records = Record::whereNotIn('subcategory_id', [1, 2, 3])
        ->where('type', 2)
        ->whereHas('account', function($query) {
            $query->where('coin_id', 1);
        }) 
        ->when($start, function($query) use($request){
            $query->whereBetween('created_at', [$request->start, $request->finish]);
        })
        ->when($days, function($query) use ($days){
            $query->whereDate('created_at','>=', $days);
        })
        ->when($month, function($query) use ($month){
            $query->whereMonth('created_at', $month);
        })
        ->when($year, function($query) use ($year){
            $query->whereYear('created_at', $year);
        })
        ->selectRaw('subcategory_id, SUM(amount) as total')
        ->groupBy('subcategory_id')
        ->get(); 

        $total = $records->sum('total');

        return view('report.out', compact('records', 'total'));
    }

    public function add(Request $request)
    {
        $start = $request->start;
        $finish = $request->finish;
        $dia = $request->days;
        $mes = $request->month;
        $anio = $request->year;
        if ($dia == 1) {
            $days = now()->subDays(7);
        } elseif ($dia == 2) {
            $days = now()->subDays(15);
        } else {
            $days = "";
        }
        
        if ($mes == 1) {
            $month = now()->month;
        } elseif ($mes == 2) {
            $month = now()->subMonth(1);
        } else {
            $month = "";
        }
        
        if ($anio == 1) {
            $year = now()->year;
        } elseif ($anio == 2) {
            $year = now()->subYear(1);
        } else {
            $year = "";
        }
        
        $records = Record::whereNotIn('subcategory_id', [1, 2, 3])
        ->where('type', 1)
        ->whereHas('account', function($query) {
            $query->where('coin_id', 1);
        }) 
        ->when($start, function($query) use($request){
            $query->whereBetween('created_at', [$request->start, $request->finish]);
        })
        ->when($days, function($query) use ($days){
            $query->whereDate('created_at','>=', $days);
        })
        ->when($month, function($query) use ($month){
            $query->whereMonth('created_at', $month);
        })
        ->when($year, function($query) use ($year){
            $query->whereYear('created_at', $year);
        })
        ->selectRaw('subcategory_id, SUM(amount) as total')
        ->groupBy('subcategory_id')
        ->get(); 

        $total = $records->sum('total');

        return view('report.add', compact('records', 'total'));
    }

    public function balance(Request $request)
    {
        $mes = $request->month;
        $anio = $request->year;
        
        if ($mes == 1) {
            $month = now()->month;
        } elseif ($mes == 2) {
            $month = now()->subMonth(1);
        } else {
            $month = "";
        }
        
        if ($anio == 1) {
            $year = now()->year;
        } elseif ($anio == 2) {
            $year = now()->subYear(1);
        } else {
            $year = "";
        }
        
        $records = Record::whereNotIn('subcategory_id', [1, 2, 3])
        ->whereHas('account', function($query) {
            $query->where('coin_id', 1);
        }) 
        ->when($month, function($query) use ($month){
            $query->whereMonth('created_at', $month);
        })
        ->when($year, function($query) use ($year){
            $query->whereYear('created_at', $year);
        })
        ->selectRaw('type, SUM(amount) as total')
        ->groupBy('type')
        ->get();

        $saldo = json_decode($records, true);
        

        
            $add = array_filter($saldo, function ($var){
                return ($var['type'] == 1);    
            }); 
            $sumadd = !empty($add) ? array_sum(array_column($add, 'total')) : 0;
            
            $out = array_filter($saldo, function ($var){
                return ($var['type'] == 2);    
            }); 
            $sumout = !empty($out) ? array_sum(array_column($out, 'total')) : 0;


            $balance = $sumadd - $sumout;
        


        return view('report.balance', compact('records', 'balance'));
    }
}
