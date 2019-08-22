/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript';

    // Set the most common block elements.
    // config.format_tags = 'p;h1;h2;h3;pre';
    config.format_tags = 'p;h1;h2;h3;h4;h5;h6;pre;address;div'

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';


    config.filebrowserBrowseUrl = rootUrl + '/backend/js/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = rootUrl + '/backend/js/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = rootUrl + '/backend/js/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = rootUrl + '/backend/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = rootUrl + '/backend/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = rootUrl + '/backend/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
