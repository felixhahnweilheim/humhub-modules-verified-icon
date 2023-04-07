humhub.module('verified.icon', function (module, require, $) {
  
	//var event = require('event');
	//var stream = require('humhub.modules.stream');
	
	//module.initOnPjaxLoad = true;
	
	function init() {
		
	//	var event = require('humhub.modules.event');
	//var stream = require('humhub.modules.stream');
	//console.log(event + "TEST");
		
	/*	var userIds = module.config['verifiedUserIds'];
		
		
		var base_selector = 'data-contentcontainer-id';
		var selector = '[data-contentcontainer-id="1"]:after';
		*/
		var style = document.createElement('style');
/*
		var selector1 = userIds.foreach (function (userId) {
			'.card-title' + ' [' + base_selector + '="' + userId + '"]:after' + ','
		});
	*/		
		
		
		
  style.innerHTML = module.config['cssContent'];
	 /* '.card-title ' + selector1 + ',' +
	  '.media-heading ' + selector + ',' +
	  '.media-subheading ' + selector +
	  '{content: "\\f058";font-family: "FontAwesome"; margin:0px 0px 0px .3em; color: var(--info);}';*/
  document.getElementsByTagName("head")[0].appendChild(style);
		
		/*
		event.on('humhub:stream:afterInit', function () {
			console.log("STREAM After Add Entries TEST");
		});
		event.on('humhub:modules:stream:afterInit', function () {
			console.log("event STREAM After Add Entries TEST");
		});
		$(window).on('load', function () {
		    console.log("LOAD TEST");
		});
		
		$(document).on('humhub:ready', function(event) {
			console.log("HUMHUB READY TEST");
		});
	//		var stream = humhub.require('stream');
		$(document).ready( function () {
			console.log("DOC READY TEST");
		});
			
		
	//	var example = require('humhub.modules.stream');
		
			
			
		/*	$('[data-contentcontainer-id="1"]').each(function() {
			    console.log(this);
			});*/
	/*		var allasdf = $( '[data-contentcontainer-id="1"]' );
			
			var links = $( "a" ).find( allasdf );
			
			console.log(links);
		*/	
			//var elements = $(document).find( '[data-contentcontainer-id="1"]' );
			//console.log(elements);

/*var elements = $(document).find('[data-contentcontainer-id="1"]');

			console.log(elements);

			
			

elements.forEach(addVrfdClass);
	*/	
	}
	
	
	
		function myFunction() {
			console.log("5 Sek.");
		 }
	
	function myFunction2() {
			console.log("TEST STREAM INIT");
		 }


function addVrfdClass(element) {
	console.log("addCLASS");
	element.classList.add("verified");
}
		
		function addCSSClasses() {
			var result = document.querySelectorAll('[data-contentcontainer-id]');
			
		     console.log(result);
           
		     for (var index in result){
              if (result.hasOwnProperty(index)){
                   console.log(result[index].getAttribute('data-contentcontainer-id'));
              }
             }
			
		  result.forEach(addVrfdClass);
						  }	
	    module.export({
        init: init
    });

});