<script>
import Layout from "@/components/Layout.vue";

export default {
    components: {Layout},
    props: {
        books: Array,
    },
};
</script>

<template>
    <Layout>
        <template #heading>Books List</template>

        <ul>
            <li v-for="book in books" :key="book.id">
                {{ book.title }}
            </li>
        </ul>
    </Layout>
</template>
