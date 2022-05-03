<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
    *
    * @throws ValidationException
    */
    public function calculate(Calculator $calculator): View
    {
        $this->validate(request(), [
            'a' => ['required', 'integer'],
            'b' => ['required', 'integer', 'not_in:0'],
            'operation' => [
                'required',
                Rule::in(array_keys($calculator->getOperations())),
            ],
        ]);
    
        $a = request()->input('a');

        return view('calculator', [
            'operations' => $calculator->getOperations(),
            'result' => $result,
            'a' => $a,
            'b' => $b,
        ]);
    }
}
