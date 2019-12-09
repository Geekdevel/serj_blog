$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

var tag = document.querySelector('#add_tag');
var tags_show = document.getElementById('tags_show');

var url = window.location.toString();
arr = url.split('/');
var post_id = returnLastItem(arr);

window.onload = function(){
    getListTags();
};

tag.addEventListener('click', function(e){
    e.preventDefault();

    var input = document.querySelector('#title');
    var title = input.value;

    $.ajax({
            type: "POST",
            url: "/tag",
            data: {
                'title' : title,
                'post_id' : post_id
            },
            cache: false,
            success: function(data){
                input.value='';
                tags_show.innerHTML = '';
                getListTags();
            }
        });
});

function returnLastItem(arr) {
  return arr[arr.length - 1];
}

function getListTags() {
    $.ajax({
        type: "POST",
        url: "/tag/list",
        data: {
            'post_id' : post_id
        },
        cache: false,
        success: function(data){
            tags_show.innerHTML = data;
        }
    });
}
