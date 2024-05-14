'use strict';
$(document).ready(function () {
    if($('#editor').length) {
        CKEDITOR.replace('editor');

		CKEDITOR.editorConfig = function( config ) {
			config.language = 'es';
			config.uiColor = '#F7B42C';
			config.height = 300;
			config.toolbarCanCollapse = true;
		};
    }
});
