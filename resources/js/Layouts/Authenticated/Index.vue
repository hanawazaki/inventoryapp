<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
import Footer from "./Footer.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <body
        class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500"
    >
        <div class="absolute w-full bg-[#0088FE] dark:hidden min-h-75"></div>

        <!-- sidenav  -->
        <Sidebar />

        <!-- end sidenav -->

        <main
            class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl"
        >
            <!-- Navbar -->

            <Navbar />
            <!-- end Navbar -->

            <!-- cards -->
            <div class="w-full px-6 py-6 mx-auto">
                <slot />

                <Footer />
            </div>
            <!-- end cards -->
        </main>
    </body>
</template>
