<script>
import { Link, router } from "@inertiajs/vue3";

export default {
    components: { Link },
    props: {
        books: Array,
    },
    methods: {
        deleteBook(id) {
            router.delete(`/books/${id}`);
        },
        toggleBorrowed(id) {
            router.post(`/books/${id}/toggle-borrowed`);
        },
    },
}
</script>

<template>
    <tr v-for="book in books" :key="book.id">
        <td>{{ book.title }}</td>
        <td>{{ book.author.name }} {{ book.author.surname }}</td>
        <td>
            <input type="checkbox" @change="toggleBorrowed(book.id)" :checked="book.is_borrowed">
        </td>
        <td class="d-flex gap-1">
            <Link :href="`/books/${book.id}/edit`" class="btn btn-warning btn-sm">Edit</Link>
            <button @click="deleteBook(book.id)" class="btn btn-danger btn-sm">Delete</button>
        </td>
    </tr>
</template>
