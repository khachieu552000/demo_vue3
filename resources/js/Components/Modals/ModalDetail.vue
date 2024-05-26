
<template>
    <Transition name="modal">
        <div v-if="showModalDetail" class="modal-mask">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header"><h3>Detail</h3></slot>
                </div>
                <div class="modal-body">
                        <slot name="body">
                            <div class="mb-10">
                                <label for="name">Name</label>
                                <span class="ml-30"> {{ form.name }} </span>
                            </div>
                            <div class="mb-10">
                                <label for="email">Email</label>
                                <span class="ml-30"> {{ form.email }} </span>
                            </div>
                        </slot>
                        <div class="modal-footer">
                            <slot name="footer">
                                <button class="modal-default-button ml-10" @click="showEdit(dataUser)">Edit</button>
                                <ModalEdit :showModalEdit="form.showModalEdit" :dataUser="dataUser" @closeModalEdit="form.showModalEdit = false">
                                </ModalEdit>
                                <button
                                    class="modal-default-button"
                                    @click="$emit('closeModalDetail')"
                                    type="button"
                                >Cancel</button>
                            </slot>
                        </div>
                </div>
            </div>
        </div>
    </Transition>
</template>




<script setup>
import { ref, watch } from 'vue';
import ModalEdit from '@/Components/Modals/ModalEdit.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    showModalDetail: Boolean,
    dataUser: Object,
});

const form = useForm({
    name: props.dataUser.name,
    email: props.dataUser.email,
    showModalEdit: false,
    dataUser: {},
});

function showEdit(user) {
    this.form.showModalEdit = true;
    this.form.dataUser = user;
}

// Watch for changes in props.dataUser and update local refs
watch(() => props.dataUser, (newDataUser) => {
    form.name = newDataUser.name;
    form.email = newDataUser.email;
}, { immediate: true });
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
    width: 300px;
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
.mb-10 {
    margin-bottom: 10px;
}

.ml-30 {
    margin-left: 30px;
}

.ml-10 {
    margin-left: 10px;
}
.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
