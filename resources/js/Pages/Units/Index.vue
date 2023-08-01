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
                                        v-for="(unit, index) in units"
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
                                                class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"
                                            >
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
                                                class="text-sm cursor-pointer font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"
                                            >
                                                Delete
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    units: {
        type: Array,
        require: true,
    },
});

const form = useForm({});
</script>

<style lang="scss" scoped></style>
