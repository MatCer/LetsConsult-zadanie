<script>
import Layout from "@/components/Layout.vue";
import { Link } from '@inertiajs/vue3';
import Table from "@/components/Table.vue";
import AuthorsTableBody from "@/components/AuthorsTableBody.vue";
import AuthorFilters from "@/components/AuthorFilters.vue";

export default {
    components: { AuthorFilters, AuthorsTableBody, Table, Layout, Link },
    props: {
        authors: Array,
        filters: {
            type: Object,
            default: () => ({})
        },
    },
    data() {
        return {
            tableColumns: [
                'Name', 'Surname', 'Books Count', 'Actions'
            ]
        }
    },

};
</script>

<template>
    <Layout>
        <template #heading>Authors List</template>

        <Link href="/authors/create" class="btn btn-primary">Add New Author</Link>

        <AuthorFilters :init-filters="filters"/>

        <Table :columns="tableColumns">
            <template #body>
                <AuthorsTableBody :authors="authors" />
            </template>
        </Table>
    </Layout>
</template>
