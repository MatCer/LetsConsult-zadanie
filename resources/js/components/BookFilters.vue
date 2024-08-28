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
                is_borrowed: '',
            }
        };
    },
    created() {
        this.filters.search = this.initFilters.search || '';
        this.filters.is_borrowed = this.initFilters.is_borrowed || '';
    },
    methods: {
        applyFilters() {
            router.get('/books', this.filters, { preserveState: true });
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
                   placeholder="Search books by title or author">
        </div>
        <div class="col">
            <select v-model="filters.is_borrowed"
                    @change="applyFilters"
                    class="form-select">
                <option value="">All</option>
                <option value="1">Borrowed</option>
                <option value="0">Available</option>
            </select>
        </div>
    </div>
</template>
