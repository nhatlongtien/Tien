/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/admin_asset/ckfinder/ckfinder.html';

        config.filebrowserImageBrowseUrl = '/admin_asset/ckfinder/ckfinder.html?type=Images';

        config.filebrowserFlashBrowseUrl = '/admin_asset/ckfinder/ckfinder.html?type=Flash';

        config.filebrowserUploadUrl = '/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

        config.filebrowserImageUploadUrl = '/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

        config.filebrowserFlashUploadUrl = '/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
