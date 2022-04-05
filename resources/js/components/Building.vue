<template>
    <div>
        <h2 class="text-center">Building List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="building in buildings" :key="building.id">
                <td>{{ building.id }}</td>
                <td>{{ building.title }}</td>
                <td>{{ building.price }}$</td>
                <td>
                    <div class="btn-group" role="group">

                        <button class="btn btn-success" @click="redirectToEdit(building.id)">Edit</button>
                        <button class="btn btn-danger" @click="deleteProduct(building.id)">Delete</button>
                        <button class="btn btn-primary" @click="deleteProduct(building.id)">View</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<!--    <div class="container">-->
<!--        <a class="btn btn-success" href="">Create New Building</a>-->
<!--        <div class="row">-->
<!--            &lt;!&ndash; Blog entries&ndash;&gt;-->
<!--            <div class="col-md-8">-->
<!--                <h1 class="my-4">-->
<!--                    Товари-->
<!--                </h1>-->
<!--                <div class="card mb-4" v-for="building in buildings">-->
<!--                    <div class="card-body">-->
<!--                        <h2 class="card-title">Назва: {{building.title}}</h2>-->
<!--                        <h6 class="card-title">Ціна: {{building.price}}</h6>-->
<!--                        <a class="btn btn-primary" href="#">Переглянути →</a>-->
<!--                        <button class="btn btn-danger" @click="deleteProduct(building.id)">Видалити</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>


<script>

export default {
    data() {
        return {
            buildings: null
        }
    },
    mounted() {
        axios
            .get("http://127.0.0.1:8001/api/building")
            .then(response => (this.buildings = response.data));
    },
    methods: {
        deleteProduct(id) {

            axios
                .delete(`http://127.0.0.1:8001/api/building/${id}`)
                .then(response => {
                    let i = this.buildings.map(data => data.id).indexOf(id);
                    this.buildings.splice(i, 1)
                });
        },

        redirectToEdit(id){
            window.location.href = 'http://127.0.0.1:8001/building/'+id;
        }
    }
};
</script>
