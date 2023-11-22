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
                                            <!-- NAME INPUT -->
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

                                            <!-- PN INPUT -->
                                            <div class="mb-4">
                                                <label
                                                    for="inputPN"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >PN</label
                                                >
                                                <input
                                                    type="text"
                                                    name="inputPN"
                                                    v-model="form.part_number"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                />
                                            </div>
                                            <InputError
                                                :message="
                                                    form.errors.part_number
                                                "
                                            />

                                            <!-- QTY INPUT -->
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

                                            <!-- TYPE INPUT -->
                                            <div class="mb-4">
                                                <label
                                                    for="inputTypeId"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Type</label
                                                >
                                                <select
                                                    v-model="form.type_id"
                                                    name="inputTypeId"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                >
                                                    <option value="" selected>
                                                        Pilih type
                                                    </option>
                                                    <option
                                                        v-for="type in types"
                                                        :value="type.id"
                                                    >
                                                        {{ type.name }}
                                                    </option>
                                                </select>
                                            </div>
                                            <InputError
                                                :message="form.errors.type_id"
                                            />

                                            <!-- featured INPUT -->
                                            <div class="mb-4">
                                                <label
                                                    for="inputFeatured"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Featured</label
                                                >
                                                <select
                                                    v-model="form.is_featured"
                                                    name="inputFeatured"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                >
                                                    <option value="" selected>
                                                        Pilih
                                                    </option>
                                                    <option value="0">
                                                        No
                                                    </option>
                                                    <option value="1">
                                                        Yes
                                                    </option>
                                                </select>
                                            </div>
                                            <InputError
                                                :message="
                                                    form.errors.is_featured
                                                "
                                            />

                                            <!-- best seller INPUT -->
                                            <div class="mb-4">
                                                <label
                                                    for="inputBestSeller"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Best Seller</label
                                                >
                                                <select
                                                    v-model="
                                                        form.is_best_seller
                                                    "
                                                    name="inputBestSeller"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                >
                                                    <option value="" selected>
                                                        Pilih
                                                    </option>
                                                    <option value="0">
                                                        No
                                                    </option>
                                                    <option value="1">
                                                        Yes
                                                    </option>
                                                </select>
                                            </div>
                                            <InputError
                                                :message="
                                                    form.errors.is_best_seller
                                                "
                                            />

                                            <!-- MATERIAL INPUT  -->
                                            <div class="mb-4">
                                                <label
                                                    for="inputMaterial"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Material</label
                                                >
                                                <input
                                                    type="text"
                                                    name="inputMaterial"
                                                    v-model="form.material"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                />
                                            </div>
                                            <InputError
                                                :message="form.errors.material"
                                            />

                                            <!--VARIANTS  -->
                                            <div
                                                class="border rounded-lg p-4 mb-4"
                                                v-for="(
                                                    variant, index
                                                ) in form.variants"
                                                :key="index"
                                            >
                                                <!-- VARIANT INPUT  -->
                                                <div class="mb-4">
                                                    <label
                                                        for="inputVariant"
                                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                        >Variant
                                                        {{ index + 1 }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="inputVariant"
                                                        v-model="
                                                            form.variants[index]
                                                                .variant
                                                        "
                                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                    />
                                                </div>
                                                <!-- <InputError
                                                    :message="
                                                        form.errors.variants[
                                                            index
                                                        ].variant
                                                    "
                                                /> -->

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
                                                        v-model="
                                                            form.variants[index]
                                                                .price
                                                        "
                                                    />
                                                </div>
                                                <!-- <InputError :message="form.errors.price" /> -->

                                                <InputError
                                                    v-for="(
                                                        variant, index
                                                    ) in form.errors.variants"
                                                    :key="index"
                                                    :message="variant.variant"
                                                />
                                            </div>
                                            <div
                                                class="flex flex-row justify-between"
                                            >
                                                <button
                                                    class="px-4 py-2 rounded-md bg-black text-white"
                                                    type="button"
                                                    @click="addVariant"
                                                >
                                                    Tambah Variant
                                                </button>

                                                <button
                                                    v-if="
                                                        form.variants.length > 1
                                                    "
                                                    class="px-4 py-2 rounded-md bg-black text-white"
                                                    type="button"
                                                    @click="
                                                        () => removeVariant()
                                                    "
                                                >
                                                    remove Variant
                                                </button>
                                            </div>

                                            <!-- DESC INPUT  -->
                                            <div class="mb-4">
                                                <label
                                                    for="inputDesc"
                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                    >Description</label
                                                >
                                                <textarea
                                                    cols="10"
                                                    rows="10"
                                                    name="inputDesc"
                                                    v-model="form.description"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                ></textarea>
                                            </div>
                                            <InputError
                                                :message="
                                                    form.errors.description
                                                "
                                            />
                                        </div>
                                    </div>
                                    <Button type="submit">Save</Button>
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
    variants: {
        type: Array,
    },
    types: {
        type: Array,
    },
});

const form = useForm({
    name: props.product.name,
    category_id: props.product.category_id,
    part_number: props.product.part_number,
    quantity: props.product.quantity,
    type_id: props.product.type_id,
    is_featured: props.product.is_featured,
    is_best_seller: props.product.is_best_seller,
    material: props.product.material,
    description: props.product.description,
    variants: props.variants,
});

// console.log(form);

const submit = (e) => {
    e.preventDefault();
    form.put(route("dashboard.products.update", props.product.id));
};

const addVariant = () => {
    form.variants.push({ variant: "", price: 0 });
    console.log("variants", form.variants);
};

const removeVariant = (i) => {
    form.variants.splice(i, 1);
    console.log("remove", i);
};
</script>

<style lang="scss" scoped></style>
