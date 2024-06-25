let styleTurnOn = false;

const zibSlide = function ZibSlide(objSlide) {
    let style = `
        <style>
            :root {
                --imagenet-preto:#464646;
            }
            
            img {vertical-align: middle;}
            
            .zibSlide_slideElement {
                user-select: none;
                display:block;
            }
            
            
            .zibSlide_container {
                overflow: hidden;
                position: relative;
                display: block;
                box-sizing: border-box;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-touch-callout: none;
                -khtml-user-select: none;
                -ms-touch-action: pan-y;
                touch-action: pan-y;
                -webkit-tap-highlight-color: transparent;
            }

            .zib-lista {
                position: relative;
                top: 0;
                left: 0;
                display: -webkit-inline-box;
                margin-left: auto;
                margin-right: auto;
            }
            
            .zibSlide_prev, .zibSlide_next {
                cursor: pointer;
                position: absolute;
                top: 50%;   transform: translate(0, -50%);
                width: auto;
                padding-block: 1em;
                color: white;
                font-weight: bold;
                font-size: 1.5em;
                transition: 0.6s ease;
                user-select: none;
                border:0;
                background-color: rgba(0,0,0,0.2);
            }
            
            .zibSlide_next {
                right: 0;
                padding-inline: 1em 0.5em;
                border-radius: 100% 0 0 100%;
            }
            
            .zibSlide_prev {
                left: 0;
                padding-inline: 0.5em 1em;
                border-radius: 0 100% 100% 0;
            }
            
            .zibSlide_prev:hover, .zibSlide_next:hover {
                background-color: rgba(0,0,0,0.8);
            }
            
            .zibSlide-anima-left {
                animation-name: zibSlide-anima-left;
                animation-duration: 1.5s;
            }
            
            .zibSlide-anima-right {
                animation-name: zibSlide-anima-right;
                animation-duration: 1.5s;
            }
            
            @keyframes zibSlide-anima-left {
                from {opacity: .0; transform: translate(-100%, 0);}
                to {opacity: 1; transform: translate(0, 0);}
            }
            
            
            @keyframes zibSlide-anima-right {
                from {opacity: .0; transform: translate(100%, 0);} 
                to {opacity: 1; transform: translate(0, 0);}
            }
            
            .zibSlide_dotContainer {
                position: absolute;
                bottom: 2%;
                left: 50%;
                transform: translate(-50%, 0);
                padding-block: 20px;
            }
            
            .zibSlide_dot {
                border-radius: 50%;
                width: 1em;
                height: 1em;
                margin-inline: .5em;
                display: inline-block;
                background-color: white;
                transition: .3s ease all;
            }
            
            .zibSlide_dot_active, .zibSlide_dot:hover {
                background-color: var(--imagenet-preto);
                cursor: pointer;
                scale: 1.4;
            }
            
            @media screen and (max-width: 400px) {
                .zibSlide_prev, .zibSlide_next {
                    font-size: 1em;
                    padding-block: .7em;
                }
            
                .zibSlide_next {
                    padding-inline: 0.7em 0.4em;
                }
                
                .zibSlide_prev {
                    padding-inline: 0.4em 0.7em;
                }
                
                .zibSlide_dotContainer .zibSlide_dot {
                    width: 0.7em;
                    height: 0.7em;
                }
            }
        </style>
    `;
    
    if (!styleTurnOn) {
        $('head').append(style);
        styleTurnOn = true
    }

    if(objSlide.slideClass && $(objSlide.slideClass).length > 0) {

        this.slideClass = objSlide.slideClass
        this.dots = (objSlide.dots != undefined) ? objSlide.dots : false;
        this.arrows = (objSlide.arrows != undefined) ? objSlide.arrows : true;
        this.arrowLeftClass = (objSlide.arrowLeftClass != undefined) ? objSlide.arrowLeftClass : false;
        this.arrowRightClass = (objSlide.arrowRightClass != undefined) ? objSlide.arrowRightClass : false;
        this.callback = (objSlide.callback != undefined) ? objSlide.callback : false;
        this.autorun = (objSlide.autorun != undefined) ? objSlide.autorun : false;
        this.timeAutorun = (objSlide.timeAutorun != undefined) ? parseInt(objSlide.timeAutorun) * 1000 : 15 * 1000;

        this.slides = this.slideClass;
        this.slideIndex = 1;
        this.indexWidth = 0;
        this.initSlide = false;
        this.resizeSlide = false;
        this.slideClassEdited = this.slideClass.slice(1);
        this.parentConteiner = $(this.slides).parent();
        this.slidesItem = $(this.slides)
        this.qtdeSlides = this.slidesItem.length;
        
        $(this.slides).addClass('zibSlide_slideElement');
        this.parentConteiner.addClass('zibSlide_container');

        this.buttonLeftClass = '.zibSlide_prev-' + this.slideClassEdited;
        this.buttonRightClass = '.zibSlide_next-' + this.slideClassEdited;

        if (this.arrowLeftClass) {
            this.buttonLeft =   `<button class="zibSlide_prev ${this.buttonLeftClass.slice(1)}" title="Slide anteriror"><i class="${this.arrowLeftClass.slice(1)}"></i></button>`;
        }
        else {
            this.buttonLeft =   `<button class="zibSlide_prev ${this.buttonLeftClass.slice(1)}" title="Slide anteriror">❮</button>`;
        }

        if (this.arrowRightClass) {
            this.buttonRight =  `<button class="zibSlide_next  ${this.buttonRightClass.slice(1)}" title="Próximo slide"><i class="${this.arrowRightClass.slice(1)}"></i></button>`;
        }
        else {
            this.buttonRight =  `<button class="zibSlide_next  ${this.buttonRightClass.slice(1)}" title="Próximo slide">❯</button>`;
        }

        this.dotConteinerHtml = '<div class="zibSlide_dotContainer"></div>';
        this.dotConteinerClass = '.zibSlide_dotContainer';

        this.dotHtml = '<span class="zibSlide_dot"></span>';
        this.dotClass = '.zibSlide_dot';

        this.X_start = 0;
        this.X_end = 0;
        this.X_live = 0;
        this.X_move = 0;
        this.tolerancia = 70;

        this.setAutorun = ()=>{
            this.slideIndex += 1;
            if (this.slideIndex > this.slidesItem.length) this.slideIndex = 1;

            this.showSlides({index: this.slideIndex});
        }
        

        this.showSlides = function ({index, resetTime}) {
            if (this.dots === true) {

                if(!this.parentConteiner.find(this.dotConteinerClass).length) {
                    this.parentConteiner.append(this.dotConteinerHtml);
                    this.dotConteinerElement = this.parentConteiner.find(this.dotConteinerClass)
                }
                
                if (!this.dotConteinerElement.find(this.dotClass).length) {
                    for (let d = 0; d < this.slidesItem.length; d++) {

                        if (d == 0) {
                            this.dotConteinerElement.append(this.dotHtml)
                            this.dotElement = this.dotConteinerElement.find(this.dotClass)
                            
                            $(this.dotElement[d]).attr("data-slide-index", d+1)
                            $(this.dotElement[d]).addClass("zibSlide_dot_active")
                        }
                        else {
                            this.dotConteinerElement.append(this.dotHtml)
                            this.dotElement = this.dotConteinerElement.find(this.dotClass)
                            
                            $(this.dotElement[d]).attr("data-slide-index", d+1)
                        }
                    }
                }
            }

            if (this.initSlide === false) {
                this.parentConteiner.prepend(`<div class="zib-lista"></div>`)
                this.zibLista = this.parentConteiner.find('div.zib-lista');

                for (let j = 0; j < this.slidesItem .length; j++) {
                    this.zibLista.append(this.slidesItem[j])
                }

                if(this.zibLista.find('img').length) this.zibLista.find('img').attr('draggable', false);
                
                this.initSlide = true;
            }

            if (this.resizeSlide === false) {
                this.widthWindow = ($(this.zibLista.parent()[0]).width() == 0)? $(window).width() : $(this.zibLista.parent()[0]).width()

                 $(this.zibLista.parent()[0]).width();

                this.zibLista.css('width', (this.widthWindow) * this.qtdeSlides);
                this.slidesItem.css('width', this.widthWindow);

                this.resizeSlide = true;
            }

            if (resetTime === true) {
                clearInterval(this.clearTimeAutorun)
                this.clearTimeAutorun = setInterval(this.setAutorun, this.timeAutorun)
            }
            
            if (index > this.qtdeSlides) {this.slideIndex = this.qtdeSlides;}    
            if (index < 1) {this.slideIndex = 1;}
            this.indexWidth = (this.widthWindow * (this.slideIndex - 1)) * (-1);

            if (this.callback != false) this.callback();

            this.zibLista.css('transition', 'transform 300ms ease 0ms')
            setTimeout(()=>{this.zibLista.css('transition', '')},300)
            this.zibLista.css('transform', 'translate(' + this.indexWidth + 'px, 0)')
            
            if(this.dots === true) for (let i = 0; i < this.slidesItem.length; i++) {
                $(this.dotElement[i]).removeClass('zibSlide_dot_active');  
            }

            if(this.dots === true) $(this.dotElement[this.slideIndex - 1]).addClass('zibSlide_dot_active');  
        }

        this.showSlides(this.slideIndex);
        $(window).resize(()=>{this.resizeSlide = false; this.showSlides({index: this.slideIndex})})
        
        if (this.autorun === true ) {
            this.clearTimeAutorun = setInterval(this.setAutorun ,this.timeAutorun)
        }

        if (this.arrows === true) {
            this.parentConteiner.append(this.buttonLeft);
            this.parentConteiner.append(this.buttonRight);
            
            this.buttonLeft = $(this.buttonLeftClass)
            this.buttonRight = $(this.buttonRightClass)
            
            $(document).on('click', this.buttonLeftClass, ()=>{
                this.slideIndex-=1; 
                this.showSlides({index: this.slideIndex, resetTime: this.autorun})
            })
            $(document).on('click', this.buttonRightClass, ()=>{
                this.slideIndex+=1; 
                this.showSlides({index: this.slideIndex, resetTime: this.autorun})
            })
        }
        
        if (this.dots === true) {
            $(document).on('click', this.dotClass, (event)=>{
                this.slideIndex = $(event.target).attr('data-slide-index')
                this.showSlides({index: this.slideIndex, resetTime: this.autorun});
            })
        }

        if(this.parentConteiner.find('img').length) this.parentConteiner.find('img').attr('draggable', false);
        this.parentConteiner.css('overflow', 'hidden')

        $(document).on('mousedown touchstart', this.slides, (event)=>{
            if(event.originalEvent.touches) {
                event = event.originalEvent.touches[0];
            }
            
            this.X_start = event.clientX;
            
            $(document).on('mousemove touchmove', this.slides, (event)=>{
                if(event.originalEvent.touches) {
                    event = event.originalEvent.touches[0];
                }

                this.X_live = this.indexWidth + (event.clientX - this.X_start); 
                
                this.zibLista.css('transform', 'translate(' + this.X_live + 'px, 0)')
            })
        })

        $(document).on('mouseup mouseleave touchcancel touchend', this.slides, (event)=>{
            if(event.originalEvent.touches) {
                event = event.originalEvent.changedTouches[0];
            }

            this.X_end = event.clientX;
            this.X_move = this.X_end - this.X_start;
            this.X_moveAbs = Math.abs(this.X_move);

            if (this.X_moveAbs > this.tolerancia && event.type != 'mouseleave') {
                // Move esquerda
                if (this.X_move > 0) {
                    this.slideIndex-=1; 
                    this.showSlides({index: this.slideIndex, resetTime: this.autorun})
                }
                // Move direita
                else {
                    this.slideIndex+=1; 
                    this.showSlides({index: this.slideIndex, resetTime: this.autorun})
                }
            }
            this.zibLista.css('transform', 'translate(' + this.indexWidth + 'px, 0)');
            $(document).off('mousemove touchmove', this.slides)
        })
    }
    else {
        return undefined;
    }
}
