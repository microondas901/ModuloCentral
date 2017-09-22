import './bootstrap'
import Vue from 'vue'
import VueCodeMirror from 'vue-codemirror';
import CodePreview from './components/scripts/code-preview'
import TablaItems from './components/scripts/tabla-items'

Vue.use(VueCodeMirror);

new Vue({
    el: '#app',
    components: { CodePreview, TablaItems },
    data: {
        items: [],
    },
    created() {
        this.refresh();

    },
    methods: {
        refresh() {

            axios.get('/api/codificacion/').then(response => {
                this.items = response.data
            });
        }

    }
})