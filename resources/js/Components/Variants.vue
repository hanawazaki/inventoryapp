<template>
    <div class="border rounded-lg p-4" v-for="i in 3">
        <!-- VARIANT INPUT  -->
        <div class="mb-4">
            <label
                for="inputVariant"
                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                >Variant</label
            >
            <input
                type="text"
                name="inputVariant"
                v-model="props.data[i].variant"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
            />
        </div>
        <!-- <InputError :message="form.errors.variant" /> -->

        <!-- PRICE INPUT -->
        <div class="mb-4">
            <label
                for="inputPrice"
                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                >Price</label
            >
            <input
                type="number"
                name="inputPrice"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
            />
        </div>
        <!-- <InputError :message="form.errors.price" /> -->
    </div>
</template>

<script setup>
const props = defineProps({
    data: {
        type: Array,
    },
});
console.log(props.data);
</script>

<style lang="scss" scoped></style>
