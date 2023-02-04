<template>
    <div class="auth-container">
        <div id="auth-form-container" class="auth-form-container">
            <div class="auth-form-head" id="auth-form-head">
                <object class="auth-form-logo" type="image/svg+xml" data="/icons/cat-icons/logo.svg"></object>
                <h1 class="auth-form-h1">
                    LANGAPP
                </h1>
                <h2 class="auth-form-h2">
                    authentication
                </h2>
            </div>

            <authentication-form-component v-if="currentPage == 'authform' || nextPage == 'authform'" @setCurrentPage="changeCurrentPage"></authentication-form-component>
            <registration-form-component v-if="currentPage == 'registration' || nextPage == 'registration'" @setCurrentPage="changeCurrentPage"></registration-form-component>
            <login-form-component v-if="currentPage == 'login' || nextPage == 'login'" @setCurrentPage="changeCurrentPage"></login-form-component>
            <language-form-component v-if="currentPage == 'language' || nextPage == 'language'" @setCurrentPage="changeCurrentPage"></language-form-component>

            <div class="auth-form-footer">
                <div class="auth-form-button">
                    <div class="auth-form-button-content">
                        <object class="auth-form-google-logo" type="image/svg+xml" data="/icons/add-icons/google.svg"></object>
                        <span>auth via google</span>
                        <div class="flex-fake-item"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import AuthenticationFormComponent from "./AuthenticationFormComponent.vue";
import RegistrationFormComponent from "./RegistrationFormComponent.vue";
import LoginFormComponent from "./LoginFormComponent.vue";
import LanguageFormComponent from "./LanguageFormComponent.vue";

import anime from 'animejs/lib/anime.es.js';

export default {
    name: "AuthComponent",
    components: {LanguageFormComponent, LoginFormComponent, RegistrationFormComponent, AuthenticationFormComponent},
    data: function () {
        return {
            currentPage: 'authform',
            nextPage: 'authform',
            formHeight: undefined,
        }
    },
    mounted(){
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    },
    methods: {
        changeCurrentPage(page){
            this.smoothTransitionAnime(page);
        },
        smoothTransitionAnime(page) {
            anime.timeline()
                .add({
                    targets: '.auth-form-body',
                    opacity: 0,
                    duration: 300,
                    easing: 'linear',
                    begin: () => {
                        this.nextPage = page;
                    },
                    complete: () => {
                    }
                })
                .add({
                    targets: '.auth-form-body',
                    height: 0,
                    duration: 500,
                    easing: 'linear',
                    complete: () => {
                        if(this.currentPage == 'authform'){
                            document.getElementsByClassName('authform')[0].style.display = 'none';
                        } else {
                            document.getElementsByClassName(this.currentPage + '-form')[0].style.display = 'none';
                        }

                        this.additionalAnime(page);
                    }
                });
        },
        additionalAnime(page){
            let targetForm = '.' + page + '-form';
          anime.timeline()
            .add({
                  targets: targetForm,
                  opacity: 0,
                  height: 'max-content',
                  duration: 0,
                  complete: () => {
                      let formHeight = document.getElementsByClassName(targetForm.slice(1))[0].offsetHeight;
                      anime.timeline()
                      .add({
                          targets: targetForm,
                          height: 0,
                          opacity: 0,
                          duration: 50,
                          delay: 0,
                          complete: () => {
                              $(targetForm).css('position', 'static');
                          },
                      })
                          .add({
                              targets: targetForm,
                              height: formHeight,
                              duration: 1000,
                              begin: () => {
                                  this.updateTransformOfContent();
                              }
                          })
                            .add({
                                targets: targetForm,
                                opacity: 1,
                                duration: 500,
                                easing: 'linear',
                                complete: () => {
                                    this.currentPage = this.nextPage;
                                }
                            });
                  },
            })
        },
        updateTransformOfContent(){
            let formContainer = document.getElementById('auth-form-head').offsetHeight + document.getElementById('auth-form-body').offsetHeight + 40;
            let formContainerFreeSpace = window.innerHeight - formContainer;
            let formFooterM = 0;
            if(this.nextPage != 'authform'){
                if(formContainerFreeSpace > 100){
                    formFooterM = 30;
                }
                if(formContainerFreeSpace > 200){
                    formFooterM = 45;
                }
                if(formContainerFreeSpace < 100){
                    formFooterM = 15
                }
            }
            anime({
               targets: '.auth-form-footer',
               duration: 500,
               marginTop: formFooterM,
               easing: 'linear'
            });

        },
    }
}
</script>

<style>
    input{
        outline:none;
    }
    .auth-container{
        background: linear-gradient(rgba(98,124,190,1), rgba(44,67,125,1));
        width: 100vw;
        height: 100vh; /* Fallback for browsers that do not support Custom Properties */
        height: calc(var(--vh, 1vh) * 100);
    }
    .auth-form-head, .auth-form-body{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .auth-form-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        width: 100%;
        justify-content: center;
    }
    .auth-form-logo{
        height: 75px;
    }
    .auth-form-h1{
        color: #ffffff;
        font-family: Rubik;
        font-weight: 500;
        font-size: 32px;
    }
    .auth-form-h2{
        color: #ffffff;
        font-family: Montserrat;
        font-weight: 400;
        font-size: 14px;
        text-transform: uppercase;
    }
    .auth-form-button{
        width: 250px;
        height: 40px;
        background-color: #fff;
        border-radius: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Montserrat;
        font-weight: 400;
        font-size: 14px;
        text-transform: uppercase;
    }
    .auth-form-button-content{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        width: 100%;
    }
    .auth-form-free-text{
        font-family: Montserrat;
        font-weight: 400;
        font-size: 14px;
        color: #fff;
    }
    .auth-form-body > div{
        margin: 8px 0;
    }
    .auth-form-head > div, object{
        margin: 4px 0;
    }
    .auth-form-head{
        margin-bottom: 40px;
    }
    .auth-form-container{
        transform: translateY(calc(var(--fcty) * -1));
    }
    .auth-form-field-show-password-button{
        position: relative;
        top: -40px;
        right: -210px;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url('/icons/add-icons/closed-eye.svg');
        background-position: center;
        background-repeat: no-repeat;
    }
    .auth-form-field-show-password-icon{
        width: 20px;
    }
    .auth-form-button-enter-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 30px
    }
    .auth-form-button-enter-container > div{
        margin: 5px 0;
    }
    .auth-form-field{
        width: 250px;
        height: 40px;
        margin-top: 12px;
    }
    .auth-form-field-input{
        width: 100%;
        height: 100%;
        border: none;
        background: #00000000;
        border-bottom: 2px solid #FFFFFF;
        color: #FFFFFF;
        padding-left: 5px;
    }
    .auth-form-field-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
        color:    #eee;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    #eee;
        opacity:  1;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    #eee;
        opacity:  1;
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color:    #eee;
    }
    ::-ms-input-placeholder { /* Microsoft Edge */
        color:    #eee;
    }
    ::placeholder { /* Most modern browsers support this now. */
        color:    #eee;
    }
</style>
