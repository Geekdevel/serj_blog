var tag = document.querySelector('#tag_add');
var post_id = document.querySelector('.post_id');
var post = document.querySelector('.post');

tag.addEventListener('click', function(e){
    e.preventDefault();

    post_id_next = post_id.cloneNode(true);
    post_id.after(post_id_next);

    console.log('add!');
    console.log(post.value);
});
