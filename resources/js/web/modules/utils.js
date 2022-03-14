import LazyLoad from '../vendor/lazyload';

var Utils = (function() {
	
	// selectors
	var selectors = {
    html:     'html',
    body:     'body',
    btnTouch: '[data-touch]',
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

    var lazyLoadInstance = new LazyLoad();
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

