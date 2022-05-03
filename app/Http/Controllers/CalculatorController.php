<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Contracts\View\View;

class CalculatorController extends Controller
{
    /**
     * Zobraz formulář s kalkulačkou.
     *
     * @param  Calculator $calculator
     * @return View
     */
    public function index(Calculator $calculator): View
    {
        return view('calculator', [
            'operations' => $calculator->getOperations(),
        ]);
    }
    /**
    * Zpracuj požadavek formuláře a zobraz výsledek spolu s formulářem kalkulačky.
    *
    * @param  Calculator $calculator
    * @return View
    */
    public function calculate(Calculator $calculator): View
    {
        $a = request()->input('a');
        $b = request()->input('b');
        $operation = request()->input('operation');
        $result = $calculator->calculate($operation, $a, $b);

        return view('calculator', [
            'operations' => $calculator->getOperations(),
            'result' => $result,
            'a' => $a,
            'b' => $b,
        ]);
    }
}
