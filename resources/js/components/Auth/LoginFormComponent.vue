<template>
    <div class="auth-form-body login-form" id="auth-form-body">
        <div class="auth-form-field-container">
            <div class="auth-form-field">
                <input v-model="login" name="login" type="text" class="auth-form-field-input" placeholder="E-MAIL/NICKNAME">
            </div>
            <div class="auth-form-field">
                <input v-model="password" name="password" type="password" class="auth-form-field-input auth-form-field-password-input" placeholder="PASSWORD">
                <div v-on:click="setShowPassword" class="auth-form-field-show-password-button">
                </div>
            </div>
        </div>
        <div class="auth-form-button-enter-container">
            <div v-on:click="loginRequest" class="auth-form-button auth-form-button-enter">
                enter
            </div>
            <div class="auth-form-free-text" v-on:click="setCurrentPage('registration')">
                I DON`T HAVE AN ACCOUNT
            </div>
        </div>


    </div>
</template>

<script>
import qs from 'qs';

export default {
    name: "LoginFormComponent",
    data: function(){
        return {
            showPassword: false,
            login: undefined,
            password: undefined,
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
        loginRequest(){
            var data = qs.stringify({
                'email': this.login,
                'password': this.password
            });
            axios.get('/sanctum/csrf-cookie').then(response => {
                // Login...
            });
            var config = {
                method: 'post',
                url: 'login',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data : data
            };
            axios(config)
                .then(function (response) {
                    console.log(JSON.stringify(response.data));
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },

}
</script>

<style scoped>
    .login-form{
        opacity: 0;
        position: fixed;
        top: 0;
        left: 0;
    }
</style>
