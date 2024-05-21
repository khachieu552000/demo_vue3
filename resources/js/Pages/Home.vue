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
    { name: 'Chuck Norris', power: Infinity },
    { name: 'Bruce Lee', power: 9000 },
    { name: 'Jackie Chan', power: 7000 },
    { name: 'Jet Li', power: 8000 }
];
</script>
