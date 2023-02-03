<template>
    <div class="auth-form-body registration-form" id="auth-form-body">
        <div class="auth-form-field-container">
            <div class="auth-form-field">
                <input type="text" class="auth-form-field-input" placeholder="E-MAIL">
            </div>
            <div class="auth-form-field">
                <input type="text" class="auth-form-field-input" placeholder="NICKNAME">
            </div>
            <div class="auth-form-field">
                <input type="password" class="auth-form-field-input auth-form-field-password-input" placeholder="PASSWORD">
                <div v-on:click="setShowPassword" class="auth-form-field-show-password-button">
                </div>
            </div>
        </div>
        <div class="auth-form-button-enter-container">
            <div class="auth-form-button auth-form-button-enter">
                enter
            </div>
            <div class="auth-form-free-text">
                I ALREADY HAVE AN ACCOUNT
            </div>
        </div>


    </div>
</template>

<script>
export default {
    name: "RegistrationFormComponent",
    data: function(){
        return {
            showPassword: false,
        }
    },
    methods: {
        setShowPassword(){
            this.showPassword = !this.showPassword;
            if(this.showPassword){
                $('.auth-form-field-show-password-button').css('background', "no-repeat center url('/icons/add-icons/opened-eye.svg')");
                $('.auth-form-field-password-input').attr('type', 'text');
            }
            else{
                $('.auth-form-field-show-password-button').css('background', "no-repeat center url('/icons/add-icons/closed-eye.svg')");
                $('.auth-form-field-password-input').attr('type', 'password');
            }
        }
    }
}
</script>

<style scoped>
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
    .registration-form{
        opacity: 0;
        position: fixed;
        top: 0;
        left: 0;
    }
</style>
