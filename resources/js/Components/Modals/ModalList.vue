
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
                                    <div>
                                        <button @click="showModalAlert = true">Alert</button>
                                        <ModalAlert :showModalAlert="showModalAlert" @closeModalAlert="showModalAlert = false"></ModalAlert>
                                    </div>
                                    <div>
                                        <button @click="showModalEdit = true">Modal Edit</button>
                                        <ModalEdit :showModalEdit="showModalEdit" @closeModalEdit="showModalEdit = false"></ModalEdit>
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
