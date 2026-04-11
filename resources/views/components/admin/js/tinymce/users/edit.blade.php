<script>

    // var raw = tinymce.get('body').plugins.wordcount.body.getCharacterCount();
    // var html = tinymce.get('body').getContent().length;

    const min = {{ config('custom.validations.tinymce.min', 10) }};
    const max = {{ config('custom.validations.tinymce.max', 65535) }};

    const fieldNameCv = 'Az életrajz mező';
    const fieldNameCvEn = 'Az életrajz (angolul) mező';

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('users-edit');
        form.addEventListener('submit', (event) => {

            const cv = tinymce.get('cv').getContent().length;
            const cv_en = tinymce.get('cv_en').getContent().length;

            // CV (min)
            if(cv > 0 && cv < min) {
                alert(fieldNameCv + ' hossza nem lehet kevesebb, mint ' + min + ' karakter!');
                event.preventDefault();
            }

            // CV (max)
            if(cv > max) {
                alert(fieldNameCv + ' hossza nem lehet több, mint ' + max + ' karakter!');
                event.preventDefault();
            }

            /* ************************************************************************************************ */

            // CV_EN (min)
            if(cv_en > 0 && cv_en < min) {
                alert(fieldNameCvEn + ' hossza nem lehet kevesebb, mint ' + min + ' karakter!');
                event.preventDefault();
            }

            // CV_EN (max)
            if(cv_en > max) {
                alert(fieldNameCvEn + ' hossza nem lehet több, mint ' + max + ' karakter!');
                event.preventDefault();
            }
        });
    });

</script>
