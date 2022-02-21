require('./bootstrap')

import axios from 'axios'
import * as Vue from 'vue'
//import App from './components/App.vue'


const app = Vue.createApp({
    data() {
        return {
            date1: null,
            date2: null,
            results: [],
            newResult: [],
            error: null
        }
    },
    methods: {
        clear() {
            this.date1 = null
            this.date2 = null
            this.results = []
            this.newResult = []
            this.error = null
        },
        calculate() {
            axios.post('http://datecalculator.loc/api/calculate', {
                date1: this.date1,
                date2: this.date2
            }).then(responce => this.newResult = responce.data)
            .catch(error => this.error = error.message)
        }
    }
})

const vm = app.mount('#app')

axios.get('http://datecalculator.loc/api/all')
    .then(responce => vm.results = responce.data)

