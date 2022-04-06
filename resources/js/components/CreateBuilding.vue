<template>
    <div class="container" style="position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
border: 5px solid #FFFF00;
padding: 10px;">
        <h3 class="text-center">Create Building</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <input type="file" accept="image/*" class="form-control-file"
                           v-on:change="onChange">
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
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {UploadMedia, UpdateMedia} from "vue-media-upload";
export default {
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
        axios
            .get("http://127.0.0.1:8001/api/categories")
            .then(response => (this.categories = response.data));
    },
    methods: {
        onChange(e) {
            this.file = e.target.files[0];
        },
        addProduct(e) {
            e.preventDefault();
            let existingObj = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let data = new FormData();
            data.append('file', this.file);
            data.append('title',this.building.title);
            data.append('location',this.building.location);
            data.append('price',this.building.price);
            data.append('description',this.building.description);
            data.append('category_id',this.building.category_id);

            axios
                .post('http://127.0.0.1:8001/api/building',data,config)
                .then(response => (
                    window.location.href = 'http://127.0.0.1:8001/buildings'
            ))
                .catch(err => console.log(err))


        }

    }
}
</script>
