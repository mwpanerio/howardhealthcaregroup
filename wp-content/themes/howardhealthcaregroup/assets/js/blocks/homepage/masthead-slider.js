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
                slidesToScroll: 1,
            });
		}
	}

	

	return FX

} ( FX || {}, jQuery ) )