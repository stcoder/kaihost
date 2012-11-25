var kjs_slider = {
    slider: null,
    currentSlide: 1,
    slideIn: function (number) {
        this.slider.find('#slide_' + number).show().find('.text')
            .animate({opacity: 1, top: 10}, 500);
        this.slider.find('#slide_' + number).find('.helper-text').delay(400)
            .animate({opacity: 1, top: 20, left: 40}, 200);
        this.slider.find('#slide_' + number).find('.image').delay(600)
            .animate({opacity: 1, left: 500}, 300);
    },
    slideOut: function (number) {
        this.slider.find('#slide_' + number).find('.text')
            .animate({top: 15}, 250)
            .animate({opacity: 0, top: -10}, 300);
        this.slider.find('#slide_' + number).find('.helper-text')
            .animate({opacity: 0}, 700);
        this.slider.find('#slide_' + number).find('.image').delay(200)
            .animate({left: 450}, 120)
            .animate({opacity: 0, left: 700}, {
                duration: 300,
                complete: function() {
                    $(this).parent().hide();
                }
            });
    },
    execute: function() {
        if (this.currentSlide == 1) {
            setTimeout(function() {
                kjs_slider.slideIn(kjs_slider.currentSlide);
            }, 700);
            setTimeout(function() {
                kjs_slider.slideOut(kjs_slider.currentSlide);
                kjs_slider.currentSlide = 2;
                kjs_slider.execute();
            }, 6000);
        } else if (this.currentSlide == 2) {
            setTimeout(function() {
                kjs_slider.slideIn(kjs_slider.currentSlide);
            }, 700);
            setTimeout(function() {
                kjs_slider.slideOut(kjs_slider.currentSlide);
                kjs_slider.currentSlide = 3;
                kjs_slider.execute();
            }, 6000);
        } else if (this.currentSlide == 3) {
            setTimeout(function() {
                kjs_slider.slideIn(kjs_slider.currentSlide);
            }, 700);
            setTimeout(function() {
                kjs_slider.slideOut(kjs_slider.currentSlide);
                kjs_slider.currentSlide = 1;
                kjs_slider.execute();
            }, 6000);
        }
    }
};