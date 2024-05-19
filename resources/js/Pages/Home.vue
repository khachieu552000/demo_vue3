<template>
    <div>
        <!-- Các phần tử khác trong ứng dụng của bạn -->
        <h1>Ứng dụng của tôi</h1>
        <!-- Sử dụng thành phần modal -->
        <MyModal :titleModal="'test'"/>
    </div>
</template>

<script>
import MyModal from '@/components/Modal.vue';

export default {
    components: {
        MyModal,
    },
};
</script>
