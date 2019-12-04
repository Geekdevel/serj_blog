var tag = document.querySelector('#add_tag');
tag.addEventListener('click', function(e){
    e.preventDefault();
    var url = window.location.toString();
    arr = url.split('/');
    var id = returnLastItem(arr);
    console.log(id);
});

function returnLastItem(arr) {
  return arr[arr.length - 1];
}
