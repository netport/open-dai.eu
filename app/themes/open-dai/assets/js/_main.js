// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

// Please use "js-" prefix for css hooks
// http://philipwalton.com/articles/decoupling-html-css-and-javascript/

var OPENDAI = {
  // All pages
  common: {
    init: function() {
      // JS here
    },
    finalize: function() { }
  },
  // Home page
  home: {
    init: function() {
      $(window).scroll(function() {
        // React when Jumbotron scrolls in and out
        var scrollTop   = $(window).scrollTop();
        var offset      = $('.jumbotron').offset();
        var height      = $('.jumbotron').outerHeight();
        var reactFactor = 0.55;

        if (scrollTop < reactFactor * (height + offset.top)) {
          $('.banner .navbar-brand').addClass('js-jumbotron-visible');
        } else {
          $('.banner .navbar-brand').removeClass('js-jumbotron-visible');
        }
      });
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = OPENDAI;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);
