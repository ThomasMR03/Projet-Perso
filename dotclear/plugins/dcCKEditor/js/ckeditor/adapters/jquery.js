
﻿
(function($){if(typeof $=='undefined'){throw new Error('jQuery should be loaded before CKEditor jQuery adapter.');}
if(typeof CKEDITOR=='undefined'){throw new Error('CKEditor should be loaded before CKEditor jQuery adapter.');}
CKEDITOR.config.jqueryOverrideVal=typeof CKEDITOR.config.jqueryOverrideVal=='undefined'?true:CKEDITOR.config.jqueryOverrideVal;$.extend($.fn,{ckeditorGet:function(){var instance=this.eq(0).data('ckeditorInstance');if(!instance)
throw'CKEditor is not initialized yet, use ckeditor() with a callback.';return instance;},ckeditor:function(callback,config){if(!CKEDITOR.env.isCompatible)
throw new Error('The environment is incompatible.');if(!$.isFunction(callback)){var tmp=config;config=callback;callback=tmp;}
var promises=[];config=config||{};this.each(function(){var $element=$(this),editor=$element.data('ckeditorInstance'),instanceLock=$element.data('_ckeditorInstanceLock'),element=this,dfd=new $.Deferred();promises.push(dfd.promise());if(editor&&!instanceLock){if(callback)
callback.apply(editor,[this]);dfd.resolve();}else if(!instanceLock){if(config.autoUpdateElement||(typeof config.autoUpdateElement=='undefined'&&CKEDITOR.config.autoUpdateElement)){config.autoUpdateElementJquery=true;}
config.autoUpdateElement=false;$element.data('_ckeditorInstanceLock',true);if($(this).is('textarea'))
editor=CKEDITOR.replace(element,config);else
editor=CKEDITOR.inline(element,config);$element.data('ckeditorInstance',editor);editor.on('instanceReady',function(evt){var editor=evt.editor;setTimeout(function(){if(!editor.element){setTimeout(arguments.callee,100);return;}
evt.removeListener();editor.on('dataReady',function(){$element.trigger('dataReady.ckeditor',[editor]);});editor.on('setData',function(evt){$element.trigger('setData.ckeditor',[editor,evt.data]);});editor.on('getData',function(evt){$element.trigger('getData.ckeditor',[editor,evt.data]);},999);editor.on('destroy',function(){$element.trigger('destroy.ckeditor',[editor]);});editor.on('save',function(){$(element.form).submit();return false;},null,null,20);if(editor.config.autoUpdateElementJquery&&$element.is('textarea')&&$(element.form).length){var onSubmit=function(){$element.ckeditor(function(){editor.updateElement();});};$(element.form).submit(onSubmit);$(element.form).bind('form-pre-serialize',onSubmit);$element.bind('destroy.ckeditor',function(){$(element.form).unbind('submit',onSubmit);$(element.form).unbind('form-pre-serialize',onSubmit);});}
editor.on('destroy',function(){$element.removeData('ckeditorInstance');});$element.removeData('_ckeditorInstanceLock');$element.trigger('instanceReady.ckeditor',[editor]);if(callback)
callback.apply(editor,[element]);dfd.resolve();},0);},null,null,9999);}else{editor.once('instanceReady',function(){setTimeout(function(){if(!editor.element){setTimeout(arguments.callee,100);return;}
if(editor.element.$==element&&callback)
callback.apply(editor,[element]);dfd.resolve();},0);},null,null,9999);}});var dfd=new $.Deferred();this.promise=dfd.promise();$.when.apply(this,promises).then(function(){dfd.resolve();});this.editor=this.eq(0).data('ckeditorInstance');return this;}});if(CKEDITOR.config.jqueryOverrideVal){$.fn.val=CKEDITOR.tools.override($.fn.val,function(oldValMethod){return function(value){if(arguments.length){var _this=this,promises=[],result=this.each(function(){var $elem=$(this),editor=$elem.data('ckeditorInstance');if($elem.is('textarea')&&editor){var dfd=new $.Deferred();editor.setData(value,function(){dfd.resolve();});promises.push(dfd.promise());return true;}else{return oldValMethod.call($elem,value);}});if(!promises.length)
return result;else{var dfd=new $.Deferred();$.when.apply(this,promises).done(function(){dfd.resolveWith(_this);});return dfd.promise();}}
else{var $elem=$(this).eq(0),editor=$elem.data('ckeditorInstance');if($elem.is('textarea')&&editor)
return editor.getData();else
return oldValMethod.call($elem);}};});}})(window.jQuery);