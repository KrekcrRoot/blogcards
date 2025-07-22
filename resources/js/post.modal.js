import Quill from "quill";

function quillDeltaToText(delta) {

    const container = document.createElement('div');
    container.style.display = 'none';

    document.body.appendChild(container);

    const editor = new Quill(container);
    editor.setContents(delta);
    const html = editor.getText(0, 80);

    container.remove();

    return html;
}

export default function postModal() {
    return {
        openPostId: null,

        loadDescription(data) {

            if(!data || data === '') return;

            this.$el.innerText = quillDeltaToText(data);
        },

        showModal(id) {

            this.openPostId = id;
            history.pushState(null, '', `/${id}`);

        },

        closeModal() {

            this.openPostId = null;
            history.pushState(null, '', '/');

        },

        getPostId() {

            const id = window.location.pathname.match(/\d+/);
            if(id != null)
                this.openPostId = Number(id[0]);

        },

        init() {

            window.addEventListener('popstate', () => {
                this.getPostId();
            });

            this.getPostId();

        }
    }
}
