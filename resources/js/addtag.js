var tag = document.querySelector('#tag_add');
var post_id = document.querySelector('.post_id');
var post = document.querySelector('.post');
var posts_list = document.querySelector('#posts_list');

tag.addEventListener('click', function(e){
    e.preventDefault();

    post_id_next = post_id.cloneNode(true);
    //post_id.after(post_id_next);
    posts_list.insertAdjacentElement('beforeend', post_id_next);
    //console.log(posts_list);
});
