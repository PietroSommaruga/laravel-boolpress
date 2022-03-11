<template>
    <div>
        <h1>benvenuto in ve.js</h1>
        <ul>
            <li v-for="i in 10" :key="i">{{ i }}</li>
        </ul>
        
        <ExampleComponentVue></ExampleComponentVue>
    </div>
</template>

<script>
import ExampleComponent from '../../../vendor/laravel/ui/src/Presets/vue-stubs/ExampleComponent.vue';
import ExampleComponentVue from "../components/ExampleComponent.vue";
export default {
    components: {
        ExampleComponentVue,
        ExampleComponent
    }

}
</script>

<style>

</style>