<script>
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import Layout from "@/components/Layout.vue";

export default {
    components: {Layout},
    props: {
        authors: Array,
        errors: Object,
        book: {
            type: Object,
            required: false,
        },
        isEditMode: Boolean,
    },

    setup(props) {
        const form = ref({
            title: props.book ? props.book.title : '',
            author_id: props.book ? props.book.author_id : null,
            is_borrowed: props.book ? props.book.is_borrowed : false,
        });

        const submit = () => {
            if (props.isEditMode) {
                router.put(`/books/${props.book.id}`, form.value);
            } else {
                router.post('/books', form.value);
            }
        };

        return {form, submit};
    },
};
</script>

<template>
    <form @submit.prevent="submit">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                v-model="form.title"
                class="form-control"
                :class="{ 'is-invalid': errors.title }"
                id="title"
                required
            />
            <div v-if="errors.title" class="invalid-feedback">
                {{ errors.title }}
            </div>
        </div>
        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select
                v-model="form.author_id"
                class="form-select"
                :class="{ 'is-invalid': errors.author_id }"
                required
            >
                <option
                    v-for="author in authors"
                    :value="author.id"
                    :key="author.id"
                >
                    {{ author.name }} {{ author.surname }}
                </option>
            </select>
            <div v-if="errors.author_id" class="invalid-feedback">
                {{ errors.author_id }}
            </div>
        </div>
        <div class="mb-3">
            <label for="is_borrowed" class="form-label">Is borrowed?</label>
            <input
                type="checkbox"
                v-model="form.is_borrowed"
                class="mx-1 form-check-input"
                :class="{ 'is-invalid': errors.is_borrowed }"
                id="is_borrowed"
            />
            <div v-if="errors.is_borrowed" class="invalid-feedback">
                {{ errors.is_borrowed }}
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ isEditMode ? 'Update Book' : 'Add Book' }}</button>
    </form>
</template>
