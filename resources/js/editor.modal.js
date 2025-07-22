import Quill from "quill"
import Toastify from 'toastify-js'


function quillDeltaToHtml(delta) {

    const container = document.createElement('div');
    container.style.display = 'none';

    document.body.appendChild(container);

    const editor = new Quill(container);
    editor.setContents(delta);
    const html = editor.getSemanticHTML();

    container.remove();

    return html;
}


export default function editorModal(id, body) {

    return {

        editor: null | Quill,
        postId: id,
        postData: null,
        editing: false,

        init() {

            if(!body || body === '') return;

            this.postData = JSON.parse(body);

            this.updatePostBody();

        },

        updatePostBody() {
            if(!body || body === '') return;
            document.querySelector(`#post-body-${id}`).innerHTML = quillDeltaToHtml(JSON.parse(body));
        },

        initEditor(data) {
            if(this.editor) return;

            this.editor = new Quill(`#post-editor-${id}`, {
                theme: 'snow',
            });

            this.editor.root.innerHTML = quillDeltaToHtml(data);

        },

        updatePost() {

            const data = this.editor.getContents();

            this.$wire.updatePost(JSON.stringify(data));

            Toastify({
                text: "Сохранено"
            }).showToast();

            this.editor.root.innerHTML = this.editor.getSemanticHTML();
            this.updatePostBody();
            this.editing = false;

        }

    }

}
