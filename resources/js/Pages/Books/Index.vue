<script>
import Layout from "@/components/Layout.vue";
import { Link } from '@inertiajs/vue3';
import Table from "@/components/Table.vue";
import BooksTableBody from "@/components/BooksTableBody.vue";
import BookFilters from "@/components/BookFilters.vue";
import Pagination from "@/components/Pagination.vue";

export default {
    components: { Pagination, BookFilters, BooksTableBody, Table, Layout, Link },
    props: {
        books: Object,
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
                <BooksTableBody :books="books.data" />
            </template>
        </Table>

        <Pagination :links="books.links"/>
    </Layout>
</template>
