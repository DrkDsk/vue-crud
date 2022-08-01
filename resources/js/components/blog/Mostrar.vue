<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-lg-12 mb-4">
                    <router-link :to="{name:'crear'}" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i></router-link>
                </div>

                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-dark text-white">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Contenido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="blog in blogs" :key="blog.id">
                                    <td>{{blog.id}}</td>
                                    <td>{{blog.titulo}}</td>
                                    <td>{{blog.contenido}}</td>
                                    <td>
                                        <router-link :to='{name:"editar", params:{id:blog.id}}' class="btn btn-info mx-1"><i class="fa-solid fa-pen-to-square"></i></router-link>
                                        <a type="button" v-on:click="borrarBlog(blog.id)" class="btn btn-danger mx-1"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "blogs",
        data(){
            return {
                blogs:[]
            }
        },
        created(){
            this.mostrarBlogs()
        },
        methods: {
            async mostrarBlogs(){
                await this.axios.get("/api/blog").then(response => {
                    this.blogs = response.data
                }).catch(error => {
                    this.blogs = []
                })
            },
            borrarBlog(id){
                let isconfirmed = confirm("Confirma eliminar el registro?")
                if (isconfirmed) {
                    this.axios.delete(`/api/blog/${id}`).then(response => {
                        this.mostrarBlogs()
                    })
                    .catch(error => {
                        console.log(error);
                    })
                }
            }
        }

    }
</script>