(function($) {

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/" + mode);
    //editor.setHighlightActiveLine(false);
    editor.setShowPrintMargin(false);
    editor.getSession().setUseWrapMode(true);
    editor.focus();


    if($('.show-paste').length > 0) {
        //pasteContent comes from global in the dom
        editor.setValue(paste.content, -1);
        editor.setReadOnly(true);
    }
    if(typeof(paste) !== "undefined") {
        //pasteContent comes from global in the dom
        editor.setValue(paste.content, 1);
    }

    $('.submit-paste').on('click', function(e) {
        e.preventDefault();

        $('.content-paste').val(editor.getValue());

        console.log('editoor');

        $('.save-paste').submit();
    })

    $('.mode-selector').on('change', function() {
        console.log('switched to ' + $(this).val());
        editor.getSession().setMode('ace/mode/' + $(this).val());
    });

})(jQuery);