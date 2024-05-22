
<template>
    <Transition name="modal">
        <div v-if="show" class="modal-mask">
            <div class="modal-container">
                <span class="close" @click="$emit('close')">×</span>
                <div class="modal-header">
                    <span name="header">
                        Modal header
                    </span>
                </div>

                <div class="modal-body">
                    <slot name="body">
                        <table>
                            <thead>
                            <tr>
                                <th class="custom-table">ID</th>
                                <th class="custom-table">Name</th>
                                <th class="custom-table">Email</th>
                                <th class="custom-table">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(data, index) in dataList" :key="index">
                                <td class="custom-table bg-center">{{ data.id }}</td>
                                <td class="custom-table bg-center">{{ data.name }}</td>
                                <td class="custom-table">{{ data.email }}</td>
                                <td class="d-flex">
                                    <div>
                                        <button @click="showModalAlert = true">Alert</button>
                                        <ModalAlert :showModalAlert="showModalAlert" @closeModalAlert="showModalAlert = false"></ModalAlert>
                                    </div>
                                    <div class="ml-10">
                                        <button @click="showEdit(data)">Modal Edit</button>
                                        <ModalEdit :showModalEdit="showModalEdit" :dataUser="dataUser" @closeModalEdit="showModalEdit = false"></ModalEdit>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                    </slot>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>
import {ref} from "vue";
import ModalAlert from '@/components/Modals/ModalAlert.vue';
import ModalEdit from '@/components/Modals/ModalEdit.vue';

const props = defineProps({
    show: Boolean,
    dataList: Array,
});

const showModalAlert = ref(false);
const showModalEdit = ref(false);
const dataUser = ref({});

function showEdit(data) {
    this.showModalEdit = true;
    this.dataUser = data;
}

</script>

<style>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    transition: opacity 0.3s ease;
}

.modal-container {
    width: 900px;
    margin: auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
}

.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}

.modal-enter-from {
    opacity: 0;
}

.modal-leave-to {
    opacity: 0;
}

.custom-table {
    text-align: left;
    width: 10%;
}
.d-flex {
    display: flex;
}
.ml-10 {
    margin-left: 10px;
}

.close {
    color: #aaa;
    margin-left: 890px;
    /*position: absolute;*/
    /*top: 140px;*/
    /*right: 220px;*/
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}
.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
