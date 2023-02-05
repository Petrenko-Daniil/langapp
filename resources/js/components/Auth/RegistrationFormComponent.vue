<template>
    <div class="auth-form-body registration-form" id="auth-form-body">
        <div class="auth-form-field-container">
            <div class="auth-form-field">
                <input v-model="email" type="text" class="auth-form-field-input" placeholder="E-MAIL">
            </div>
            <div class="auth-form-field">
                <input v-model="name" type="text" class="auth-form-field-input" placeholder="NICKNAME">
            </div>
            <div class="auth-form-field">
                <input v-model="password" type="password" class="auth-form-field-input auth-form-field-password-input" placeholder="PASSWORD">
                <div v-on:click="setShowPassword" class="auth-form-field-show-password-button">
                </div>
            </div>
        </div>
        <div class="auth-form-button-enter-container">
            <div v-on:click="registrationRequest" class="auth-form-button auth-form-button-enter">
                enter
            </div>
            <div class="auth-form-free-text" v-on:click="setCurrentPage('login')">
                I ALREADY HAVE AN ACCOUNT
            </div>
        </div>


    </div>
</template>

<script>
import qs from "qs";

export default {
    name: "RegistrationFormComponent",
    data: function(){
        return {
            showPassword: false,
            email: undefined,
            password: undefined,
            name: undefined,
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
        registrationRequest(){
            var data = qs.stringify({
                'email': this.email,
                'password': this.password,
                'name' : this.name,
                'password_confirmation' : this.password,
            });
            axios.get('/sanctum/csrf-cookie').then(response => {
                // Login...
            });
            var config = {
                method: 'post',
                url: 'register',
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
