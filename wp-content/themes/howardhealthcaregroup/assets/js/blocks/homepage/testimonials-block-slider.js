var FX = ( function( FX, $ ) {


	$( () => {
		FX.TestimonialsBlockSlider.init()
	})


	FX.TestimonialsBlockSlider = {
		$slider: null,

		init() {
			this.$slider = $('.js-testimonials-block-slider')

			if( this.$slider.length ) {
				this.applySlick()
			}
		},

		applySlick() {
            this.$slider.slick( {
                dots: false,
				arrows: true,
                autoplay: false,
                slidesToShow: 1,
                slidesToScroll: 1,
				fade: true
            });
		}
	}

	

	return FX

} ( FX || {}, jQuery ) )