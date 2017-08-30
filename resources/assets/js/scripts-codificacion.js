import "./bootstrap";
import Vue from "vue";
import VueHighlightJS from 'vue-highlightjs';
import { Modal } from "uiv";
import Paginator from './components/classes/paginator';
import { Pagination } from "uiv";

Vue.use(VueHighlightJS);

new Vue({
    el: "#app",
    components: { Modal, Pagination },
    data: {
        script: [],
        newDocumentos: {},
        formErrors: {},
        formErrorsUpdate: {},
        modalState: false,
        paginator: new Paginator(),
        deleteModalState: false,
        elimiScript: {},
        search: "",
        prevScript: {},
        prevModal: false,
    },
    created() {
        this.refresh();
    },
    methods: {
        refresh() {
            axios.get('/api/scripts/')
                .then(response => this.script = this.paginator.data = response.data);
        },
        destroy(script) {
            axios.delete('/api/scripts/' + script.PK_id)
                .then(() => {
                    this.script = this.paginator.data = this.script.filter(value => value != script);
                    this.deleteModalState = false;
                    toastr.warning('Documento Eliminado Correctamente');
                });
        },
        openDeleteModal(script) {
            this.elimiScript = script;
            this.deleteModalState = true;

        },
        closeDeleteModal() {
            this.deleteModalState = false;
        },
        preview(script) {
            axios.post('/api/scripts/preview/' + script.url).then(res => {
                script.code = res.data.code;
                this.prevScript = script;
                this.prevModal = true;
            });
        }
    },
    watch: {
        search(query) {
            this.paginator.data = this.script.filter(script => {
                return new RegExp(query, 'ig')
                    .test(`${script.url}`)
            })
        }
    }


});