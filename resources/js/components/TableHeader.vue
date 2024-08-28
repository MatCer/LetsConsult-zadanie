<script>
export default {
    props: {
        columns: {
            type: Array,
            required: true
        }
    }
};
</script>

<template>
    <thead>
    <tr>
        <th v-for="(column, index) in columns" :key="index">{{ column }}</th>
    </tr>
    </thead>
</template>
