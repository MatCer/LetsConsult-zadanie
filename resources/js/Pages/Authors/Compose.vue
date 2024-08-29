<script>
import { computed } from "vue";
import Layout from "@/components/Layout.vue";
import AuthorForm from "@/components/AuthorForm.vue";

export default {
    components: {
        AuthorForm,
        Layout,
    },
    props: {
        author: {
            type: Object,
            required: false,
        }
    },
    setup(props) {
        const isEditMode = computed(() => !!props.author);

        return {isEditMode};
    },
};
</script>

<template>
    <Layout>
        <template #heading>{{ isEditMode ? 'Edit Author' : 'Add New Author' }}</template>

        <AuthorForm
            :author="author"
            :isEditMode
            :errors="$page.props.errors"
        />
    </Layout>

</template>

<style scoped>

</style>
