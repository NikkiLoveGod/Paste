<?php namespace Paste\Http\Controllers;

use File;
use Input;
use Paste\Entities\Paste;
use View;

class PasteController extends Controller {

    public function index()
    {
        return \Redirect::route('paste.create');
    }

    /**
     * Display paste creation view
     */
    public function create($hash = null)
    {
        $paste = null;
        $type = 'php';

        if($hash) {
            $paste = Paste::findByHash($hash);
            $type = $paste->getType();
        }

        $modeFiles = File::allFiles(public_path('ace'));

        $modeFiles = array_filter($modeFiles, function($file) {
            return (strpos($file->getFilename(), 'mode') === 0);
        });

        $modes = [];
        foreach( $modeFiles as $file ) {
            $mode = str_replace('mode-', '', str_replace('.js', '', $file->getFilename()));
            $modes[$mode] = ucfirst($mode);
        }

        return View::make('paste.create', compact('paste', 'modes', 'type'));
    }

    /**
     * Store the paste in database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $paste = Paste::createNew(Input::get('content'), Input::get('mode'));

        return \Redirect::route('paste.read', $paste->getHash());
    }
}