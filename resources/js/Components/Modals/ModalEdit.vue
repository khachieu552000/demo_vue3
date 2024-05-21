
<template>
    <Transition name="modal">
        <div v-if="showModalEdit" class="modal-mask">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header">Modal Edit</slot>
                </div>

                <div class="modal-body">
                    <slot name="body">
                        <div class="mb-10">
                            <label for="name">Name</label>
                            <input class="in" type="text" v-model="name">
                        </div>
                        <div class="mb-10">
                            <label for="power">Power</label>
                            <input type="text" v-model="power">
                        </div>
                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                        <button class="modal-default-button">Save</button>
                        <button
                            class="modal-default-button"
                            @click="$emit('closeModalEdit')"
                        >OK</button>
                    </slot>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>
import {ref} from "vue";

const props = defineProps({
    showModalEdit: Boolean
});

const name = ref('name');
const power = ref('power');

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

/*input {*/
/*    margin-bottom: 10px;*/
/*    display: block;*/
/*}*/
.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
