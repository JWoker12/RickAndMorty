<template>
    <div class="card">
        <div class="card-header text-center">Edit Profile</div>
        <div class="card-body">
            <form class="row" @submit.prevent="update(dataUser)">
                <div class="col-6 mb-2">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Name"
                        v-model="dataUser.name"
                    />
                </div>
                <div class="col-6 mb-2">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="Email address"
                        v-model="dataUser.email"
                        required
                    />
                </div>
                <div class="col-4 my-2">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="City"
                        v-model="dataUser.city"
                        required
                    />
                </div>
                <div class="col-4 my-2">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Address"
                        v-model="dataUser.address"
                        required
                    />
                </div>
                <div class="col-4 my-2">
                    <input
                        type="date"
                        class="form-control"
                        placeholder="Birthday"
                        v-model="dataUser.birthday"
                        required
                    />
                </div>
                <button type="submit" class="btn btn-primary col mx-3">
                    Submit
                </button>
            </form>
        </div>
        <div class="card-footer text-body-secondary">
            <button
                class="btn btn-danger"
                v-on:click="() => ($parent.recordComplete = false)"
            >
                Cancel
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: ["dataUser"],
    data(){
        return {
            newData: null
        }
    },
    methods: {
        update(dataUser) {
            axios
                .put('/profile/update/', dataUser)
                .catch(err => console.log(err))
        },
    },
};
</script>
