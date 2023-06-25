import { TOKEN_NAME } from './configs';
import _ from 'lodash';
window._ = _;

import 'bootstrap';


import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// const token = localStorage.getItem(TOKEN_NAME)
// if(token){
//     window.axios.defaults.headers.common['Authorization'] = 'Bearer '+token;
// }
    

