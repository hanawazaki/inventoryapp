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
                        <h6 class="dark:text-white">Units table</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <div class="flex justify-end">
                                <Link :href="route('dashboard.units.create')">
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
                                        v-for="(unit, index) in items.data"
                                        :key="index"
                                    >
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                        >
                                            <span
                                                class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"
                                                >{{ unit.name }}</span
                                            >
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent text-center border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'dashboard.units.edit',
                                                        unit.id
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
                                            <div
                                                @click="
                                                    form.delete(
                                                        route(
                                                            'dashboard.units.destroy',
                                                            unit.id
                                                        )
                                                    )
                                                "
                                                class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                            >
                                                <i
                                                    class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"
                                                ></i
                                                >Delete
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <nav v-if="items.last_page > 1">
                        <ul class="pagination">
                            <li v-if="items.current_page > 1">
                                <a @click="fetchUnits(items.current_page - 1)"
                                    >Previous</a
                                >
                            </li>
                            <li
                                v-for="page in items.last_page"
                                :key="page"
                                :class="{
                                    active: page === items.current_page,
                                }"
                            >
                                <a @click="fetchUnits(page)">{{ page }}</a>
                            </li>
                            <li v-if="items.current_page < items.last_page">
                                <a @click="fetchUnits(items.current_page + 1)"
                                    >Next</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </Authenticated>
</template>

<script setup>
import Authenticated from "../../Layouts/Authenticated/Index.vue";
import Button from "@/Components/Button.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const { props } = usePage();
const items = ref(props.units);

// const props = defineProps({
//     units: {
//         type: Array,
//         require: true,
//     },
// });

watch(
    () => props,
    (newItems) => {
        items.value = newItems;
    }
);

function fetchUnits(page) {
    router.visit(`/units?page=${page}`);
}
</script>

<style lang="scss" scoped></style>
