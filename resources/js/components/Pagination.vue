<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: { Link },
    props: {
        links: Array,
    },
}
</script>

<template>
    <nav class="d-flex justify-content-center" aria-label="Pagination">
        <ul class="pagination">
            <li v-for="(link, index) in links" :key="index"
                class="page-item"
                :class="{
                    'active': link.active,
                }"
            >
                <Link
                    v-if="link.url !== null"
                    class="page-link"
                    :href="link.url"
                    v-html="link.label"
                ></Link>

                <div
                    v-else
                    class="page-link"
                    v-html="link.label"
                ></div>
            </li>
        </ul>
    </nav>
</template>
