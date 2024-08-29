<script>
import { Link, router } from "@inertiajs/vue3";

export default {
    components: { Link },
    props: {
        authors: Array,
    },
    methods: {
        deleteAuthor(id) {
            router.delete(`/authors/${id}`);
        },
    },
}
</script>

<template>
    <tr v-for="author in authors" :key="author.id">
        <td>{{ author.name }}</td>
        <td>{{ author.surname }}</td>
        <td>{{ author.books_count }}</td>
        <td class="d-flex gap-1">
            <Link :href="`/authors/${author.id}/edit`" class="btn btn-warning btn-sm">Edit</Link>
            <button @click="deleteAuthor(author.id)" class="btn btn-danger btn-sm">Delete</button>
        </td>
    </tr>
</template>
