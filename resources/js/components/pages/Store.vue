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
                            <b-button v-b-modal.modal-4>Add Store</b-button>

                            <b-modal id="modal-4" title="BootstrapVue">
                                <b-form-textarea id="textarea-default" class="mb-2" placeholder="Store Description"></b-form-textarea>
                                <b-form-file v-model="file" ref="file-input" class="mb-2"></b-form-file>
                                <b-button @click="file = null">Reset</b-button>

                                <p class="mt-2">Selected file: <b>{{ file ? file.name : '' }}</b></p>
                            </b-modal>
                        </div>
                    </div>
                        <h3>List of Store Images</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <b-img class="w-100" src="https://picsum.photos/300/150/?image=41" fluid></b-img>
                                <p>Store Description: Jollibee</p>
                                <div class="mt-4 d-flex justify-content-center">
                                    <div class="mr-2">
                                        <b-button v-b-modal.modal-5>Update</b-button>
                                        <b-modal id="modal-5" title="BootstrapVue">
                                            <b-form-textarea id="textarea-default" class="mb-2" placeholder="Store Description"></b-form-textarea>
                                            <b-form-file v-model="file" ref="file-input" class="mb-2"></b-form-file>
                                            <b-button @click="file = null">Reset</b-button>

                                            <p class="mt-2">Selected file: <b>{{ file ? file.name : '' }}</b></p>
                                        </b-modal>
                                    </div>
                                    <div>
                                        <b-button v-b-modal.modal-6>Delete</b-button>
                                        <b-modal id="modal-6" title="BootstrapVue">
                                            <p class="text-center">Do you want to delete this image?</p>
                                        </b-modal>
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
