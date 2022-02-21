<template>
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-md-8">
                <h1 class="my-4">
                    Товари
                </h1>
                <div class="card mb-4" v-for="building in buildings">
                    <div class="card-body">

                        <h2 class="card-title">Назва: {{building.title}}</h2>
                        <h6 class="card-title">Ціна: {{building.price}}</h6>

                        <a class="btn btn-primary" href="#">Переглянути →</a>
                    </div>

                </div>
            </div>
        </div>
    </div>



</template>



<script>
export default {
    data() {
        return {
            buildings: null
        }
    },
    mounted() {
        // Simple GET request using fetch

        axios.get("http://127.0.0.1:8001/api/building")
            .then(response => (this.buildings = response.data));
    }
};
</script>
