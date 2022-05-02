<template>
    <div id="wrapper">
        <sidebar-component></sidebar-component>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <navbar-component></navbar-component>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Store</h1>
                    </div>
                    <div class="mb-4">
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#addStore">
                                Add Store Image
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="addStore" tabindex="-1" aria-labelledby="addStoreLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addStoreLabel">Upload Store Image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form @submit="formSubmit" enctype="multipart/form-data">
                                                <input type="file" class="form-control mb-3" v-on:change="onChange">
                                                <button class="btn btn-primary btn-block">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-3">Store Images Display</h3>
                        <div class="row">
                            <div class="col-lg-4" v-for="(item, index) of products" :key="item.id">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="w-100 rounded" :src="item.full_url"
                                                fluid>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <button class="btn btn-danger btn-sm m-1" @click="remove(item)"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            <footer-component></footer-component>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: {},
                name: '',
                file: '',
                success: ''
            }
        },
        created() {
            this.getProducts();
        },
        methods: {
            getProducts() {
                this.axios.get('api/store')
                    .then(response => {
                        this.products = response.data;
                    });
            },
            onChange(e) {
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('file', this.file);
                axios.post('api/store', data, config)
                    .then(function (res) {
                        $('#addStore').modal('hide');
                        swal({
                            title: "Add Success!",
                            text: "This store image has been added successfully!",
                            icon: "success",
                            button: false,
                        });
                        location.reload();
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                        swal({
                            title: "Unsuccessful!",
                            text: "File must be an image type and size must not exceed to 500KB!",
                            icon: "error",
                        });
                    });
            },
            remove(item) {
                axios.delete(`api/store/${item.id}`)
                    .then(function (response) {
                        swal({
                            title: "Delete Success!",
                            text: "This store image has been deleted successfully!",
                            icon: "success",
                            button: false,
                        });
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },
        }
    }
</script>
