var FX = ( function( FX, $ ) {


	$( () => {
		FX.TestimonialsSlider.init()
	})


	FX.TestimonialsSlider = {
		$slider: null,

		init() {
			this.$slider = $('.js-testimonials-slider')

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
				vertical: true,
				verticalSwiping: true,
            });
		}
	}

	

	return FX

} ( FX || {}, jQuery ) )