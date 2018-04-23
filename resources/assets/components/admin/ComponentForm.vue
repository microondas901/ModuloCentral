<template>
    <form @submit.prevent="safeExec(submit)">
                    
        <text-input name="nombre" label="Nombre" icon="fa fa-tag" 
            v-model="componente.nombre"
            v-validate="'required|alpha_spaces|max:30'"
            :error-messages="errors.collect('nombre')" 
            required>
        </text-input>
        
        <div class="form-group form-md-radios">
            <label>OBLIGATORIO</label>
            <bs-switch ref="switch" id="required" label="requerido" v-model="componente.required"></bs-switch>
        </div>
        
        <textarea-input name="descripcion" label="Descripción" v-model="componente.descripcion" 
            v-validate="'required|max:300'"
            :error-messages="errors.collect('descripcion')"    
            required>
        </textarea-input>


        <div class="text-center">
            <button type="submit" class="btn green-jungle"><i class="fa fa-plus"></i>{{ submitText }}</button>
            <button type="button" class="btn red" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</button>
        </div>
    </form>
</template>
<script>
import _ from 'lodash'
import BsSwitch from "../bs/bs-switch"
import TextInput from "../inputs/text-input"
import TextareaInput from "../inputs/textarea-input"
export default {
    components: { BsSwitch, TextInput, TextareaInput },
    props: {
        editable: Object,
        submitText: { type: String, default: "Guardar" }
    },
    data() {
        return {
            componente: {}
        }
    },
    methods: {
        submit(){
            this.$emit("submit", this.componente)
        }
    },
    watch: {
        editable(val) {
            this.$refs.switch.mount()
            this.componente = _.clone(val)
        } 
    }
}
</script>
