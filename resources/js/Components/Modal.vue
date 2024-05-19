<template>
    <div>
        <!-- Button để mở modal -->
        <button @click="openModal">{{ titleModal }}</button>

        <!-- Modal -->
        <div class="modal" v-if="modalVisible">
            <div class="modal-content">
                <span class="close" @click="closeModal">×</span>
                <input v-model="test"/>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import { defineProps } from 'vue';

export default {
    setup() {
        const modalVisible = ref(false);
        const test = ref('Modal test');
        // const titleModal = 'Open Modal';

        function openModal() {
            modalVisible.value = true;
        }

        function closeModal() {
            modalVisible.value = false;
        }

        return {
            modalVisible,
            openModal,
            closeModal,
            test,
            // titleModal
        };
    },
    props: {
        titleModal: String,
    },
};
</script>

<style>
/* CSS cho modal */
.modal {
    /*display: none;*/
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}
</style>


