<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">BOOKS</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'create' }" class="btn btn-md btn-success">TAMBAH BOOKS</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama Buku</th>
                                    <th>Nama Author</th>
                                    <th>No ISBN</th>
                                    <th>Tahun Terbit</th>
                                    <th>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(get, index) in books" :key="get.id">
                                    <td>{{ books.nama_book }}</td>
                                    <td>{{ books.nama_author }}</td>
                                    <td>{{ books.no_isbn }}</td>
                                    <td>{{ books.tahun_terbit }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'edit', params: { id: put.id }}" class="btn btn-sm btn-primary">EDIT</router-link>
                                        <button @click.prevent="BooksDelete(post.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

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
                books: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/books`;
            this.axios.get(uri).then(response => {
                this.books = response.data.data;
            });
        },
        methods: {
            BooksDelete(id, index)
            {
                this.axios.delete(`http://localhost:8000/api/books/${id}`)
                    .then(response => {
                        this.books.splice(index, 1);
                    }).catch(error => {
                    alert('system error!');
                });
            }
        }
    }

</script>
