<script>
import AlertSuccess from "@/components/AlertSuccess.vue";
import Header from "@/components/Header.vue";

export default {
    components: {Header, AlertSuccess}
}
</script>

<template>
    <Header/>
    <main>
        <div class="container">
            <AlertSuccess/>

            <h1 v-if="this.$slots.heading">
                <slot name="heading"/>
            </h1>

            <slot/>
        </div>
    </main>
</template>
