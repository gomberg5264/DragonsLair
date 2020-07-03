{{-- The modal that is used to edit posts. It should be included on all pages that render posts. --}}

<script>
    var editPostID = -1;    //A nonexistent post value.
    var token = "";
    var newPostBody = null;
    var check = false;
    function editClick(event)   //If the edit button is clicked.
    {
        event.preventDefault();     //Prevent default behaviour of the event.
        var initialPostBody = event.target.parentNode.parentNode.parentNode.childNodes[1].textContent;     //Access the post content corresponding to the post whose body was clicked.
        $('#editedPost').val(initialPostBody);     //Set the contents of the edit modal to the preexisting post content.
        editPostID = event.target.dataset['postid'];   //Retrieve the ID of the post to be edited.
        token = "{{Session::token()}}";    //Retrieve the CSRF token.
        $('#editingPost').modal('show');    //Display the edit post modal.
    }
</script>
<div class="modal" tabindex="-1" role="dialog" id="editingPost">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="post-body">Edit your post</label>
                            <textarea class="form-control" name="editedPost" id="editedPost" rows="10"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveEditedPostButton" onclick="saveEditedPost()">Save changes</button>
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
        </div>
    </div>
</div>

<script>
    function saveEditedPost()
    {
        newPostBody = $('#editedPost').val();
        // console.log("editPostID:\t"+editPostID+".\ntoken:\t"+token+".\n\n");
        $.ajax
        ({
            method: 'POST',
            url:    "{{route('editPost')}}",
            data:
            {
                body:   newPostBody,     //Current post body.
                postID: editPostID,     //ID of the post to be edited.
                _token: token   //Cross Site Request Forgery (CSRF) token.
            }
        })
        .done(function(msg)
        {
            if(msg['status'])
            {
                alert(msg['message']);
                var postToBeEdited = editPostID + 'postParagraph'   //Retrieve the id of the paragraph element of the post to be edited.
                document.getElementById(postToBeEdited).textContent  = msg['newPostBody'];  //Modify the text content of said paragraph element to be the new post.
                $('#editingPost').modal('hide');
                check = true;
                //document.location.reload(true);
            }

        });
        if(check)
        {
            alert('Post Failed to be edited.');
        }
    }
</script>
