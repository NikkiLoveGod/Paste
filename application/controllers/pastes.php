<?php

class Pastes_Controller extends Base_Controller {

	public $restful = true;    

    /**
     * List all pastes from your session
     */
	public function get_index()
    {
        $pastes = array();
        $pasteIds = Session::get('pasteIds');
        if($pasteIds) {
            $pastes = Paste::where_in('id', $pasteIds)->order_by('updated_at', 'desc')->get();
        }
        return View::make('paste.index')->with('pastes', $pastes);
    }    

    /**
     * Show single paste
     * 
     * @param  string $shortcode 
     */
    public function get_show($shortcode)
    {
        $paste = Paste::where_shortcode($shortcode)->first();

        /**
         * If no pastes are found, redirect back to front page
         */
        if(!$paste) {
            return Redirect::to_route('pastes')->with('message', 'Sivua ei löytynyt');
        }

        return View::make('paste.show')->with('paste', $paste);
    }     

    /**
     * Show forking a paste. Uses get_new to move inside controller
     * 
     * @param  string $shortcode 
     */
	public function get_fork($shortcode)
    {
        $paste = Paste::where_shortcode($shortcode)->first();
        
        /**
         * If no pastes are found, redirect back to front page
         */
        if(!$paste) {
            return Redirect::to_route('pastes')->with('message', 'Sivua ei löytynyt');
        }

        return $this->get_new($paste->content);
    }    

    /**
     * Show new paste form
     * 
     * @param  string $paste default text for paste 
     */
    public function get_new($paste = '')
    {
        return View::make('paste.new')->with('paste', $paste);
    }    

    /**
     * Handle creating a paste
     */
	public function post_create()
    {
        /**
         * Form the data for paste
         */
        $data = array(
            'content' => trim(Input::get('paste')),
            'shortcode' => Paste::generateShortcode()
        );

        /**
         * Validation rules
         */
        $rules = array(
            'content' => 'required',
            'shortcode' => 'required|alpha_num|unique:pastes'
        );

        /**
         * Error messages
         */
        $messages = array(
            'content_required' => 'Muista liittää teksti',
            'shortcode_unique' => 'Tunnisteen luonnissa tapahtui virhe'
        );

        /**
         * Try to validate and return to form with errors on fail
         */
        $validate = Validator::make($data, $rules, $messages);

        if($validate->fails()) {
            return Redirect::to_route('new_paste')
                            ->with_input()
                            ->with_errors($validate);
        }

        $paste = Paste::create($data);

        /**
         * If paste couldn't be created, redirect back to front page
         */
        if(!$paste) {
            return Redirect::to_route('new_paste')->with('message', 'Tallennuksessa tapahtui virhe');
        }

        /**
         * Store the pasteId into your session
         */
        $pasteIds = Session::get('pasteIds');
        $pasteIds[] = $paste->id;
        Session::put('pasteIds', $pasteIds);

        return Redirect::to_route('paste', array($paste->shortcode));
    }    

}