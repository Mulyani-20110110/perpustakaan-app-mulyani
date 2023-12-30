<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">EDIT BOOKS</div>

                    <div class="card-body">

                        <form @submit.prevent="BooksUpdate">

                            <div class="form-group">
                                <label>Nama Buku</label>
                                <input type="text" class="form-control" v-model="books.nama_book"
                                       placeholder="Masukkan Nama Buku">
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.title[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Author</label>
                                <input type="text" class="form-control" v-model="books.nama_author"
                                       placeholder="Masukkan Nama Author">
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.title[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No ISBN</label>
                                <input type="text" class="form-control" v-model="books.no_isbn"
                                       placeholder="Masukkan No ISBN">
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.title[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="text" class="form-control" v-model="books.tahun_terbit"
                                       placeholder="Masukkan Tahun Terbit">
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.title[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">UPDATE</button>
                                <button type="reset" class="btn btn-md btn-danger">RESET</button>
                            </div>

                        </form>

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
                books: {},
                validation: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/books/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.books = response.data.data;
            });
        },
        methods: {
            BooksUpdate() {
                let uri = `http://localhost:8000/api/books/update/${this.$route.params.id}`;
                this.axios.post(uri, this.books)
                    .then((response) => {
                        this.$router.push({name: 'books'});
                    }).catch(error => {
                    this.validation = error.response.data.data;
                });
            }
        }
    }
</script>
