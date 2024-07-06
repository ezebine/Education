function CKEditorInitGlobal(selector_name){
    //        alert("curieux");
            ClassicEditor
                .create( document.querySelector( selector_name ) )
                .then( editor => {
                    console.log( 'Editor was initialized', editor );
    //                alert("initialise");
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
        }
    
        CKEditorInitGlobal("#syllabus");
        CKEditorInitGlobal("#description");