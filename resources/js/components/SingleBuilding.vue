<template>
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{ item.title }}</h1>
                <hr>
                <p>{{ moment(item.created_at).format("DD-MM-YYYY") }}</p>
                <p>{{ item.price }}</p>
                <p>{{ item.location }}</p>
                <hr>
                <div class="card my-4">
                    <h5 class="card-header">{{ category.title }}</h5>
                </div>
                <img class="img-fluid rounded" :src="item.image_path" alt="">
                <hr>
                <p class="lead">
                    {{ item.description }}
                </p>

                <hr>
                <hr>

            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    name: "SingleBuilding",
    data() {
        return {
            item: {},
            category: {},
            moment: moment,
        }
    },
    mounted() {
        this.id = window.location.pathname.split('/').pop();

        axios.get("http://127.0.0.1:8001/api/building/"+this.id)
            .then(response => (this.item = response.data));

        axios.get("http://127.0.0.1:8001/api/category/"+this.id)
            .then(response => (this.category = response.data));
    }
}
</script>

<style scoped>

</style>
