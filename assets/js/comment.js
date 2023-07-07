document.addEventListener('DOMContentLoaded', ()=> {
    new App()
});

class App{
    constructor() {
        this.handleCommentform();
    }

    handleCommentform(){
        const commentForm = document.querySelector('form.comment-form');

        if (null === commentForm) {
            return;
        }

        commentForm.addEventListener('submit', async (e) =>{
            e.preventDefault();

            const response = await fetch('/show/ajax/comments', {
                method : 'POST',
                body: new FormData(e.target)
            });

            if (!response.ok){
                return;
            }

            const json = await response.json();

            if (json.code === 'COMMENT_ADDED_SUCCESSFULLY'){
                const commentList = document.querySelector('.comment-list');
                const commentCount = document.querySelector('#comment-count');
                let textarea = commentForm.querySelector('textarea');
                commentList.insertAdjacentHTML('beforeend',json.message);
                commentList.lastElementChild.scrollIntoView();
                commentCount.innerText = json.numberOfComment;
                textarea.value = '';
            }
        });
    }
}
