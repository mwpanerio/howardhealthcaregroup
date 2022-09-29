/* ---------------------------------------------------------------------
	Global Js
	Target Browsers: All

	HEADS UP! This script is for general functionality found on ALL pages and not tied to specific components, blocks, or
	plugins. 

	If you need to add JS for a specific block or component, create a script file in js/components or js/blocks and
	add your JS there. (Don't forget to enqueue it!)
------------------------------------------------------------------------ */

var FX = ( function( FX, $ ) {

	/**
	 * Doc Ready
	 * 
	 * Use a separate $(function() {}) block for each function call
	 */
	$( () => {
		FX.General.init(); // For super general or super short scripts
	})

    $( () => {
        FX.ExternalLinks.init(); // Enable by default
	})

	$( () => {
        FX.MobileMenu.init(); // Enable by default
	})

	$( () => {
        FX.CardIconHover.init(); // Enable by default
	})
	
	
	$(window).on( 'load', () => {
		FX.BackToTop.init()
	})



	/**
	 * Example Code Block - This should be removed
	 * @type {Object}
	 */
	FX.CodeBlock = {
		init() {

		},
	};



	/**
	 * Display scroll-to-top after a certain amount of pixels
	 * @type {Object}
	 */
	FX.BackToTop = {
		$btn: null,

		init() {
			this.$btn = $('.back-to-top');

			if( this.$btn.length ) {
				this.bind();
			}
		},

		bind() {
			$(window).on( 'scroll load', this.maybeShowButton.bind( this ) );
			this.$btn.on( 'click', this.scrollToTop );
		},

		maybeShowButton() {
			if( $( window ).scrollTop() > 100 ) {
				this.$btn.removeClass( 'hide' );
			} else {
				this.$btn.addClass( 'hide' );
			}
		},

		scrollToTop() {
			$(window).scrollTop( 0 );
		}
	};

	
	
	/**
	 * General functionality — ideal for one-liners or super-duper short code blocks
	 */
	FX.General = {
		init() {
			this.bind();
			this.inputEffects()
		},

		bind() {

			// Makes all PDF to open in new tabs
			$('a[href*=".pdf"]').each( e => {
				$(this).attr('target', '_blank');
			});

			// FitVids - responsive videos
			$('body').fitVids();

			// Input on focus remove placeholder
			$('input,textarea').focus( () => {
				$(this).removeAttr('placeholder');
			});
			
			// nav search toggle
			$('.js-search-toggle').on('click', () => {
				$('.desktop-menu__phone, .js-search-toggle, .desktop-menu__search').toggleClass('js-search-active');
                $('.desktop-menu__search input[name="s"]').focus();
			});

			if($(".js-testimonials-slider").length > 0) {
				$(".js-testimonials-slider").slick( {
					dots: false,
					arrows: true,
					autoplay: false,
					slidesToShow: 1,
					slidesToScroll: 1,
					vertical: true,
					verticalSwiping: true,
					centerMode: true,
				});
			}

			$('.wysiwyg').each(function() {
				const $this = $(this);

				$this.find('table').wrap('<div class="table-scroll"><div class="table-structure"></div></div>');

				if($this.find('blockquote').length > 0) {
					$this.find('blockquote').each(function() {
						const $thisBlockquote = $(this);
	
						if($thisBlockquote.find('i').length == 0) {
							$thisBlockquote.prepend('<i class="icon-small-quotes"></i>')
						}
					})
				}
			})
		},


		/**
		 * Adds special classes to form elements when user clicks/fills fields
		 * 
		 */
		inputEffects() {
			$('input, textarea').on('click focus blur', e => {
				const $el = $(e.currentTarget)
				const $wrapper = $el.closest('.wpcf7-form-control-wrap')
				const { type } = e

				if ('click' === type || 'focus' === type) {
					$wrapper.addClass('input-has-value')
				} else if ('blur' === type) {
					if ('' === $el.val()) {
						$wrapper.removeClass('input-has-value')
					}
				}
			})
		}
	};



	/**
	 * Mobile menu script for opening/closing menu and sub menus
	 * @type {Object}
	 */
	FX.MobileMenu = {
		init() {
			$('.nav-primary li.menu-item-has-children > a').after('<span class="sub-menu-toggle icon-down-angle hidden-md-up"></span>');

			$('.sub-menu-toggle' ).on('click', function() {
				const $this = $(this);
				const $wrap = $this.next( '.sub-menu' );

				$this.toggleClass('is-active');
				$this.next('.sub-menu').stop().slideToggle();
			});

			$('.toggle-menu').on('click', function() {
				const $this = $(this);

				$this.toggleClass('is-active');
				$('.nav-primary').stop().slideToggle();
			})
		}
	};



	/**
	 * Force External Links to open in new window.
	 * @type {Object}
	 */
	FX.ExternalLinks = {
		init() {
			var siteUrlBase = FX.siteurl.replace( /^https?:\/\/((w){3})?/, '' );

			$( 'a[href*="//"]:not([href*="'+siteUrlBase+'"])' )
				.not( '.ignore-external' ) // ignore class for excluding
				.addClass( 'external' )
				.attr( 'target', '_blank' )
				.attr( 'rel', 'noopener' );
		}
	};



	/**
	 * Affix
	 * Fixes sticky items on scroll
	 * @type {Object}
	 */
	FX.Affix = {

		$body: 			null,
		$header: 		null,
		headerHeight: 	null,
		scrollFrame: 	null,
		resizeFrame: 	null,


		init() {
			this.$body 			= $(document.body);
			this.$header 		= $('#page-header');
			this.headerHeight 	= this.$header.outerHeight( true );

			this.bind();
        },


        bind(e) {
			$(window).on( 'scroll', this.handleScroll.bind( this ) );
			$(window).on( 'resize', this.handleResize.bind( this ) );
		},


		handleScroll( e ) {
			var self = this;

			// avoid constantly running intensive function(s) on scroll
			if( null !== self.scrollFrame ) {
				cancelAnimationFrame( self.scrollFrame )
			}

			self.scrollFrame = requestAnimationFrame( self.maybeAffixHeader.bind( self ) )
		},


		handleResize( e ) {
			var self = this;

			// avoid constantly running intensive function(s) on resize
			if( null !== self.resizeFrame ) {
				cancelAnimationFrame( self.resizeFrame )
			}

			self.resizeFrame = requestAnimationFrame( () => {
				self.headerHeight = self.$header.outerHeight( true );
			})
		},


		maybeAffixHeader() {
			var self = this;

			if( 200 < $(window).scrollTop() ) {
				self.$body.css( 'padding-top', self.headerHeight );
				self.$header.addClass('js-scrolled');
			} else {
				self.$body.css( 'padding-top', 0 );
				self.$header.removeClass('js-scrolled');
			}
		}
	};



	/**
	 * FX.SmoothAnchors
	 * Smoothly Scroll to Anchor ID
	 * @type {Object}
	 */
	FX.SmoothAnchors = {
		hash: null,

		init() {
			this.hash = window.location.hash;

			if( '' !== this.hash ) {
				this.scrollToSmooth( this.hash );
			}

			this.bind();
		},

		bind() {
			$( 'a[href^="#"]' ).on( 'click', $.proxy( this.onClick, this ) );
		},

		onClick( e ) {
			e.preventDefault();

			var target = $( e.currentTarget ).attr( 'href' );

			this.scrollToSmooth( target );
		},

		scrollToSmooth( target ) {
			var $target = $( target ),
				headerHeight = 0
			
			$target = ( $target.length ) ? $target : $( this.hash );

			if ( $target.length ) {
				var targetOffset = $target.offset().top - headerHeight;

				$( 'html, body' ).animate({ 
					scrollTop: targetOffset 
				}, 600 );

				return false;
			}
		}
	};

	FX.CardIconHover = {
		init() {
			$('.js-card-article').on('mouseenter', function() {
				const $this = $(this);

				$('.js-card-article').not($this).addClass('is-not-focused');
				$this.addClass('is-focused');
			})

			$('.js-card-article').on('mouseleave', function() {
				const $this = $(this);

				$('.js-card-article').not($this).removeClass('is-not-focused');
				$this.removeClass('is-focused');
			})
		},
	};

	

	return FX;

} ( FX || {}, jQuery ) );
