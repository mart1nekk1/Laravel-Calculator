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
}
