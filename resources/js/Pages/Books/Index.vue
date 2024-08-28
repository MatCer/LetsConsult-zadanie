<script>
import Layout from "@/components/Layout.vue";
import { Link } from '@inertiajs/vue3';
import Table from "@/components/Table.vue";
import BooksTableBody from "@/components/BooksTableBody.vue";
import BookFilters from "@/components/BookFilters.vue";

export default {
    components: {BookFilters, BooksTableBody, Table, Layout, Link },
    props: {
        books: Array,
        filters: {
            type: Object,
            default: () => ({})
        },
    },
    data() {
        return {
            tableColumns: [
                'Title', 'Author', 'Borrowed', 'Actions'
            ]
        }
    },

};
</script>

<template>
    <Layout>
        <template #heading>Books List</template>

        <Link href="/books/create" class="btn btn-primary">Add New Book</Link>

        <BookFilters :init-filters="filters"/>

        <Table :columns="tableColumns">
            <template #body>
                <BooksTableBody :books="books" />
            </template>
        </Table>
    </Layout>
</template>
