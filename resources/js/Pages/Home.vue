<template>

    <h1>Hello Every Body</h1>
    <button id="show-modal" @click="showModal = true">Show Modal</button>

    <Teleport to="body">
        <modal :show="showModal" :dataList="users" @close="showModal = false">
            <template #header>
                <h3>Custom Header</h3>
            </template>
        </modal>
    </Teleport>
</template>

<script setup>
import Modal from '@/components/Modals/ModalList.vue'
import { ref } from 'vue'

const props = defineProps({
    users: Object
})
const showModal = ref(false)
</script>
