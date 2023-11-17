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
                        <h6 class="dark:text-white">Types table</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="flex justify-between h-10">
                                <div
                                    class="relative flex items-stretch transition-all rounded-lg ease"
                                >
                                    <span
                                        class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all"
                                    >
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input
                                        type="text"
                                        class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                        placeholder="Type here..."
                                        v-model="search"
                                    />
                                </div>
                                <Link
                                    :href="
                                        route('dashboard.vehicle_types.create')
                                    "
                                >
                                    <Button type="button" variant="bg-blue-500"
                                        >Create new</Button
                                    >
                                </Link>
                            </div>
                            <table
                                class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500"
                            >
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                        >
                                            Type Name
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                        >
                                            Unit Name
                                        </th>
                                        <th
                                            colspan="2"
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                        >
                                            Action
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-if="props.types.data.length"
                                        v-for="(type, index) in filteredTypes"
                                        :key="index"
                                    >
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                        >
                                            <span
                                                class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"
                                                >{{ type.name }}</span
                                            >
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                        >
                                            <span
                                                class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"
                                                >{{ type.units.name }}</span
                                            >
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent text-center border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'dashboard.vehicle_types.edit',
                                                        type.id
                                                    )
                                                "
                                                class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                            >
                                                <i
                                                    class="mr-2 fas fa-pencil-alt text-slate-700"
                                                    aria-hidden="true"
                                                ></i>
                                                Edit
                                            </Link>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent text-center border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                        >
                                            <button
                                                @click="deleteData(type.id)"
                                                class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                            >
                                                <i
                                                    class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"
                                                ></i
                                                >Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <tr v-else>
                                        <td colspan="3">
                                            <h5
                                                class="text-center font-mono my-5"
                                            >
                                                Tidak ada data
                                            </h5>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <Pagination
                        :items="props.types"
                        v-model:current-page="props.types.current_page"
                        @update:current-page="fetchTypes"
                    />
                </div>
            </div>
        </div>
    </Authenticated>
</template>

<script setup>
import Authenticated from "../../Layouts/Authenticated/Index.vue";
import Button from "@/Components/Button.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link, usePage, router, useForm } from "@inertiajs/vue3";
import { ref, watch, reactive, computed } from "vue";

const props = defineProps({
    types: {
        type: Object,
        required: true,
    },
});

const search = ref("");

const filteredTypes = computed(() => {
    return props.types.data.filter((unit) =>
        unit.name.toLowerCase().includes(search.value.toLowerCase())
    );
});

const deleteData = (typeId) => {
    if (confirm("are you sure?")) {
        router.delete(route("dashboard.vehicle_types.destroy", typeId), {
            preserveScroll: true,
        });
    }
};

function fetchTypes(page) {
    router.visit(`/types?page=${page}`);
}
</script>

<style scoped></style>
