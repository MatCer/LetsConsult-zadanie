<script>
import Layout from "@/components/Layout.vue";
import { Link } from '@inertiajs/vue3';
import Table from "@/components/Table.vue";
import BooksTableBody from "@/components/BooksTableBody.vue";

export default {
    components: {BooksTableBody, Table, Layout, Link },
    props: {
        books: Array,
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

        <Table :columns="tableColumns">
            <template #body>
                <BooksTableBody :books="books" />
            </template>
        </Table>
    </Layout>
</template>
