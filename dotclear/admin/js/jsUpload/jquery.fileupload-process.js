
(function(factory){'use strict';if(typeof define==='function'&&define.amd){define(['jquery','./jquery.fileupload'],factory);}else{factory(window.jQuery);}}(function($){'use strict';var originalAdd=$.blueimp.fileupload.prototype.options.add;$.widget('blueimp.fileupload',$.blueimp.fileupload,{options:{processQueue:[],add:function(e,data){var $this=$(this);data.process(function(){return $this.fileupload('process',data);});originalAdd.call(this,e,data);}},processActions:{},_processFile:function(data){var that=this,dfd=$.Deferred().resolveWith(that,[data]),chain=dfd.promise();this._trigger('process',null,data);$.each(data.processQueue,function(i,settings){var func=function(data){return that.processActions[settings.action].call(that,data,settings);};chain=chain.pipe(func,settings.always&&func);});chain.done(function(){that._trigger('processdone',null,data);that._trigger('processalways',null,data);}).fail(function(){that._trigger('processfail',null,data);that._trigger('processalways',null,data);});return chain;},_transformProcessQueue:function(options){var processQueue=[];$.each(options.processQueue,function(){var settings={},action=this.action,prefix=this.prefix===true?action:this.prefix;$.each(this,function(key,value){if($.type(value)==='string'&&value.charAt(0)==='@'){settings[key]=options[value.slice(1)||(prefix?prefix+
key.charAt(0).toUpperCase()+key.slice(1):key)];}else{settings[key]=value;}});processQueue.push(settings);});options.processQueue=processQueue;},processing:function(){return this._processing;},process:function(data){var that=this,options=$.extend({},this.options,data);if(options.processQueue&&options.processQueue.length){this._transformProcessQueue(options);if(this._processing===0){this._trigger('processstart');}
$.each(data.files,function(index){var opts=index?$.extend({},options):options,func=function(){return that._processFile(opts);};opts.index=index;that._processing+=1;that._processingQueue=that._processingQueue.pipe(func,func).always(function(){that._processing-=1;if(that._processing===0){that._trigger('processstop');}});});}
return this._processingQueue;},_create:function(){this._super();this._processing=0;this._processingQueue=$.Deferred().resolveWith(this).promise();}});}));