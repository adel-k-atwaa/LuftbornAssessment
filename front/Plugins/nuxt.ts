import axios from "axios";
export default defineNuxtPlugin((nuxtApp) => {
    let api = axios.create();
    // api.defaults.withCredentials = true;
    // api.defaults.withXSRFToken = true;
    return {
        provide: {
            api: api,
        },
    };
});