@extends('layouts.main')

@section('container')
    <div class="newFormContainer">
        <div class="newRecContainer">
            <p class="newRecText">Edit Forum</p>
        </div>

        <div class="newFormContent">
            <form action="/updateForum" method="post">
                @method('put')
                @csrf
                <div class="titles formSec">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $posts->title }}" placeholder="Title" required>
                    @error('title')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="reqStudent formSec">
                    <label for="reqStudent">Required Students</label>
                    <input type="number" name="reqStudent" id="reqStudent" value="{{ $posts->required_student }}" placeholder="Required Students" required>
                    @error('reqStudent')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="topic formSec">
                    <label for="topic">Topic</label>
                    <input type="text" name="topic" id="topic" value="{{ $posts->topic }}" placeholder="Topic" required>
                    @error('topic')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="description formSec">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ $posts->description }}" placeholder="Description" required>
                    @error('description')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="duedate formSec">
                    <label for="duedate">Due Date</label>
                    <input type="date" name="duedate" id="duedate" value="{{ $posts->due_date }}" placeholder="Choose Date" required>
                    @error('duedate')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="department formSec">
                    <label for="department">Department</label>
                    <select name="department" id="department" required>
                        <option value="" selected disabled>Select Department</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" @if($posts->department_id == $dept->id) selected @endif>{{ $dept->department_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="type formSec">
                    <label for="type">Type</label>
                    <select name="type" id="type" required>
                        <option value="" selected disabled>Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" @if($posts->type_id == $type->id) selected @endif>{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="text" name="post_id" value="{{ $posts->id }}" style="display: none;">

                <div class="addNewForum formSec">
                    <button class="button addForumBtn" type="submit" style="color: black !important;">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
