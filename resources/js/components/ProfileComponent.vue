<template>
    <div class="card mb-2">
        <div class="card-header text-center">Profile</div>
        <div class="card-body">
            <h2 class="card-title">Welcome {{ data.name }}</h2>
            <h5 class="card-title">Gmail: {{ data.email }}</h5>
            <h5 class="card-title">City: {{ data.city }}</h5>
            <h5 class="card-title">Address: {{ data.address }}</h5>
            <h5 class="card-title">Birthday: {{ data.birthday }}</h5>
        </div>
        <div class="card-footer text-body-secondary" v-show="!recordComplete">
            <button
                class="btn btn-warning text-white"
                v-on:click="() => (recordComplete = true)"
            >
                Edit Profile
            </button>
        </div>
    </div>
    <edit-profile-component v-show="recordComplete" :dataUser="dataUser"/>
</template>
<script>
import EditProfileComponent from './EditProfileComponent.vue'
export default {
    props: ["data"],
    components: {
        EditProfileComponent,
    },
    data() {
        return {
            dataUser: {
                id: this.data.id,
                name: this.data.name,
                email: this.data.email,
                city: this.data.city,
                address: this.data.address,
                birthday: this.data.birthday,
            },
            recordComplete: false,
        };
    },
    created() {},
    methods: {},
};
</script>
