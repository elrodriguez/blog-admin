<script setup>
    import { ref, computed } from 'vue';
    const open = ref(false);
    const props = defineProps({
        position: {
            type: String,
            default: 'right',
        }
    });
    const dropdownClasses = computed(() => {
        if (props.position === 'right') {
            return 'dropdown-content bg-white shadow w-24 absolute z-30 right-0 mr-6 bottom-0';
        } else if (props.position === 'left') {
            return 'dropdown-content bg-white shadow w-24 absolute z-30 left-0 ml-6 bottom-0';
        } else {
            return 'dropdown-content bg-white shadow w-24 absolute z-30 right-0 mr-6 bottom-0';
        }
    });
</script>
<template>
    <div style="position: relative !important;">
        <button
            @click="open = !open"
            class="rounded-md focus:outline-none focus:ring-2 ml-7"
            role="button"
            aria-label="option"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                >
                    <path
                      d="M4.16667 10.8334C4.62691 10.8334 5 10.4603 5 10.0001C5 9.53984 4.62691 9.16675 4.16667 9.16675C3.70643 9.16675 3.33334 9.53984 3.33334 10.0001C3.33334 10.4603 3.70643 10.8334 4.16667 10.8334Z"
                      stroke="#A1A1AA"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                    <path
                      d="M10 10.8334C10.4602 10.8334 10.8333 10.4603 10.8333 10.0001C10.8333 9.53984 10.4602 9.16675 10 9.16675C9.53976 9.16675 9.16666 9.53984 9.16666 10.0001C9.16666 10.4603 9.53976 10.8334 10 10.8334Z"
                      stroke="#A1A1AA"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                    <path
                      d="M15.8333 10.8334C16.2936 10.8334 16.6667 10.4603 16.6667 10.0001C16.6667 9.53984 16.2936 9.16675 15.8333 9.16675C15.3731 9.16675 15 9.53984 15 10.0001C15 10.4603 15.3731 10.8334 15.8333 10.8334Z"
                      stroke="#A1A1AA"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    ></path>
                  </svg>
        </button>
        <div
            class="
            dropdown-content
            bg-white
            shadow
            w-24
            absolute
            z-100
            right-0
            mr-6                    
            "
            v-if="open"
        >
                  
        </div>
    </div>
</template>
