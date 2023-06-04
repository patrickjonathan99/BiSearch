@extends('layouts.main')

@section('container')
    @if(session()->has('profileUpdated'))
        <div class="alert alert-success alert-dismissible fade show alertProfile" role="alert">
            {{ session('profileUpdated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="forumContent">
        <div class="card bigC">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                    <figure class="image is-128x128">
                        @if ($users->pic)
                            <img src="{{ asset('storage/' . $users->pic) }}" alt="Placeholder image">
                        @else
                            <img src="/images/user.jpg" alt="Placeholder image">
                        @endif
                    </figure>
                    </div>
                    <div class="media-content">
                    <p class="title is-3 lecturerName">Profile</p>
                    <p class="subtitle is-8">Name: {{ $users->name }}</p>
                    <p class="subtitle is-8">Email: {{ $users->email }}</p>
                    </div>
                </div>
                <div class="editForum">
                    <a href="/editProfile">
                        <button class="reqBtn button is-rounded is-small" type="submit">Edit Profile</button>
                    </a>
                </div>
            </div>
        </div>

        @auth('student')
            <div class="recStatusCard card mt-5">
                <div class="card-body">
                    <h3 class="text-center mb-4">Recruitment Status</h3>
                    <table class="table is-bordered is-stripped is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Lecturer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $key => $c)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $c->post->title }}</td>
                                    <td>{{ $c->post->lecturer->name }}</td>
                                    <td>{{ $c->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        {{ $comments->onEachSide(1)->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
