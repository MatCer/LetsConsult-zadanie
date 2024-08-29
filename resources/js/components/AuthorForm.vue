<script>
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import Layout from "@/components/Layout.vue";

export default {
    components: { Layout },
    props: {
        errors: Object,
        author: {
            type: Object,
            required: false,
        },
        isEditMode: Boolean,
    },

    setup(props) {
        const form = ref({
            name: props.author ? props.author.name : '',
            surname: props.author ? props.author.surname : null,
        });

        const submit = () => {
            if (props.isEditMode) {
                router.put(`/authors/${props.author.id}`, form.value);
            } else {
                router.post('/authors', form.value);
            }
        };

        return {form, submit};
    },
};
</script>

<template>
    <form @submit.prevent="submit">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                v-model="form.name"
                class="form-control"
                :class="{ 'is-invalid': errors.name }"
                id="name"
                required
            />
            <div v-if="errors.name" class="invalid-feedback">
                {{ errors.name }}
            </div>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input
                type="text"
                v-model="form.surname"
                class="form-control"
                :class="{ 'is-invalid': errors.surname }"
                id="surname"
                required
            />
            <div v-if="errors.surname" class="invalid-feedback">
                {{ errors.surname }}
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ isEditMode ? 'Update author' : 'Add author' }}</button>
    </form>
</template>
