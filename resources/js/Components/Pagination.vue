<template>
    <nav v-if="items.last_page > 1">
        <ul class="pagination mx-auto max-w-md flex gap-5 justify-center">
            <li
                @click="prevPage(items.current_page - 1)"
                v-if="items.current_page > 1"
                class="cursor-pointer hover:bg-indigo-500 hover:text-white px-2 py-2"
            >
                <a>Previous</a>
            </li>
            <li
                @click="handleChangePage(page)"
                class="cursor-pointer hover:bg-indigo-500 hover:text-white px-2 py-2"
                v-for="page in items.last_page"
                :key="page"
                :class="{
                    active: page === state.currentPage,
                }"
            >
                <a>{{ page }}</a>
            </li>
            <li
                @click="nextPage(items.current_page + 1)"
                class="cursor-pointer hover:bg-indigo-500 hover:text-white px-2 py-2"
                v-if="items.current_page < items.last_page"
            >
                <a>Next</a>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { reactive, computed, getCurrentInstance } from "vue";

const props = defineProps({
    items: {
        type: Object,
    },
});

console.log("items", props.items);

const state = reactive({
    currentPage: props.items.current_page,
});

const totalPages = computed(() =>
    Math.ceil(props.items.total / props.items.per_page)
);

console.log("curr page", state.currentPage);
console.log("total page", totalPages.value);

const handleChangePage = (page) => {
    state.currentPage = page;
    instance.emit("update:currentPage", state.currentPage);
};

const nextPage = () => {
    if (state.currentPage < totalPages.value) {
        state.currentPage++;
        instance.emit("update:currentPage", state.currentPage);
        console.log("next clicked");
    }
};

const prevPage = () => {
    if (state.currentPage > 1) {
        state.currentPage--;
        instance.emit("update:currentPage", state.currentPage);
        console.log("prev clicked");
    }
};

const instance = getCurrentInstance();
</script>

<style scoped>
.active {
    @apply bg-indigo-500 text-white;
}
</style>
