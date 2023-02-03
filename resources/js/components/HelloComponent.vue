<template>
    <div class="container">
        <loader-component v-if="loaderNotFinished" @finishedAnimation="nextSlide" />
        <talking-cat-component v-else />
    </div>

</template>

<script>
import LoaderComponent from "./LoaderComponent.vue";
import TalkingCatComponent from "./TalkingCatComponent.vue";
export default {
    name: "HelloComponent",
    components: {TalkingCatComponent, LoaderComponent},
    data: function (){
        return {
            loaderNotFinished: true,
        }
    },
    methods: {
        nextSlide(){
            this.loaderNotFinished = false;
            console.log('next slide');
        },
    }
}
</script>

<style scoped>

</style>
