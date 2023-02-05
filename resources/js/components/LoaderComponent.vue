<template>
    <div class="container">
        <div class="logo-container">
            <div class="big-logo">
                <!-- Generator: Adobe Illustrator 27.2.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg id="Слой_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve">
                    <path id="голова" class="st0" d="M425,270.5C422,348,409,400,255,400c-142,0-170-43-170-129.5C85,208,161.11,141,255,141
	S425,212,425,270.5z"/>
                    <path id="ухо_пр_00000065771358673005710600000000601725058679134382_" class="st0" d="M373.26,90.25
	c23.22,2.85,51.55,178.03,51.55,178.03l-158.52-33.61C266.28,234.67,350.04,87.4,373.26,90.25z"/>
                    <path id="ухо_лв" class="st0" d="M137.48,89.16C114.27,92.01,85.93,267.2,85.93,267.2l158.52-33.61
	C244.46,233.58,160.7,86.32,137.48,89.16z"/>
                    <circle id="глаз_лв" class="st1" cx="170" cy="276" r="36"/>
                    <circle id="глаз_пр" class="st1" cx="342.2" cy="275.76" r="36"/>
                    <path id="нос" class="st1" d="M259.23,340.06c-13.23-0.06-29.75-19.92-26.06-26.79C236,308,282,309,284.24,314.16
	C287.18,320.92,272.45,340.11,259.23,340.06z"/>
                    <circle id="зрач_лв" class="st0" cx="169.5" cy="276.5" r="25.5"/>
                    <circle id="зрач_пр" class="st0" cx="341.88" cy="275.84" r="25.5"/>
                    <path id="ухо_лв_00000117659311699576529030000009241858443353879197_" class="st1" d="M142.35,113.44
	c-11.57,1.42-30.11,83.64-25.73,88.6S184.65,170.28,185,163S153.93,112.02,142.35,113.44z"/>
                    <path id="ухо_пр" class="st1" d="M367.7,115.53c11.57,1.42,30.11,83.64,25.73,88.6c-4.38,4.96-68.03-31.76-68.38-39.04
	S356.13,114.11,367.7,115.53z"/>
</svg>

            </div>
        </div>
        <div class="big-title">
            LANGAPP
        </div>
        <div class="small-title">
            via Wiktionary
        </div>
<!--        <div class="blue-slider"></div>-->
    </div>
</template>

<script>
import anime from 'animejs/lib/anime.es.js';

export default {
    name: "LoaderComponent",
    data: function () {
        return {
            count: 0,
        }
    },
    mounted(){
        this.logoAnimation();
        // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
        let vh = window.innerHeight * 0.01;
        // Then we set the value in the --vh custom property to the root of the document
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    },
    created() {

    },
    methods: {
        logoAnimation(){
            anime.timeline().add({
                targets: '.logo-container',
                translateY: ['-100vh', '0vh'],
                duration: 1000,
                delay: 1000,
                easing: 'spring',
            })
            .add({
                targets: '.logo-container',
                duration: 1000,
                rotate: '1turn',
                easing: 'spring',
            })
            .add({
                targets: '.big-title, .small-title',
                opacity: [0, 1],
                duration: 500,
                easing: 'linear',
            })
            // .add({
            //     targets: '.blue-slider',
            //     width: '100vw',
            //     duration: 1000,
            //     delay: 2000,
            // })
            .add({
                targets: '.container',
                delay: 2000,
                opacity: 0,
                duration: 1000,
                complete: () => {
                    this.$emit('finishedAnimation');
                }
            });
        },
    }
}
</script>

<style scoped>
    .container{
        height: 100vh; /* Fallback for browsers that do not support Custom Properties */
        height: calc(var(--vh, 1vh) * 100);
        width: 100vw;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fcfcfc;
    }
    .big-logo{
        width: 40vw;
        height: 40vw;
        max-width: 250px;
        max-height: 250px;
    }
    .big-title{
        font-family: Rubik;
        font-weight: 500;
        font-size: 28px;
        color: #1a202c;
    }
    .small-title{
        font-family: Rubik;
        font-size: 14px;
        color: #696969;
    }
    /*.blue-slider{*/
    /*    background: #253D86;*/
    /*    height: 100vh;*/
    /*    width: 0vh;*/
    /*    position: fixed;*/
    /*    top: 0;*/
    /*    left: 0;*/
    /*}*/
    .st0{fill:#07338C;}
    .st1{fill:#FFFFFF;}
</style>
