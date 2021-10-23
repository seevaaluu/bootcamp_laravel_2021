<template>
    <div class="libros">
        <div class="crear-libros">
            <div class="text-right">
                <v-dialog
                v-model="dialog"
                width="500"
                >
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                    color="primary"
                    dark
                    v-bind="attrs"
                    v-on="on"
                    >
                    Agregar Libro
                    </v-btn>
                </template>


                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                    Agregar Libro
                    </v-card-title>

                    <v-card-text>
                        <v-container>
                            <v-layout row flex>
                                <v-flex sm12 md6>
                                    <v-text-field
                                        label="Nombre"
                                        v-model="libro.nombre"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex sm12 md6>
                                    <v-text-field
                                        label="Editorial"
                                        v-model="libro.editorial"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex sm12 md6>
                                    <v-text-field
                                        label="Fecha"
                                        type="date"
                                        v-model="libro.fecha_de_publicacion"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="dialog = false, storeLibros()"
                    >
                        Guardar
                    </v-btn>
                    </v-card-actions>
                </v-card>
                </v-dialog>
            </div>
        </div>
        <div class="tabla-libros">
            <v-data-table
                :headers="headers"
                :items="libros.data"
                :items-per-page="5"
                class="elevation-1"
            >
            <template v-slot:item="{ item }">
                <tr>
                <td>{{item.nombre}}</td>
                <td>{{item.editorial}}</td>
                <td>{{item.fecha_de_publicacion}}</td>
                <td>
                    <v-icon
                    small
                    class="mr-2"
                    @click.stop="$set(dialogNote, item.id, true)"
                >
                    mdi-pencil
                </v-icon>
                <v-dialog v-model="dialogNote[item.id]" scrollable max-width="500" max-height="600" :key="item.id">
                    <v-card>
                        <v-card-title>
                            <span class="headline">Editar Libro: {{item.nombre}}</span> <v-spacer></v-spacer> <v-btn color="primary" icon text @click.stop="$set(dialogNote, item.id, false)"><v-icon>mdi-close</v-icon></v-btn>
                        </v-card-title>
                        <v-card-text>
                        <v-container>
                            <v-layout row flex>
                                <v-flex sm12 md6>
                                    <v-text-field
                                        label="Nombre"
                                        v-model="item.nombre"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex sm12 md6>
                                    <v-text-field
                                        label="Editorial"
                                        v-model="item.editorial"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex sm12 md6>
                                    <v-text-field
                                        label="Fecha"
                                        type="date"
                                        v-model="item.fecha_de_publicacion"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="updateLibros(item)">actualizar</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>   
                <v-icon
                    small
                    @click="deleteLibros(item)"
                >
                    mdi-delete
                </v-icon>
                </td>
                </tr>
            </template>
            </v-data-table>
        </div>
    <v-alert
    v-model="alertSuccess"
    dismissible
    type="success"
    >{{success}}</v-alert>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        success: "",
        dialogNote: {},  
        alertSuccess: false,  
        libro: {},  
        dialog: false,  
        libros: {},
        headers: [
          {
            text: 'Nombre',
            align: 'start',
            sortable: false,
            value: 'nombre',
          },
          { text: 'Editorial', value: 'editorial' },
          { text: 'Fecha de Publicación', value: 'fecha_de_publicacion' },
          { text: 'Acciones' },
        ],
      }
    },
    methods: {
         getLibros() {
      var urlLibros =
        "/get-libros";
      axios.get(urlLibros).then((response) => {
        this.libros = response.data;
      });
    },
    storeLibros() {
      axios.post('/libros', this.libro).then((response) => {
        this.success = response.data;  
        this.alertSuccess = true;
        this.getLibros();
      });
    },
    updateLibros(item) {
      axios.patch('/libros/'+ item.id, item).then((response) => {
        this.success = response.data;  
        this.alertSuccess = true;
        this.getLibros();
      });
    },
    deleteLibros(item) {
      axios.delete('/libros/'+ item.id, item).then((response) => {
        this.success = response.data;  
        this.alertSuccess = true;
        this.getLibros();
      });
    },
    },
    created() {
        this.getLibros();
    }
  }
</script>