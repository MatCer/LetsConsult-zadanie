<script>
import { router } from "@inertiajs/vue3";
import vueDebounce from "vue-debounce";

export default {
    directives: {
        debounce: vueDebounce({ lock: true })
    },
    props: {
        initFilters: Object
    },
    data() {
        return {
            filters: {
                search: '',
            }
        };
    },
    created() {
        this.filters.search = this.initFilters.search || '';
    },
    methods: {
        applyFilters() {
            router.get('/authors', this.filters, { preserveState: true });
        },
    },
};
</script>

<template>
    <div class="row mt-3">
        <div class="col">
            <input v-model="filters.search"
                   v-debounce:300ms="applyFilters"
                   type="text"
                   class="form-control"
                   placeholder="Search authors by name or surname">
        </div>
    </div>
</template>
