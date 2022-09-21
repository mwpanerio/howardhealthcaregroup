var FX = ( function( FX, $ ) {


	$( () => {
		FX.HomepageAnimationScript.init()
	})


	FX.HomepageAnimationScript = {
		init() {
			gsap.registerPlugin(ScrollTrigger);
            const controller = new ScrollMagic.Controller();
            const mastheadAnimationTimeline = new TimelineMax();
            const testimonialBlockAnimation = new TimelineMax();


            mastheadAnimationTimeline
                .to('.masthead-slide__background', 0.25, {
                    opacity: 1,
                    onComplete: function() {
                        $('.masthead-slide__background').addClass('is-shown');
                    }
                })
                .staggerTo('.js-masthead-animation .js-masthead-animation-item', 1.6, {
                    'transform': 'translate(0, 0)',
                    'opacity' : 1,
                    ease : Power4.easeOut
                }, 0.2, '+=0.25')
            
            testimonialBlockAnimation
                .to('.testimonials-block', 1, {
                    'transform': 'translate(0, 0)',
                    'opacity' : 1,
                    ease : Power4.easeOut
                }, '+=1')


            $('.js-card-icon-container').each(function() {
                const $this = $(this);

                const cardIconTimeline = new TimelineMax()
                    .staggerTo($this.find('.js-card-icon-item'), 0.8, {opacity: 1, 'transform': 'translate(0, 0) scale(1)'}, 0.15)

                const scene = new ScrollMagic.Scene({
                    triggerElement: $this[0],
                    triggerHook: 0.85
                })
                .setTween(cardIconTimeline)
                .addTo(controller);

            })

            const textBlockIconTimeline = new TimelineMax()
                .staggerTo($('.text-block-icon__text').find(' > *'), 0.8, {opacity: 1, top: 0}, 0.15)

            const scene = new ScrollMagic.Scene({
                triggerElement: '.text-block-icon__text',
                triggerHook: 0.85
            })
            .setTween(textBlockIconTimeline)
            .addTo(controller);

            const postToDisplayAnimation = new TimelineMax()
                .staggerTo($('.js-card-container').find('.js-card-article a'), 0.8, {opacity: 1, 'transform': 'translate(0, 0) scale(1)'}, 0.15)

            const postToDisplayAnimationScene = new ScrollMagic.Scene({
                triggerElement: '.js-card-container',
                triggerHook: 0.85
            })
            .setTween(postToDisplayAnimation)
            .addTo(controller);

            const imageTextAnimation = new TimelineMax()
                .staggerTo('.image-text--homepage .image-text__text > *', 0.8, {
                    'transform': 'translate(0, 0)',
                    opacity : 1
                }, 0.15)
                .to('.image-text--homepage .image-text__img__wrapper', 0.8, {
                    'transform': 'scaleY(1)'
                }, '-=0.8')
                .to('.image-text--homepage .image-text__img__overlay', 0.8, {
                    'transform': 'scaleY(0)'
                })
                .to('.image-text--homepage .image-text__img__info', 0.8, {
                    'transform': 'scaleY(1)'
                }, '-=0.8')
                .to('.image-text--homepage .image-text__img__info > span', 0.8, {
                    'transform': 'scaleY(0)'
                })

            const imageTextAnimationScene = new ScrollMagic.Scene({
                triggerElement: '.image-text__img__wrapper',
                triggerHook: 0.85
            })
            .setTween(imageTextAnimation)
            .addTo(controller);
		},
	}

	

	return FX

} ( FX || {}, jQuery ) )