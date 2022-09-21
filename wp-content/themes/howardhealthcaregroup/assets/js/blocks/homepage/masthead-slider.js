var FX = ( function( FX, $ ) {


	$( () => {
		FX.MastheadSlider.init()
	})


	FX.MastheadSlider = {
		$slider: null,

		init() {
			this.$slider = $('.js-masthead-homepage-slider')

			if( this.$slider.length ) {
				this.applySlick()
			}
		},

		applySlick() {
            this.$slider.slick( {
                dots: false,
				arrows: false,
                autoplay: false,
                slidesToShow: 1,
				loop: false,
                slidesToScroll: 1,
            });

			$('.js-masthead-dot').on('click', function() {
				const $this = $(this);
				const $slideIndex = parseFloat($this.data('slide-dots'));

				$('.js-masthead-dot').removeClass('is-active');
				$(`.js-masthead-dot[data-slide-dots=${$slideIndex}]`).addClass('is-active');

				$('.js-masthead-homepage-slider').slick('slickGoTo', $slideIndex);
			})
		}
	}

	

	return FX

} ( FX || {}, jQuery ) )