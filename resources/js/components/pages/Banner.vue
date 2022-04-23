<template>
    <div id="wrapper">
        <sidebar-component></sidebar-component>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <navbar-component></navbar-component>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Banner</h1>
                    </div>
                    <div class="mb-4">
                        <div>
                            <b-button v-b-modal.modal-1>Add Banner Image</b-button>

                            <b-modal id="modal-1" title="Add Banner Image">
                                <b-form-file v-model="file" ref="file-input" class="mb-2"></b-form-file>
                                <b-button @click="file = null">Reset</b-button>

                                <p class="mt-2">Selected file: <b>{{ file ? file.name : '' }}</b></p>
                            </b-modal>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3>List of Banner Images</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <b-img class="w-100" src="https://picsum.photos/300/150/?image=41" fluid></b-img>
                                <div class="mt-4 d-flex justify-content-center">
                                    <div class="mr-2">
                                        <b-button v-b-modal.modal-2>Update</b-button>
                                        <b-modal id="modal-2" title="Update Banner">
                                            <b-form-file v-model="file" ref="file-input" class="mb-2"></b-form-file>
                                            <b-button @click="file = null">Reset</b-button>

                                            <p class="mt-2">Selected file: <b>{{ file ? file.name : '' }}</b></p>
                                        </b-modal>
                                    </div>
                                    <div>
                                        <b-button v-b-modal.modal-3>Delete</b-button>
                                        <b-modal id="modal-3" title="BootstrapVue">
                                            <p class="text-center">Do you want to delete this image?</p>
                                        </b-modal>
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
                file: null
            }
        }
    }
</script>
