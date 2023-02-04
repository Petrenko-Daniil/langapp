<template>
    <div class="auth-form-body login-form" id="auth-form-body">
        <div class="auth-form-field-container">
            <div class="auth-form-field-select-label">
                I want to use english as
            </div>
            <div class="auth-form-field">
                <select class="auth-form-select">
                    <option selected value="0">First language</option>
                    <option value="1">Second language</option>
                </select>
            </div>
            <div class="auth-form-field-select-label">
                My second language then
            </div>
            <div class="auth-form-field">
                <select class="auth-form-select">
                    <option selected value="0">Russian</option>
                    <option value="1">Germany</option>
                    <option value="2">Spanish</option>
                </select>
            </div>
        </div>
        <div class="auth-form-button-enter-container">
            <div class="auth-form-button auth-form-button-enter">
                let`s go!
            </div>
        </div>


    </div>
</template>

<script>
export default {
    name: "LanguageFormComponent",
}
</script>

<style scoped>
    .auth-form-select {
        appearance: none;
        border: 0;
        outline: 0;
        font: inherit;
        /* Personalize */
        width: 250px;
        height: 40px;
        padding: 0 4em 0 1em;
        background: url(https://upload.wikimedia.org/wikipedia/commons/9/9d/Caret_down_font_awesome_whitevariation.svg) no-repeat right 0.8em center / 1.4em,
        linear-gradient(to left, rgba(255, 255, 255, 0.3) 3em, rgba(255, 255, 255, 0.2) 3em);
        color: white;
        border-radius: 40px;
        box-shadow: 0 0 1em 0 rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .auth-form-select > option {
        color: #0d0d0d;
        background-color: #FFFFFF;
    }
    .auth-form-field-select-label{
        display: flex;
        align-items: end;
        padding-left: 5px;
        padding-top: 8px;
        width: 250px;
        color: #ffffff;
        font-family: Montserrat;
        font-weight: 400;
        font-size: 13px;
        text-transform: uppercase;
    }
</style>
