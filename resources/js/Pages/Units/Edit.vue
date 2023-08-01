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
                        <h6 class="dark:text-white">Edit Unit</h6>
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
                                            <div>
                                                <p class="text-sm text-red-600">
                                                    {{ form.errors.name }}
                                                </p>
                                            </div>
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
    unit: {
        type: Object,
    },
});

const form = useForm({
    name: props.unit.name,
});

const submit = (e) => {
    e.preventDefault();
    form.put(route("dashboard.units.update", props.unit.id));
};
</script>

<style lang="scss" scoped></style>
