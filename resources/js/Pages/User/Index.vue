<template>

    <h1>Hello Every Body</h1>
    <p>List Data</p>
    <p class="text-sm text-gray-600">{{ $page }}</p>
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
        <tr v-for="(user, index) in users" :key="index">
            <td class="custom-table bg-center">{{ user.id }}</td>
            <td class="custom-table bg-center">{{ user.name }}</td>
            <td class="custom-table">{{ user.email }}</td>
            <td class="d-flex">
<!--                <div>-->
<!--                    <button @click="showModalAlert = true">Alert</button>-->
<!--                    <ModalAlert :showModalAlert="showModalAlert" @closeModalAlert="showModalAlert = false"></ModalAlert>-->
<!--                </div>-->
                <div class="ml-10">
                    <button @click="showDetail(user)">Detail</button>
                    <ModalDetail :showModalDetail="showModalDetail" :dataUser="dataUser" @closeModalDetail="showModalDetail = false"></ModalDetail>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script setup>
import ModalEdit from '@/components/Modals/ModalEdit.vue'
import ModalDetail from '@/components/Modals/ModalDetail.vue'
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";

const props = defineProps({
    users: Object,
    // success : String,
})

const showModalEdit = ref(false);
const showModalDetail = ref(false);
const dataUser = ref({});

function showEdit(user) {
    this.dataUser = user;
    this.showModalEdit = true;
}

function showDetail(user) {
    this.dataUser = user;
    this.showModalDetail = true;
}

</script>
