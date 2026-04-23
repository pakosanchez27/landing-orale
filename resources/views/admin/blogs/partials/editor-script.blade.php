<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-editor-root]').forEach(function (editorRoot) {
            const surface = editorRoot.querySelector('[data-editor-surface]');
            const textarea = editorRoot.querySelector('[data-editor-textarea]');

            if (!surface || !textarea) {
                return;
            }

            const syncEditor = function () {
                textarea.value = surface.innerHTML.trim();
            };

            editorRoot.querySelectorAll('[data-command]').forEach(function (button) {
                button.addEventListener('click', function () {
                    document.execCommand(button.dataset.command, false, null);
                    syncEditor();
                    surface.focus();
                });
            });

            editorRoot.querySelectorAll('[data-block]').forEach(function (button) {
                button.addEventListener('click', function () {
                    document.execCommand('formatBlock', false, button.dataset.block);
                    syncEditor();
                    surface.focus();
                });
            });

            editorRoot.querySelectorAll('[data-link]').forEach(function (button) {
                button.addEventListener('click', function () {
                    const url = window.prompt('Pega la URL del enlace');

                    if (!url) {
                        return;
                    }

                    document.execCommand('createLink', false, url);
                    syncEditor();
                    surface.focus();
                });
            });

            surface.addEventListener('input', syncEditor);
            syncEditor();
        });
    });
</script>
