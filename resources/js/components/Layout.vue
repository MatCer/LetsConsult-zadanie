<script>
import AlertSuccess from "@/components/AlertSuccess.vue";

export default {
    components: {AlertSuccess}
}
</script>

<template>
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
