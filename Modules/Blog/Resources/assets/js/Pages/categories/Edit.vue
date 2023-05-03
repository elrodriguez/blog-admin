<script setup>
    import AppLayout from '../../layouts/master.vue';
    import editForm from './Pertials/editForm.vue';

    const props = defineProps({
        category: {
            type: Object,
            default: () => ({}),
        }
    });
</script>

<template>
    <AppLayout title="Blog">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo 
            </h2>
        </template>
        <div class="p-6">
            <editForm :category="category"></editForm>
            
        </div>
    </AppLayout>
</template>