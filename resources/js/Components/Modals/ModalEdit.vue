
<template>
    <Transition name="modal">
        <div v-if="showModalEdit" class="modal-mask">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header">Modal Edit</slot>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="submit">
                        <slot name="body">
                            <div class="mb-10">
                                <label for="name">Name</label>
                                <input class="ml-10" type="text" v-model="name">
                                <span v-if="errors.name">{{ errors.name }}</span>
                            </div>
                            <div class="mb-10">
                                <label for="email">Email</label>
                                <input class="ml-10" type="email" v-model="email">
                                <span v-if="errors.email">{{ errors.email }}</span>
                            </div>
                        </slot>
                        <div class="modal-footer">
                            <slot name="footer">
                                <button class="modal-default-button" type="submit">OK</button>
                                <ModalAlert :showModalAlert="showModalAlert" @closeModalAlert="showModalAlert = false">
                                    <template #body>
                                        <p>Notification Edit Success</p>
                                    </template>
                                </ModalAlert>
                                <button
                                    class="modal-default-button"
                                    @click="$emit('closeModalEdit')"
                                    type="button"
                                >Cancel</button>
                            </slot>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </Transition>
</template>




<script setup>
import { ref, watch } from 'vue';
import ModalAlert from '@/Components/Modals/ModalAlert.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    showModalEdit: Boolean,
    dataUser: Object,
});

const name = ref(props.dataUser.name);
const email = ref(props.dataUser.email);
const showModalAlert = ref(false);
const errors = ref({});

function submit() {
    Inertia.post(`/user/${props.dataUser.id}`, {
        name: name.value,
        email: email.value,
    }, {
        preserveState: true, // Keep modal open on error
        onError: (err) => {
            console.log(444);
            alert(3333);
            errors.value = err;
        },
    });
}

// Watch for changes in props.dataUser and update local refs
watch(() => props.dataUser, (newDataUser) => {
    name.value = newDataUser.name;
    email.value = newDataUser.email;
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

.ml-10 {
    margin-left: 10px;
}
.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
