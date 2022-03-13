require('./bootstrap');

import {createApp} from "vue";
import components from "./components";
import {createStore} from 'vuex';

// store
const store = createStore({
    state() {
        return {
            count: 0
        }
    },
    mutations: {
        increment (state) {
            state.count++
        }
    }
})

let app = createApp({
    components
});

app.use(store);

app.mount('#app');

