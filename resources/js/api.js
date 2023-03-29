import axios from 'axios';

const api = axios.create();

api.interceptors.request.use(config=>{
    if(localStorage.getItem('token')){
        config.headers.authorization = `Bearer ${localStorage.getItem('token')}`
    }
    return config;
}, error => {

});

api.interceptors.response.use(
    config => {
        if(localStorage.getItem('token')){
            config.headers.authorization = `Bearer ${localStorage.getItem('token')}`
        }
        return config;
    }
);
export default api;
