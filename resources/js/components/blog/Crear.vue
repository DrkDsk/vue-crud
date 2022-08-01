<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Blog</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="crear">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input v-model="blog.titulo" type="text" class="form-control" id="staticEmail" placeholder="Título">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputContenido" class="col-sm-2 col-form-label">Contenido</label>
                                <div class="col-sm-10">
                                    <textarea v-model="blog.contenido" type="text" class="form-control" id="inputContenido" placeholder="Contenido"></textarea>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary mb-2">Guardar</button>
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
        name: "crear-blog",
        data(){
            return {
                blog: {
                    titulo: "",
                    contenido: ""
                }
            }
        },
        methods: {
            async crear(){
                await this.axios.post('/api/blog',this.blog)
                .then(response => {
                    this.$router.push({name: 'mostrar'})
                }).catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>