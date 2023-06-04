@extends('layouts.main')

@section('container')
    <div class="newFormContainer">
        <div class="newRecContainer">
            <p class="newRecText">New Recruitment</p>
        </div>

        <div class="newFormContent">
            <form action="/newform" method="post">
                @csrf
                <div class="titles formSec">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Title" required>
                    @error('title')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="reqStudent formSec">
                    <label for="reqStudent">Required Students</label>
                    <input type="number" name="reqStudent" id="reqStudent" value="{{ old('reqStudent') }}" placeholder="Required Students" required>
                    @error('reqStudent')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="topic formSec">
                    <label for="topic">Topic</label>
                    <input type="text" name="topic" id="topic" value="{{ old('topic') }}" placeholder="Topic" required>
                    @error('topic')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="description formSec">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}" placeholder="Description" required>
                    @error('description')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="duedate formSec">
                    <label for="duedate">Due Date</label>
                    <input type="date" name="duedate" id="duedate" value="{{ old('duedate') }}" placeholder="Choose Date" required>
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
                            <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="type formSec">
                    <label for="type">Type</label>
                    <select name="type" id="type" required>
                        <option value="" selected disabled>Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="text" name="lecturer_id" value="{{ $users->id }}" style="display: none;">

                <div class="addNewForum formSec">
                    <button class="button addForumBtn" type="submit"><i class="fa-solid fa-plus fa-large"></i></button>
                </div>
            </form>
        </div>
    </div>

@endsection
