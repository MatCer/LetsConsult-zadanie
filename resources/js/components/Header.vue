<script>
import { Link } from '@inertiajs/vue3';
import Pagination from "@/components/Pagination.vue";
import AuthorFilters from "@/components/AuthorFilters.vue";
import AuthorsTableBody from "@/components/AuthorsTableBody.vue";
import Table from "@/components/Table.vue";
import Layout from "@/components/Layout.vue";

export default {
    components: { Link },
}
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link class="nav-link" href="/books">Books</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/authors">Authors</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

