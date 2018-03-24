/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    config.language = 'en';
    config.extraPlugins = 'youtube,autogrow';
    config.allowedContent = true;
    // config.uiColor = '#AADC6E';

     config.filebrowserBrowseUrl = 'http://www.gurugames.in.th/elfinder/elfinder.html';
   config.filebrowserImageBrowseUrl = 'http://www.gurugames.in.th/elfinder/elfinder.html';
   config.filebrowserFlashBrowseUrl = 'http://www.gurugames.in.th/elfinder/elfinder.html';
   config.filebrowserUploadUrl = 'http://www.gurugames.in.th/elfinder/elfinder.html';
   config.filebrowserImageUploadUrl = 'http://www.gurugames.in.th/elfinder/elfinder.html';
   config.filebrowserFlashUploadUrl = 'http://www.gurugames.in.th/elfinder/elfinder.html';
};
CKEDITOR.on('dialogDefinition', function(ev)
{
    //var dialogName = ev.data.name;
    //var dialogDefinition = ev.data.definition;

    var tab, field, name = ev.data.name,
            definition = ev.data.definition;

    if (name == 'image')
    {
        //definition.onShow = function() {
        //    this.selectPage('advanced');
        //};
        tab = definition.getContents('advanced');
        //tab.remove('txtVSpace');
        field = tab.get('txtGenClass');
        field['default'] = 'img-responsive';
    }
});
