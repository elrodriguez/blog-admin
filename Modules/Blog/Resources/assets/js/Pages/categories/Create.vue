<script setup>
    import AppLayout from '../../layouts/master.vue';
    import CreateForm from './Pertials/createForm.vue';
</script>

<template>
    <AppLayout title="Blog">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo 
            </h2>
        </template>
        <div class="p-6">
            <CreateForm ></CreateForm>
            
        </div>
    </AppLayout>
</template>