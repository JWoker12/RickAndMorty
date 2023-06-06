<template>
    <div class="card mb-3" v-if="allData">
        <div class="card-header">
            <h2 class="card-title m-0">{{ allData.name }}</h2>
        </div>
        <div class="row g-0">
            <div class="col-auto">
                <img
                    :src="allData.image"
                    class="img-fluid rounded-start"
                    :alt="allData.name"
                />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card">
                        <ul class="list-group list-group-flush align-middle">
                            <li class="list-group-item">
                                Gender: {{ allData.gender }}
                            </li>
                            <li class="list-group-item">
                                Status: {{ allData.status }}
                            </li>
                            <li class="list-group-item">
                                Species: {{ allData.species }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["id"],
    data() {
        return {
            allData: {},
        };
    },
    created() {
        this.getDataCharacter(this.id);
    },
    methods: {
        getDataCharacter(id) {
            fetch("https://rickandmortyapi.com/api/character/" + id)
                .then((res) => res.json())
                .then((res) => (this.allData = res))
                .catch((err) => console.log(err));
        },
    },
};
</script>
