<script setup>
    import { useForm } from "@inertiajs/vue3"
    import AppLayout from '../../layouts/master.vue';
    import Pagination from '@/Components/Pagination.vue';
    import { faTrashAlt, faPencilAlt } from "@fortawesome/free-solid-svg-icons";
    import Keypad from '@/Components/Keypad.vue';
    import swal from "sweetalert";

    const props = defineProps({
        categories: {
            type: Object,
            default: () => ({})
        },
        filters: {
            type: Object,
            default: () => ({})
        }
    });

    const form = useForm({
        search: props.filters.search,
    });

    const formDelete = useForm({})

    const destroyCategory = (id) => {
        swal({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                formDelete.delete(route("category.destroy", id),{
                    onSuccess: () => {
                        swal('Permiso eliminado con éxito');
                    }
                });
            }
        });
    }
</script>
<template>
    <AppLayout title="Blog">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categorías
            </h2>
        </template>
        <div class="p-6">

            <div class="flex items-center justify-center py-8 px-2">
                <div class="w-full sm:px-6">
                    <div
                        class="
                        px-4
                        md:px-10
                        py-4
                        md:py-7
                        bg-white 
                        rounded-tl-lg rounded-tr-lg
                        shadow
                        "
                    >
                        <div class="sm:flex items-center justify-between">
                            <p
                                tabindex="0"
                                class="
                                focus:outline-none
                                text-base
                                sm:text-lg
                                md:text-xl
                                lg:text-2xl
                                font-bold
                                leading-normal
                                text-gray-800
                                "
                            >
                                Lista Categorías
                            </p>
                            <div>
                                <a :href="route('category.create')"
                                class="
                                    focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600
                                    inline-flex
                                    sm:ml-3
                                    mt-4
                                    sm:mt-0
                                    items-start
                                    justify-start
                                    px-6
                                    py-3
                                    bg-indigo-500
                                    hover:bg-indigo-600
                                    focus:outline-none
                                    rounded
                                "
                                >
                                    <p class="text-sm font-medium leading-none text-white">
                                        Nuevo
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-gray-700 uppercase bg-gray-100 dark:text-gray-400">
                                <tr class="border">
                                    <th scope="col" class="px-6 py-4 border">
                                        Acciones
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        <div class="flex items-center">
                                            Nombre
                                            <a :href="route('category.index', {sort:'name',sort_order: filters.sort_order})">
                                                <img style="max-width: 12px;height: auto;" class="svg-img" src="/icons-svg/clasificar.svg" alt="Descripción de la imagen">
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(category, index) in categories.data" :key="category.id" class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="border px-6 py-4">
                                        <a :href="route('category.edit',category.id)" class="mr-1 mx-2 my-2 bg-white transition duration-150 ease-in-out focus:outline-none rounded text-gray-800 border border-gray-300 px-6 py-2 text-xs">
                                            <font-awesome-icon :icon="faPencilAlt" />
                                        </a>
                                        <button @click="destroyCategory(category.id)" type="button" class="mr-1 mx-2 my-2 bg-white transition duration-150 ease-in-out hover:border-gray-900 hover:text-gray-900 rounded border border-gray-800 text-gray-800 px-6 py-2 text-xs">
                                            <font-awesome-icon :icon="faTrashAlt" />
                                        </button>
                                    </td>
                                    <td class="border px-6 py-4">
                                        {{ category.description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>