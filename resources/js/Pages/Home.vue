<template>

    <h1>Hello Every Body</h1>
    <button id="show-modal" @click="showModal = true">Show Modal</button>

    <Teleport to="body">
        <modal :show="showModal" :dataList="dataList" @close="showModal = false">
            <template #header>
                <h3>Custom Header</h3>
            </template>
        </modal>
    </Teleport>
</template>

<script setup>
import Modal from '@/components/Modals/ModalList.vue'
import { ref } from 'vue'

const showModal = ref(false)
const dataList = [
    { id: 1, name: 'Chuck Norris', power: 7777 },
    { id: 2, name: 'Bruce Lee', power: 9000 },
    { id: 3, name: 'Jackie Chan', power: 7000 },
    { id: 4, name: 'Jet Li', power: 8000 }
];
</script>
