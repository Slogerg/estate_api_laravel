<template>
    <div class="container" style="position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
border: 5px solid #FFFF00;
padding: 10px;">
        <h3 class="text-center">Edit Building</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="editProduct">
                    <input type="file" id ='file' accept="image/*" class="form-control-file" style="display:none;"
                           v-on:change="onChange" >
                    <label id="img" for="file">Click to select other photo</label>
                    <br>
<!--                    <a  :src=+"building.image_path" class = 'btn btn-primary'>Click to review</a>-->
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="building.title">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" v-model="building.location">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" v-model="building.price">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="template" v-model="building.category_id">
                            <option v-for="item in categories" v-bind:value="item.id">
                                {{ item.title }}
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" v-model = building.description></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {UpdateMedia, UploadMedia} from "vue-media-upload";

export default {
    name: "EditBuilding",
    components: {
        UploadMedia,
        UpdateMedia
    },
    data() {
        return {
            building: {},
            categories: null,
        }
    },
    mounted() {
        axios.get("http://127.0.0.1:8001/api/categories")
            .then(response => (this.categories = response.data));
        this.id = window.location.pathname.split('/').pop();

        axios.get("http://127.0.0.1:8001/api/building/"+this.id)
            .then(response => (this.building = response.data));
    },
    methods: {
        onChange(e) {
            this.file = e.target.files[0];
        },

        editProduct(e) {
            e.preventDefault();
            let existingObj = this;
            // const config = {
            //     headers: {
            //         'content-type': 'multipart/form-data'
            //     }
            // }

            let data = new FormData();
            data.append('_method', 'PUT')
            data.append('file', this.file);
            data.append('title',this.building.title);
            data.append('location',this.building.location);
            data.append('price',this.building.price);
            data.append('description',this.building.description);
            data.append('category_id',this.building.category_id);
            // let data = JSON.stringify({
            //     title: this.building.title,
            //     location: this.building.location,
            //     price: this.building.price,
            //     description: this.building.description,
            //     category_id: this.building.category_id,
            // });
            console.log(data);
            axios
                .post('http://127.0.0.1:8001/api/building/'+this.id,data)
                .then(response => (
                    window.location.href = 'http://127.0.0.1:8001/buildings'
                ))
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
