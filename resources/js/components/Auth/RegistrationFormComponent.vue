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
            <div class="auth-form-free-text" v-on:click="setCurrentPage('login')">
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
        },
        setCurrentPage(page){
            this.$emit('setCurrentPage', page);
        },
    }
}
</script>

<style scoped>
.registration-form{
    opacity: 0;
    position: fixed;
    top: 0;
    left: 0;
}
</style>
