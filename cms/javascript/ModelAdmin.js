/**
 * Javascript handlers for generic model admin.
 * 
 * Most of the work being done here is intercepting clicks on form submits,
 * and managing the loading and sequencing of data between the different panels of
 * the CMS interface.
 * 
 * @todo add live query to manage application of events to DOM refreshes
 * @todo alias the $ function instead of literal jQuery
 */
(function($) {
$(document).ready(function() {
	/** 
	 * Add class ajaxActions class to the parent of Add button of AddForm
	 * so it float to the right
	 */
	$('#Form_AddForm_action_doCreate').livequery(function(){
		$(this).parent().addClass('ajaxActions');
	});
	
    /*
     * Highlight buttons on click
     */
	$('input[type=submit]').livequery('click', function() {
	    $(this).addClass('loading');
	});
	
	$("#right").scroll( function () {
		positionActionArea();
	});
	
	$(window).resize( function() {
		positionActionArea();
	});
	
	/*
	 * Make the status message and ajax action button fixed 
	 */
	function positionActionArea() {
		if ( $.browser.msie && $.browser.version.indexOf("6.", 0)==0 ) {
			newTopValue = $("#right").scrollTop()+$(window).height()-139;
			$('.ajaxActions').css('top', newTopValue);
			$('#statusMessage').css('top', newTopValue);
		}
	}

	////////////////////////////////////////////////////////////////// 
	// Search form 
	////////////////////////////////////////////////////////////////// 
	
	/**
	 * If a dropdown is used to choose between the classes, it is handled by this code
	 */
    $('#ModelClassSelector select')
        // Set up an onchange function to show the applicable form and hide all others
        .change(function() {
            var $selector = $(this);
            $('option', this).each(function() {
                var $form = $('#'+$(this).val());
                if($selector.val() == $(this).val()) $form.show();
                else $form.hide();
            });
        })
        // Initialise the form by calling this onchange event straight away
        .change();

	/**
	 * Stores a jQuery reference to the last submitted search form.
	 */
	__lastSearch = null;

	/**
	 * Submits a search filter query and attaches event handlers
	 * to the response table, excluding the import form because 
	 * file ($_FILES) submission doesn't work using AJAX 
	 * 
	 * Note: This is used for Form_CreateForm too
	 * 
	 * @todo use livequery to manage ResultTable click handlers
	 */
	$('#SearchForm_holder .tab form:not(#Form_ImportForm)').submit(function () {
	    var $form = $(this);

		$('#ModelAdminPanel').fn('startHistory', $(this).attr('action'), $(this).formToArray());
	    $('#ModelAdminPanel').load($(this).attr('action'), $(this).formToArray(), standardStatusHandler(function(result) {
			if(!this.future || !this.future.length) {
			    $('#Form_EditForm_action_goForward, #Form_ResultsForm_action_goForward').hide();
		    }
			if(!this.history || this.history.length <= 1) {
			    $('#Form_EditForm_action_goBack, #Form_ResultsForm_action_goBack').hide();
		    }

    		$('#form_actions_right').remove();
    		Behaviour.apply();
			console.log(window.onresize);
			if(window.onresize) window.onresize();
    		// Remove the loading indicators from the buttons
    		$('input[type=submit]', $form).removeClass('loading');
	    }, 
	    // Failure handler - we should still remove loading indicator
	    function () {
    		$('input[type=submit]', $form).removeClass('loading');
	    }));
	    return false;
	});

	/**
	 * Clear search button
	 */
	$('#SearchForm_holder button[name=action_clearsearch]').click(function(e) {
		$(this.form).resetForm();
		return false;
	});

	/**
	 * Column selection in search form
	  */
	$('a.form_frontend_function.toggle_result_assembly').click(function(){
		var toggleElement = $(this).next();
		toggleElement.toggle();
		return false;
	});
	
	$('a.form_frontend_function.tick_all_result_assembly').click(function(){
		var resultAssembly = $(this).prevAll('div#ResultAssembly').find('ul li input');
		resultAssembly.attr('checked', 'checked');
		return false;
	});
	
	$('a.form_frontend_function.untick_all_result_assembly').click(function(){
		var resultAssembly = $(this).prevAll('div#ResultAssembly').find('ul li input');
		resultAssembly.removeAttr('checked');
		return false;
	});

	////////////////////////////////////////////////////////////////// 
	// Results list 
	////////////////////////////////////////////////////////////////// 
	
	/**
	 * Table record handler for search result record
	 * @todo: Shouldn't this be part of TableListField?
	 */
	$('#right #Form_ResultsForm tbody td a:not(.deletelink,.downloadlink)')
	    .livequery('click', function(){
	        $(this).parent().parent().addClass('loading');
    		var el = $(this);
    		$('#ModelAdminPanel').fn('addHistory', el.attr('href'));
    		$('#ModelAdminPanel').fn('loadForm', el.attr('href'));
    		return false;
    	});
    	/* this isn't being used currently; the real hover code is part of TableListField
    	.hover(
    	    function(){
        		$(this).addClass('over').siblings().addClass('over')
        	}, 
        	function(){
        		$(this).removeClass('over').siblings().removeClass('over')
        	}
        );
        */

	////////////////////////////////////////////////////////////////// 
	// RHS detail form
	////////////////////////////////////////////////////////////////// 

    /**
     * RHS panel Back button
     */
	$('#Form_EditForm_action_goBack, #Form_ResultsForm_action_goBack').livequery('click', function() {
	    $('#ModelAdminPanel').fn('goBack');
		return false;
	});

    /**
     * RHS panel Back button
     */
	$('#Form_ResultsForm_action_goForward').livequery('click', function() {
	    $('#ModelAdminPanel').fn('goForward');
		return false;
	});
	
	/**
	 * RHS panel Save button 
	 */
	$('#right #form_actions_right input[name=action_doSave]').livequery('click', function(){
		var form = $('#right form');
		var formAction = form.attr('action') + '?' + $(this).fieldSerialize();
		
		// Post the data to save
		$.post(formAction, form.formToArray(), function(result){
			$('#right #ModelAdminPanel').html(result);
			
			statusMessage(ss.i18n._t('ModelAdmin.SAVED'));

			// TODO/SAM: It seems a bit of a hack to have to list all the little updaters here. 
			// Is livequery a solution?
			Behaviour.apply(); // refreshes ComplexTableField
			if(window.onresize) window.onresize();
		}, 'html');

		return false;
	});
	
	/**
	 * RHS panel Delete button
	 */
	$('#right #form_actions_right input[name=action_doDelete]').livequery('click', function(){
		var confirmed = confirm(ss.i18n._t('ModelAdmin.REALLYDELETE'));
		if(!confirmed) {
			$(this).removeClass('loading')
			return false;
		}

		var form = $('#right form');
		var formAction = form.attr('action') + '?' + $(this).fieldSerialize();

        // The POST actually handles the delete
		$.post(formAction, form.formToArray(), function(result){
		    // On success, the panel is refreshed and a status message shown.
			$('#right #ModelAdminPanel').html(result);
			
			statusMessage(ss.i18n._t('ModelAdmin.DELETED'));
    		$('#form_actions_right').remove();
            
            // To do - convert everything to jQuery so that this isn't needed
			Behaviour.apply(); // refreshes ComplexTableField
		});
		
		return false;
	});

		
	////////////////////////////////////////////////////////////////// 
	// Import/Add form 
	////////////////////////////////////////////////////////////////// 

	/**
	 * Add object button
	 */
	$('#Form_ManagedModelsSelect').submit(function(){
		className = $('select option:selected', this).val();
		requestPath = $(this).attr('action').replace('ManagedModelsSelect', className + '/add');
		var $button = $(':submit', this);
		$('#ModelAdminPanel').fn(
			'loadForm', 
			requestPath,
			function() {
				$button.removeClass('loading');
				$button = null;
			}
		);
		$('#form_actions_right').remove();
		return false;
	});
	
	/**
	 * Toggle import specifications
	 */
	$('.importSpec .details').hide();
	$('.importSpec a.detailsLink').click(function() {
		$('#' + $(this).attr('href').replace(/.*#/,'')).toggle();
		return false;
	});

	////////////////////////////////////////////////////////////////// 
	// Helper functions
	////////////////////////////////////////////////////////////////// 
	
    $('#ModelAdminPanel').fn({
        /**
         * Load a detail editing form into the main edit panel
         * @todo Convert everything to jQuery so that the built-in load method can be used with this instead
         */
        loadForm: function(url, successCallback) {
    	    $('#right #ModelAdminPanel').load(url, standardStatusHandler(function(result) {
				if(typeof(successCallback) == 'function') successCallback.apply();
				if(!this.future || !this.future.length) {
				    $('#Form_EditForm_action_goForward, #Form_ResultsForm_action_goForward').hide();
			    }
				if(!this.history || this.history.length <= 1) {
				    $('#Form_EditForm_action_goBack, #Form_ResultsForm_action_goBack').hide();
			    }
				
    			Behaviour.apply(); // refreshes ComplexTableField
				if(window.onresize) window.onresize();
    		}));
    	},
    	
    	startHistory: function(url, data) {
    	    this.history = [];
    	    $(this).fn('addHistory', url, data);
    	},
    	
    	/**
    	 * Add an item to the history, to be accessed by goBack and goForward
    	 */
    	addHistory: function(url, data) {
    	    // Combine data into URL
    	    if(data) {
    	        if(url.indexOf('?') == -1) url += '?' + $.param(data);
    	        else url += '&' + $.param(data);
	        }
	        
	        // Add to history 
    	    if(this.history == null) this.history = [];
    	    this.history.push(url);
    	    
    	    // Reset future
    	    this.future = [];
    	},
    	
    	goBack: function() {
    	    if(this.history && this.history.length) {
        	    if(this.future == null) this.future = [];
        	    
        	    var currentPage = this.history.pop();
        	    var previousPage = this.history[this.history.length-1];
        	    
        	    this.future.push(currentPage);
        	    $(this).fn('loadForm', previousPage);
    	    }
    	},
    	
    	goForward: function() {
    	    if(this.future && this.future.length) {
        	    if(this.future == null) this.future = [];
        	    
        	    var nextPage = this.future.pop();
        	    
        	    this.history.push(nextPage);
        	    $(this).fn('loadForm', nextPage);
    	    }
    	}

    });
	
	/**
	 * Standard SilverStripe status handler for ajax responses
	 * It will generate a status message out of the response, and only call the callback for successful responses
	 *
	 * To use:
	 *    Instead of passing your callback function as:
	 *       function(response) { ... }
	 * 
	 *    Pass it as this:
	 *       standardStatusHandler(function(response) { ... })
	 */
	function standardStatusHandler(callback, failureCallback) {
	    return function(response, status, xhr) {
	        // If the response is takne from $.ajax's complete handler, then swap the variables around
	        if(response.status) {
	            xhr = response;
	            response = xhr.responseText;
	        }

	        if(status == 'success') {
	            statusMessage(xhr.statusText, "good");
	            $(this).each(callback, [response, status, xhr]);
			} else {
	            errorMessage(xhr.statusText);
	            if(failureCallback) $(this).each(failureCallback, [response, status, xhr]);
			}
	    }
	}
	
})
})(jQuery);

/**
 * @todo Terrible HACK, but thats the cms UI...
 */
function fixHeight_left() {
	//fitToParent('LeftPane');
	fitToParent('Search_holder',12);
	fitToParent('ResultTable_holder',12);
}

function prepareAjaxActions(actions, formName, tabName) {
	// @todo HACK Overwrites LeftAndMain.js version of this method to avoid double form actions
	// (by new jQuery and legacy prototype) 
	return false;
}
