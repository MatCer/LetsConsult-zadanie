<script>
export default {
    //
}
</script>

<template>
    <main>
        <div class="container">
            <h1 v-if="this.$slots.heading">
                <slot name="heading"/>
            </h1>

            <slot/>
        </div>
    </main>
</template>
