<template>
    <section class="has-text-white">
        {{ server.name }}

        <button class="button is-primary" @click="progress = 100">
            More
        </button>

        <button class="button is-light" @click="download()">
            Download
        </button>
        <progress class="progress is-primary" :value="progress" max="100">{{ progress }}%</progress>
    </section>
</template>

<script type="ts">
    import Module from './module';
    export default Module
</script>

<style scoped>

    progress::-webkit-progress-value {
        -webkit-transition: width .5s ease;
        -moz-transition: width .5s ease;
        -o-transition: width .5s ease;
        transition: width .5s ease;
    }

</style>