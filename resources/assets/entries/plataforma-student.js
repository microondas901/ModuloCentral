import './bootstrap';
import Vue from 'vue';
import axios from 'axios';
import { Modal, Popover } from "uiv";
import TextInput from "../components/inputs/text-input";
import BsSwitch from '../components/bs/bs-switch';
import SelectInput from "../components/inputs/select-input";
import TextareaInput from "../components/inputs/textarea-input";

new Vue({
    el: '#app',
    components: {
        Modal,
        BsSwitch, 
        TextInput,
        TextareaInput, 
        SelectInput,
        Popover 
    },
    data() {
        return {
            casoPrueba: [],
            casoUpdate: {},
            json: {},
            tiposInputs: {},
            newCasoPrueba: {},
            fillCasoPrueba: this.schema(),
            formErrors: {},
            formErrorsUpdate: {},
            proyectoId: window.proyectoId,
            enviarModalState: false,
            selected: {}
        }
    },
    created() {
        axios.get(`/api/proyectos/${window.proyectoId}/plataforma`)
                .then(res => this.casoPrueba = res.data);
        axios.get(`api/tiposInputs`)
                .then(res => this.tiposInputs = res.data);
                        
    },
    methods: {
        schema(){
            return {
                formulario: "",
                observacion: "",
                PK_id: "",
                testInput: []

            }
        },
        cerrarModalEnv(){
            this.fillCasoPrueba = this.schema();
            this.casoPrueba.formulario = "";

        },
        update(caso) {
            
            axios.post('/api/enviarCasoPrueba/' + this.fillCasoPrueba.PK_id, this.fillCasoPrueba)
                .then(response => {
                    this.formUpdateErrors = {};
                    this.casoPrueba = this.casoPrueba.map(value => {
                        return value.PK_id == caso.PK_id ? caso : value;
                    });
                    this.enviarModalState = false;                   
                    toastr.info('Caso prueba subido correctamente');
                })
                .catch(error => this.formErrorsUpdate = error.response.data);
                
        },
        cadenaJson(json,caso) {
            if(this.IsJsonString(json) == false){
                this.formErrorsUpdate.formulario = 'El texto introducido no corresponde a un Json'
                toastr.error('El texto introducido no corresponde a un Json');
            } else {
            caso.formulario = this.fillCasoPrueba.formulario;
            this.fillCasoPrueba = caso;
            this.json = JSON.parse(json);
            this.enviarModalState = true;
            this.fillCasoPrueba.testInput = new Array(this.json.length);
            }
        },
        IsJsonString(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
    }
});

