<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('update.profile') }}" method="POST">
                @Method('PATCH')
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Edit your profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer">

                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$profile_data->name}}">
                    </div>

                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" name="address" class="form-control" id="Address" aria-describedby="emailHelp"
                            placeholder="Enter your address" value="{{$profile_data->profile->address}}">
                        <small id="emailHelp" class="form-text text-muted">Enter where are you from..</small>
                    </div>

                    <div class="form-group">
                        <label for="Occupation">Occupation</label>
                        <input type="text" name="occupation" class="form-control" id="Occupation"
                            aria-describedby="emailHelp" placeholder="Enter your occupation"
                            value="{{$profile_data->profile->occupation}}">
                        <small id="emailHelp" class="form-text text-muted">Enter what are you doing.</small>
                    </div>

                    <div class="form-group">
                        <label for="Twitter">Twitter</label>
                        <input type="text" name="twitter_handle" class="form-control" id="Twitter"
                            aria-describedby="emailHelp" placeholder="Enter your twitter handle"
                            value="{{$profile_data->profile->twitter_handle}}">
                        <small id="emailHelp" class="form-text text-muted">For Example: @TheAlter72.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary edit_profile">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>