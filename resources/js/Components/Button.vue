<template>
    <button
        :type="type"
        :class="`inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-primary rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md ${className}`"
        :disabled="processing"
    >
        <slot />
    </button>
</template>

<script setup>
const props = defineProps({
    type: {
        type: String,
        default: "button",
    },
    className: { type: String },
    variant: { type: String },
    processing: { type: Boolean },
});
</script>

<style scoped></style>
