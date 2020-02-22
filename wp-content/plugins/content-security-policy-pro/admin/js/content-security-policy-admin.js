var substringMatcher = function(strs) {
	  return function findMatches(q, cb) {
	    var matches, substringRegex;

	    // an array that will be populated with substring matches
	    matches = [];

	    // regex used to determine if a string contains the substring `q`
	    substrRegex = new RegExp(q, 'i');

	    // iterate through the pool of strings and for any string that
	    // contains the substring `q`, add it to the `matches` array
	    $.each(strs, function(i, str) {
	      if (substrRegex.test(str)) {
	        matches.push(str);
	      }
	    });
	    cb(matches);
	  };
	};

jQuery(function(){
	var directiveOptions = ["'none'", "'self'", "'unsafe-inline'", "'unsafe-eval'", 
	              'https://apis.google.com', 'https://plusone.google.com', 'https://themes.googleusercontent.com',
		              'https://platform.twitter.com', 'https://facebook.com', 'https://platform.twitter.com',
		              'https://fonts.gstatic.com'
		              ];
			
			
		$('.input-typeahead input').tagsinput({
			  typeaheadjs: {
			    name: 'directiveOptions',
			    source: substringMatcher(directiveOptions)
			  }
		});
		
		$('#wp-csp-clear').click(function(){
			$('.input-typeahead input[name]').tagsinput('removeAll');
			$('#wp-csp-template-default').removeClass('hide');
		});
		//social template btn
		$('#wp-csp-template-social').click(function(){
			//$('.input-typeahead input[name=script-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=script-src]').tagsinput('add', 'https://apis.google.com');
			$('.input-typeahead input[name=script-src]').tagsinput('add', 'https://platform.twitter.com');
			
			//$('.input-typeahead input[name=child-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=child-src]').tagsinput('add', 'https://plusone.google.com');
			$('.input-typeahead input[name=child-src]').tagsinput('add', 'https://facebook.com');
			$('.input-typeahead input[name=child-src]').tagsinput('add', 'https://platform.twitter.com');
			
			//$('.input-typeahead input[name=font-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=font-src]').tagsinput('add', 'https://themes.googleusercontent.com');
			$('.input-typeahead input[name=font-src]').tagsinput('add', 'https://fonts.gstatic.com');
			
			
			$('.input-typeahead input[name=style-src]').tagsinput('add', 'https://fonts.googleapis.com/');
			
			$('.input-typeahead input[name=img-src]').tagsinput('add', '*.gravatar.com');
			
		});
		
		//ssl-only
		$('#wp-csp-template-ssl-only').click(function(){
			//clear all
			$('.input-typeahead input[name]').tagsinput('removeAll');
			
			$('.input-typeahead input[name=default-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=default-src]').tagsinput('add', 'https:');
			
			$('.input-typeahead input[name=script-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=script-src]').tagsinput('add', 'https:');
			$('.input-typeahead input[name=script-src]').tagsinput('add', "'unsafe-inline'");
			
			$('.input-typeahead input[name=style-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=style-src]').tagsinput('add', 'https');
			$('.input-typeahead input[name=style-src]').tagsinput('add', "'unsafe-inline'");
		});
		
		//allow everything but only from the same origin
		$('#wp-csp-template-origin').click(function(){
			//clear all
			$('.input-typeahead input[name]').tagsinput('removeAll');
			
			$('.input-typeahead input[name=default-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=default-src]').tagsinput('add', "'self'");
		});
		
		//Only Allow Scripts from the same origin
		$('#wp-csp-template-origin-script').click(function(){
			//clear all
			$('.input-typeahead input[name]').tagsinput('removeAll');
			
			$('.input-typeahead input[name=script-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=script-src]').tagsinput('add', "'self'");
		});
		
		//Allow Google Analytics, Google AJAX CDN and Same Origin
		$('#wp-csp-template-origin-social').click(function(){
			//clear all
			$('.input-typeahead input[name]').tagsinput('removeAll');
			
			$('.input-typeahead input[name=script-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=script-src]').tagsinput('add', "'self'");
			$('.input-typeahead input[name=script-src]').tagsinput('add', "www.google-analytics.com");
			$('.input-typeahead input[name=script-src]').tagsinput('add', "ajax.googleapis.com");
			//fire social template
			$('#wp-csp-template-social').trigger('click');
		});
		
		$('#wp-csp-template-starter').click(function(){
			//clear all
			$('.input-typeahead input[name]').tagsinput('removeAll');
			
			$('.input-typeahead input[name=default-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=default-src]').tagsinput('add', "'none'");
			
			$('.input-typeahead input[name=script-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=script-src]').tagsinput('add', "'self'");
			
			$('.input-typeahead input[name=connect-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=connect-src]').tagsinput('add', "'self'");
			
			$('.input-typeahead input[name=img-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=img-src]').tagsinput('add', "'self'");
			
			$('.input-typeahead input[name=style-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=style-src]').tagsinput('add', "'self'");
			
			$('.input-typeahead input[name=font-src]').tagsinput('removeAll');
			$('.input-typeahead input[name=font-src]').tagsinput('add', "'self'");
		});
		
		
		$('#wp-csp-template-default').click(function(){
			$('#wp-csp-template-starter').trigger('click')
			$('#wp-csp-template-social').trigger('click')	
		});
		
		
		
})








