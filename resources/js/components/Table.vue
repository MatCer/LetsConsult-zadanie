<script>
import TableHeader from "@/components/TableHeader.vue";

export default {
    components: {
        TableHeader,
    },
    props: {
        columns: {
            type: Array,
            required: true,
        },
    },
};
</script>

<template>
    <table class="table mt-3">
        <TableHeader :columns="columns"/>
        <tbody>
            <slot name="body"/>
        </tbody>
    </table>
</template>
