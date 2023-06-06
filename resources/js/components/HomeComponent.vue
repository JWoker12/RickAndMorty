<template>
    <div class="card p-3 my-2">
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
            <input
                type="text"
                class="form-control w-75"
                v-model.trim="filterBy"
                placeholder="Search..."
                @keyup="filter()"
            />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div
                class="row row-cols-1 row-cols-md-3 row-cols-lg-5 justify-content-center"
            >
                <div class="col" v-for="character in data" :key="character.id">
                    <div class="card m-3">
                        <img
                            :src="character.image"
                            class="card-img-top"
                            :alt="character.name"
                        />
                        <div class="card-body">
                            <div class="h5 card-title">
                                {{ character.name }}
                            </div>
                            <a :href="`/character/${character.id}`"
                                ><button class="btn btn-success">
                                    Show More
                                </button></a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <button
                class="btn btn-success"
                v-on:click="prev()"
                :disabled="this.info.prev == undefined"
            >
                &lt&lt
            </button>
            <button
                class="btn btn-success"
                v-on:click="next()"
                :disabled="this.info.next == undefined"
            >
                &gt&gt
            </button>
        </div>
        <ModalComponent />
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: "https://rickandmortyapi.com/api/character",
            data: [],
            allData: null,
            filterBy: "",
            info: "",
            showCharacter: (id) => route(show.character, id)
        };
    },
    created() {
        this.getAllCharacterData(this.url);
    },
    methods: {
        getAllCharacterData(url) {
            fetch(url)
                .then((res) => res.json())
                .then(
                    (res) => (
                        (this.allData = res.results), (this.info = res.info)
                    )
                )
                .then(() => this.refactoring())
                .catch((error) => console.log(error));
        },
        refactoring() {
            this.data = [];
            this.allData.map((character) => {
                this.data.push({
                    id: character.id,
                    name: character.name,
                    status: character.status,
                    species: character.species,
                    gender: character.gender,
                    image: character.image,
                    url: character.url,
                });
            });
        },
        filter() {
            this.getAllCharacterData(
                this.url + "/?name=" + this.filterBy.toLowerCase()
            );
        },
        next() {
            this.getAllCharacterData(this.info.next);
        },
        prev() {
            this.getAllCharacterData(this.info.prev);
        },
    },
};
</script>
