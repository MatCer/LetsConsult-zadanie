<script>
export default {
    props: {
        books: Array,
    },
};
</script>

<template>
    <h1>Books list</h1>
    <ul>
        <li v-for="book in books" :key="book.id">
            {{ book.title }}
        </li>
    </ul>
</template>
