<template>
    <div id="wrapper">
        <sidebar-component></sidebar-component>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <navbar-component></navbar-component>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Testimonials</h1>
                    </div>
                    <div class="mb-4">
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTestimonial">
                                Add Testimonial
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="addTestimonial" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addTestimonialLabel">Modal title</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Enter Witness Name" v-model="form.witness">
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" rows="3" placeholder="Enter Testimonial" v-model="form.testimonial"></textarea>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" @click="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Table for Witness and Testimonial</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="150" scope="col">Witness</th>
                                            <th width="800" scope="col">Testimonial</th>
                                            <th width="100" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) of products" :key="item.id">
                                            <td>{{ item.witness }}</td>
                                            <td>{{ item.testimonial }}</td>
                                            <td>
                                                <button class="btn btn-secondary btn-sm" @click="edit(item)"><i
                                                        class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm" @click="remove(item,index)"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Witness Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Witness Name"
                                                    v-model="formEdit.witness">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Testimonial</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter Testimonial" v-model="formEdit.testimonial"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" @click="save()">Update</button>
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
        props: ['testimony'],
        data() {
            return {
                products: {},
                form: {
                    witness: null,
                    testimonial: null,
                },
                formEdit: {
                    witness: null,
                    testimonial: null,
                },
                selectedId: null
            }
        },
        created() {
            this.getProducts();
        },
        methods: {
            getProducts() {
              this.axios.get('/api/testimonial')
                  .then(response => {
                      this.products = response.data;
                  });
            },
            submit() {
                $('#addTestimonial').modal('hide');
                const vm = this;
                axios.post('/api/testimonial', this.form)
                    .then(function (response) {
                        vm.products.push(response.data.data);
                        vm.form.witness = null;
                        vm.form.testimonial = null;
                        swal("Add Success!", "A testimony has been added successfully!", "success");
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },
            edit(item) {
                console.log(item)
                this.formEdit.witness = item.witness;
                this.formEdit.testimonial = item.testimonial;
                this.selectedId = item.id;
                $('#editModal').modal('show');

            },
            save() {
                $('#editModal').modal('hide');
                const vm = this;
                axios.put(`/api/testimonial/${vm.selectedId}`, this.formEdit)
                    .then(function (response) {
                        swal("Update Success!", "This testimony has been updated successfully!", "success");
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },
            remove(item, index) {
                const vm = this;
                axios.delete(`/api/testimonial/${item.id}`)
                    .then(function (response) {
                        vm.products.splice(index, 1);
                        swal("Delete Success!", "This testimony has been deleted successfully!", "success");
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },
        },
    }
</script>
