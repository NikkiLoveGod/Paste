<?php namespace Paste\Http\Controllers;

use View;

class PasteController extends Controller {

    /**
     * Display paste creation view
     */
    public function create()
    {
        return View::make('paste.create');
    }
}