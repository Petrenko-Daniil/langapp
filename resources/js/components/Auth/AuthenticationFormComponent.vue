<template>
    <div class="auth-form-body authform" id="auth-form-body">
        <div class="auth-form-button" v-on:click="setCurrentPage('registration')">
            registration
        </div>
        <div class="auth-form-button" v-on:click="setCurrentPage('login')">
            login
        </div>
        <div class="auth-form-free-text">
            OR
        </div>
    </div>
</template>

<script>
export default {
    name: "AuthenticationFormComponent",
    methods: {
      setCurrentPage(page){
          this.$emit('setCurrentPage', page);
      },
    },
}
</script>

<style scoped>



</style>
