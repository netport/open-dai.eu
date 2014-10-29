
+function ($, document, window) {
  'use strict';

  // HERO CLASS DEFINITION
  // =====================

  var Hero = function (element, options) {
    this.options    =
    this.$window    = $(window)
      .on('load', $.proxy(this.load, this))
      .on('resize', $.proxy(this.resize, this))

    this.$element   = null
    this.$assets    = null

    this.init('hero', element, options)
  }

  Hero.DEFAULTS = {
    marginBottom    : 22
  }

  Hero.prototype.init = function (type, element, options) {
    this.$element   = $(element)
    this.options    = this.getOptions(options)
    this.$nextLink  = $('.next-link', this.$element)
      .on('click', $.proxy(this.next, this))
  }

  Hero.prototype.load = function () {
    this.resize()
  }

  Hero.prototype.getDefaults = function () {
    return Hero.DEFAULTS
  }

  Hero.prototype.getOptions = function (options) {
    options = $.extend({}, this.getDefaults(), this.$element.data(), options)
    return options
  }

  Hero.prototype.resize = function () {
    if (this.$window.height() > this.$element.height()) {
      this.$element.css('min-height', this.$window.height()-this.options.marginBottom)
      this.$nextLink.show()
    } else {
      this.$element.css('min-height', 'auto')
      this.$nextLink.hide()
    }
  }

  Hero.prototype.next = function () {
    this.$nextLink.hide()
    $('html, body').animate({
      scrollTop: this.$element.offset().top + this.$element.outerHeight() - $('.banner').outerHeight()
    }, 1200, 'swing')
  }

  // RESOURCE PLUGIN DEFINITION
  // ==========================

  var old = $.fn.hero

  $.fn.hero = function (option) {
    return this.each(function () {
      var $this     = $(this)
      var data      = $this.data('hero')
      var options   = typeof option == 'object' && option

      if (!data) $this.data('hero', (data = new Hero(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.hero.Constructor = Hero


  // RESOURCE NO CONFLICT
  // ====================

  $.fn.hero.noConflict = function () {
    $.fn.hero = old
    return this
  }

  // RESOURCE AUTO INIT
  // ==================

  $(document).on('ready', function () {
    $('.hero').each(function () {
      var $hero = $(this)
      $hero.hero()
    })
  })

}(jQuery, document, window);
