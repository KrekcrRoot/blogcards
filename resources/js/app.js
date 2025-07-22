import 'bootstrap/dist/css/bootstrap.min.css'
import 'quill/dist/quill.snow.css';
import 'toastify-js/src/toastify.css'

import './bootstrap';
import postModal from './post.modal.js';
import editorModal from './editor.modal.js';

Alpine.data('postModal', postModal);
Alpine.data('editorModal', editorModal);
