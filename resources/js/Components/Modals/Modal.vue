<template>
    <div>
        <!-- Modals -->
        <div class="modal" v-if="show" @click="closeModal">
            <div class="modal-content" @click.stop>
                <span class="close" @click="closeModal">×</span>
                <p>List Data</p>
                <table>
                    <thead>
                    <tr>
                        <th class="w-45">Name</th>
                        <th class="w-45">Power</th>
                        <th class="w-45">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(data, index) in dataList" :key="index">
                        <td class="w-45 bg-center">{{ data.name }}</td>
                        <td class="w-45">{{ data.power }}</td>
                        <td>
                            <button @click="openModalAlert">Alert</button>
                            <ModalAlert :showAlert="showAlert" :message="'Err'" @closeAlert="closeModalAlert"></ModalAlert>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { defineEmits, defineProps } from 'vue';
import ModalAlert from '@/Components/Modals/ModalAlert.vue';

const showAlert = ref(false);

const emit = defineEmits(['close']);

const props = defineProps({
    titleModal: String,
    show: Boolean,
    dataList: Array,
});

function closeModal() {
    emit('close');
}

function openModalAlert() {
    showAlert.value = true;
}

function closeModalAlert() {
    showAlert.value = false;
}
</script>

<style>
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fefefe;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    position: relative;
}

.close {
    color: #aaa;
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.w-45 {
    width: 45%;
}

.data-list {
    display: flex;
}
</style>
