<script>
import BookForm from "@/Components/BookForm.vue";
import { computed } from "vue";
import Layout from "@/components/Layout.vue";

export default {
    components: {
        Layout,
        BookForm,
    },
    props: {
        authors: Array,
        book: {
            type: Object,
            required: false,
        }
    },
    setup(props) {
        const isEditMode = computed(() => !!props.book);

        return {isEditMode};
    },
};
</script>

<template>
    <Layout>
        <template #heading>{{ isEditMode ? 'Edit Book' : 'Add New Book' }}</template>

        <BookForm
            :authors="authors"
            :book="book"
            :isEditMode
            :errors="$page.props.errors"
        />
    </Layout>

</template>

<style scoped>

</style>
