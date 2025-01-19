<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('knowledge',[
            'elements' => Element::orderBy('title')->get(),
        ]);
    }
}
