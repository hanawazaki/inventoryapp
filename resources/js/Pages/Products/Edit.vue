<template>
    <Authenticated>
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
                >
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent"
                    >
                        <h6 class="dark:text-white">Edit Product</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <!--  -->
                            <form @submit.prevent="submit">
                                <div class="flex-auto p-6">
                                    <div class="flex flex-wrap -mx-3">
                                        <div
                                            class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                        >
                                            <div class="mb-4">
                                                <label
                                                    for="inputName"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Name</label
                                                >
                                                <input
                                                    type="text"
                                                    name="inputName"
                                                    v-model="form.name"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                />
                                            </div>
                                            <InputError
                                                :message="form.errors.name"
                                            />
                                            <div class="mb-4">
                                                <label
                                                    for="inputPN"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >PN</label
                                                >
                                                <input
                                                    type="text"
                                                    name="inputPN"
                                                    v-model="form.pn"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                />
                                            </div>
                                            <InputError
                                                :message="form.errors.pn"
                                            />
                                            <div class="mb-4">
                                                <label
                                                    for="inputQty"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Quantity</label
                                                >
                                                <input
                                                    type="number"
                                                    name="inputQty"
                                                    v-model="form.quantity"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                />
                                            </div>
                                            <InputError
                                                :message="form.errors.quantity"
                                            />
                                            <div class="mb-4">
                                                <label
                                                    for="inputCatId"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Categories</label
                                                >
                                                <select
                                                    v-model="form.category_id"
                                                    name="inputCatId"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                >
                                                    <option value="" selected>
                                                        Pilih type
                                                    </option>
                                                    <option
                                                        v-for="category in categories"
                                                        :value="category.id"
                                                    >
                                                        {{ category.name }}
                                                    </option>
                                                </select>
                                            </div>
                                            <InputError
                                                :message="
                                                    form.errors.category_id
                                                "
                                            />
                                        </div>
                                    </div>
                                    <Button type="submit">Update</Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Authenticated>
</template>

<script setup>
import Authenticated from "../../Layouts/Authenticated/Index.vue";
import Button from "@/Components/Button.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    product: {
        type: Object,
    },
    categories: {
        type: Array,
    },
});

const form = useForm({
    name: props.product.name,
    category_id: props.product.category_id,
    pn: props.product.pn,
    quantity: props.product.quantity,
});

// console.log(props.types);

const submit = (e) => {
    e.preventDefault();
    form.put(route("dashboard.products.update", props.product.id));
};
</script>

<style lang="scss" scoped></style>
