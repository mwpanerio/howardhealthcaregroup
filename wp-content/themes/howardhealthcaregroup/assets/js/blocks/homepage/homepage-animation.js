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

            const fullWidthAnimationTimeline = new TimelineMax()
                .to('.full-width-image-text__wrapper', 0.6, {
                    'transform': 'scaleY(1)',
                })
                .to('.full-width-image-text__overlay', 0.6, {
                    'transform': 'scaleY(0)',
                })
                .staggerTo('.full-width-image-text__content > *', 0.8, {
                    'transform': 'translate(0, 0)',
                    opacity : 1
                }, 0.15)

            const fullWidthAnimationScene = new ScrollMagic.Scene({
                triggerElement: '.full-width-image-text__content',
                triggerHook: 0.85
            })
            .setTween(fullWidthAnimationTimeline)
            .addTo(controller);

            const floatingImageTimeline = new TimelineMax()
                .to('.image-text__img__large', 0.6, {
                    'transform': 'scaleY(1)',
                })
                .to('.image-text__img__large > span', 0.6, {
                    'transform': 'scaleY(0)',
                })
                .to('.image-text__img__small', 0.6, {
                    'transform': 'scaleY(1)',
                }, '-=0.7')
                .to('.image-text__img__small > span', 0.6, {
                    'transform': 'scaleY(0)',
                })

            const floatingImageScene = new ScrollMagic.Scene({
                triggerElement: '.image-text-floating--homepage .image-text__img__overlay',
                triggerHook: 0.85
            })
            .setTween(floatingImageTimeline)
            .addTo(controller);

            const floatingImageContentTimeline = new TimelineMax()
                .staggerTo('.image-text-floating--homepage .image-text__text > *', 0.8, {
                    'transform': 'translate(0,0) scale(1)',
                    opacity: 1
                }, 0.25)

            const floatingImageContentScene = new ScrollMagic.Scene({
                triggerElement: '.image-text-floating--homepage .image-text__text',
                triggerHook: 0.85
            })
            .setTween(floatingImageContentTimeline)
            .addTo(controller);
		},
	}

	

	return FX

} ( FX || {}, jQuery ) )