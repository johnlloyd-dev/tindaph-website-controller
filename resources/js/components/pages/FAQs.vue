<template>
    <div id="wrapper">
        <sidebar-component></sidebar-component>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <navbar-component></navbar-component>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">FAQs</h1>
                    </div>
                    <div class="mb-4">
                        <div>
                            <b-button v-b-modal.modal-4>Add FAQs</b-button>

                            <b-modal id="modal-4" title="Add FAQs">
                                <b-form-input id="input-small" class="mb-2" placeholder="Question">
                                </b-form-input>
                                <b-form-textarea id="textarea-default" class="mb-2" placeholder="Answer">
                                </b-form-textarea>
                            </b-modal>
                        </div>
                    </div>
                    <h3>Table for FAQs</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <b-table striped hover :items="items" :fields="fields"></b-table>
                            </div>
                            <div class="mt-4 d-flex justify-content-center">
                                <div class="mr-2">
                                    <b-button v-b-modal.modal-5>Update</b-button>
                                    <b-modal id="modal-5" title="Update FAQs">
                                        <b-form-input id="input-small" class="mb-2" placeholder="Question">
                                        </b-form-input>
                                        <b-form-textarea id="textarea-default" class="mb-2" placeholder="Answer">
                                        </b-form-textarea>
                                    </b-modal>
                                </div>
                                <div>
                                    <b-button v-b-modal.modal-6>Delete</b-button>
                                    <b-modal id="modal-6" title="BootstrapVue">
                                        <p class="text-center">Do you want to delete this FAQ?</p>
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
                // Note 'isActive' is left out and will not appear in the rendered table
                fields: [{
                        key: 'question',
                        sortable: true
                    },
                    {
                        key: 'answer',
                        sortable: false,
                        variant: 'danger'
                    },
                ],
                items: [{
                    isActive: true,
                    question: 'Unsa ang tinda?',
                    answer: 'Ang tinda usa ka locally-developed Q-Commerce platform. Naay duha ka existing apps- tinda Buyer App and tinda Seller App - serving both buyers and sellers.'
                }]
            }
        }
    }
</script>
