<template>
    <div>
        <TheNavbar></TheNavbar>
        <ExampleComponentVue></ExampleComponentVue>
    </div>
</template>

<script>
import TheNavbar from "../components/TheNavbar.vue";
import ExampleComponentVue from "../components/ExampleComponent.vue";
export default {
    components: {
        ExampleComponentVue,
        TheNavbar
    }

}
</script>

<style>

</style>