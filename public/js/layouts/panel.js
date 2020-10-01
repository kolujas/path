document.addEventListener('DOMContentLoaded', function(e){
    document.querySelector('.edit-data').addEventListener('click', function(e){
        e.preventDefault();
        for (const input of document.querySelectorAll('input')) {
            if(input.disabled){
                input.disabled = false;
            }else{
                input.disabled = true;
            }
        }
    });
});