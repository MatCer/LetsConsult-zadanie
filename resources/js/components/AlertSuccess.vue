<script>
export default {}
</script>

<template>
    <div
        v-if="$page.props.flash.success"
        class="alert alert-success alert-dismissible fade show my-2"
        role="alert"
    >
        {{ $page.props.flash.success }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</template>
