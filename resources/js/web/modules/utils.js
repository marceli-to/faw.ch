import LazyLoad from '../vendor/lazyload';

var Utils = (function() {
	
	// selectors
	var selectors = {
    html:      'html',
    body:      'body',
    btnTouch:  '[data-touch]',
    btnMore:   '[data-more]',
    btnLess:   '[data-less]',
    btnToggle: '[data-toggle]',
  };

  var classes = {
    active: 'is-active',
    touched: 'is-touched',
  };

  // Init
  var _initialize = function() {
    _bind();
  };

  // Bind events
  var _bind = function() {
    $(selectors.btnTouch).on('touchstart', function(e) {
      $(this).addClass(classes.touched);
    });

    $(selectors.btnTouch).on('touchend', function(e) {
      $(this).removeClass(classes.touched);
    });

    $(selectors.btnMore).on('click', function(e) {
      $(this).hide();
      $(this).prev('div').hide();
      $(this).next('div').show();
    });

    $(selectors.btnToggle).on('click', function(e) {
      $(this).toggleClass(classes.active);
      $(this).next('div').toggle();
    });

    $(selectors.btnLess).on('click', function(e) {
      $(this).parent('div').hide();
      $(this).parent('div').prev('a').show();
      $(this).parent('div').prev('a').prev('div').show();
    });

    // var lazyLoadInstance = new LazyLoad();
  };


  /* --------------------------------------------------------------
    * RETURN PUBLIC METHODS
    * ------------------------------------------------------------ */

  return {
    init:  _initialize,
  };
	
})();

// Initialize
$(function() {
  Utils.init();
});

