import "./bootstrap";
import Vue from "vue";
import Validate from "../plugins/Validate"

import ComponentForm from "../components/admin/ComponentForm"
import BsSwitch from "../components/bs/bs-switch";
import Modal from "../components/utils/modal";
import TextInput from "../components/inputs/text-input"
import TextareaInput from "../components/inputs/textarea-input"

Vue.use(Validate)

new Vue({
    el: "#app",
    components: { BsSwitch, Modal, TextInput, TextareaInput, ComponentForm },
    data() {
        return {
            componentes: [],
            newComponente: this.getSchema(),
            documentoId: window.documentId,
            fillComponente: {},
            formErrors: {},
            formErrorsUpdate: {},
            tiposDocumentos: []
        }
    },

    created(){
        axios.get(`/api/tdocumentos/${this.documentoId}/componentes`)
            .then(res => this.componentes = res.data);
    },

    methods:{

        //abre el modal de edicion
        openEditModal(componentes) {
            this.fillComponente = Object.assign({}, componentes);
            $('#editar-componentes').modal("show");
        },

        //crea el componente del documento
        store(componente){
            componente.FK_TipoDocumentoId = this.documentoId;
            axios.post('/api/componentes', componente)
                .then(res => {
                    this.componentes.push(res.data);
                    this.newComponente = this.getSchema();
                    $("#crear-componente").modal("hide");
                    toastr.info('Componente subido correctamente');
                })
                .catch(err => this.$refs.createForm.setErrors(err.response.data));
        },

        //actualiza el componente
        update(componente) {
            axios.put('/api/componentes/' + componente.PK_id, componente)
                .then(response => {
                    let index = this.componentes.findIndex(c => c.PK_id == componente.PK_id)
                    this.$set(this.componentes, index, componente)
                    this.fillComponente = {};
                    $("#editar-componentes").modal("hide");
                    toastr.info('Componente editado correctamente');
                })
                .catch(err => this.$refs.editForm.setErrors(err.response.data));
        },

        //elimina el componente
        destroy(componentes) {
            axios.delete('/api/componentes/' + componentes.PK_id)
                .then(() => {
                    this.componentes = this.componentes.filter(value => value != componentes);
                    toastr.info('Componente eliminado correctamente');
                });
        },

        //esquema de un componente de documento
        getSchema(){
            return {
                nombre: "",
                required: false,
                descripcion:"",
            }
        },



    }
});
