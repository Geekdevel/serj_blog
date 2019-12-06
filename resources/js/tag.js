var tag = document.querySelector('#add_tag');

tag.addEventListener('click', function(e){
    e.preventDefault();
    var url = window.location.toString();
    arr = url.split('/');
    var post_id = returnLastItem(arr);
    var input = document.querySelector('#title');
    var title = input.value;
    //console.log(id, title);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
            type: "POST",
            url: "/tag",
            data: {
                'title' : title,
                'post_id' : post_id
            },
            cache: false,
            success: function(data){
                console.log(data);
            }
        });
});

function returnLastItem(arr) {
  return arr[arr.length - 1];
}
