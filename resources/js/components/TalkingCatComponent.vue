<template>
    <div class="container">
        <div class="action-buttons">

        </div>
        <div class="cat-chat">
            <div class="messages">
                <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 294.33 144.68" style="enable-background:new 0 0 294.33 144.68;" xml:space="preserve">

                    <path class="st0" d="M294.33,42.2v41.13c0,23.31-18.89,42.2-42.2,42.2h-71.98c0.71,0-18.44,19.15-18.44,19.15l-20.57-19.15H42.2
	c-23.3,0-42.2-18.89-42.2-42.2V42.2C0,18.89,18.9,0,42.2,0h209.93C275.44,0,294.33,18.89,294.33,42.2z"/>
                    <text transform="matrix(1 0 0 1 182.2743 101.4183)" class="st1 st2 st3">[click to translate]</text>
                    <text transform="matrix(1 0 0 1 25.7284 23.6199)"><tspan x="0" y="0" class="st4 st2 st3">Meow meow, meow, meow, qaasd a,a sd ad</tspan><tspan x="0" y="14.4" class="st4 st2 st3">,a d ada, ad adad a, ad ada dad a,ad ada</tspan><tspan x="0" y="28.8" class="st4 st2 st3">d ad,a dada d,ad ad ada dad ada,d adada,</tspan></text>
</svg>
            </div>
            <div class="cat">
                <svg id="Слой_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 340 310.88" style="enable-background:new 0 0 340 310.88;" xml:space="preserve">
                    <path id="голова" class="cat0" d="M340,181.38c-3,77.5-16,129.5-170,129.5c-142,0-170-43-170-129.5
	c0-62.5,76.11-129.5,170-129.5S340,122.88,340,181.38z"/>
                    <path id="ухо_пр_00000065771358673005710600000000601725058679134382_" class="cat0" d="M288.26,1.13
	c23.22,2.85,51.55,178.03,51.55,178.03l-158.52-33.61C181.28,145.55,265.04-1.72,288.26,1.13z"/>
                    <path id="ухо_лв" class="cat0" d="M52.48,0.04C29.27,2.89,0.93,178.08,0.93,178.08l158.52-33.61
	C159.46,144.46,75.7-2.8,52.48,0.04z"/>
                    <circle id="глаз_лв" class="cat1" cx="85" cy="186.88" r="36"/>
                    <circle id="глаз_пр" class="cat1" cx="257.2" cy="186.64" r="36"/>
                    <path id="нос" class="cat1" d="M174.23,250.94c-13.23-0.06-29.75-19.92-26.06-26.79c2.83-5.27,48.83-4.27,51.07,0.89
	C202.18,231.8,187.45,250.99,174.23,250.94z"/>
                    <circle id="зрач_лв" class="cat0" cx="84.5" cy="187.38" r="25.5"/>
                    <circle id="зрач_пр" class="cat0" cx="256.88" cy="186.72" r="25.5"/>
                    <path id="ухо_лв_00000117659311699576529030000009241858443353879197_" class="cat1" d="M57.35,24.32
	c-11.57,1.42-30.11,83.64-25.73,88.6S99.65,81.16,100,73.88S68.93,22.9,57.35,24.32z"/>
                    <path id="ухо_пр" class="cat1" d="M282.7,26.41c11.57,1.42,30.11,83.64,25.73,88.6c-4.38,4.96-68.03-31.76-68.38-39.04
	S271.13,24.99,282.7,26.41z"/>
</svg>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TalkingCatComponent"
}
</script>

<style scoped>
    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .action-buttons{
        height: 50vh;
        width: 100vw;
    }
    .cat-chat{
        height: 50%;
        width: 100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .cat{
        height: 40%;
        width: 20vh;
    }
    .messages{
        height: 40%;
        width: 40vh;

    }
    .message{fill:#FFFFFF;}
    .cat0{fill:#07338C;}
    .cat1{fill:#FFFFFF;}

    .st0{fill:#4368B1;}
    .st1{fill:#C4C4C4;}
    .st2{font-family:'MyriadPro-Regular';}
    .st3{font-size:12px;}
    .st4{fill:#FFFFFF;}
</style>
