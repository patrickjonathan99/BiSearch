@extends('layouts.main')

@section('container')
    <div class="newFormContainer">
        <div class="newRecContainer">
            <p class="newRecText">Edit Profile</p>
        </div>

        <div class="newFormContent">
            <form action="/updateProfile" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="name formSec">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ $users->name }}" placeholder="Full Name" required>
                    @error('name')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pp mb-3">
                    <label for="image" class="form-label">Profile Picture</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @error('image')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="text" name="user_id" value="{{ $users->id }}" style="display: none;">
                <input type="hidden" name="oldImage" value="{{ $users->pic }}">

                <div class="addNewForum formSec">
                    <button class="button addForumBtn" type="submit" style="color: black !important;">Confirm Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
