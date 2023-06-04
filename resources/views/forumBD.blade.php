@extends('layouts.main')

@section('container')
    <div class="forumContent">
        <div class="card bigC">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                    <figure class="image is-96x96">
                        @if ($posts->lecturer->pic)
                            <img src="{{ asset('storage/' . $posts->lecturer->pic) }}" alt="Placeholder image">
                        @else
                            <img src="/images/user.jpg" alt="Placeholder image">
                        @endif
                    </figure>
                    </div>
                    <div class="media-content">
                    <p class="title is-4 lecturerName">{{ $posts->lecturer->name }}</p>
                    <p class="subtitle is-6">{{ $posts->required_student }} People Required</p>
                    <p class="subtitle is-6">By {{ date('l, j F Y', strtotime($posts->due_date)) }}</p>
                    </div>
                </div>

                <div class="content">
                    <hr>
                    <p class="judul">{{ $posts->title }}</p>
                    <p>Topik : {{ $posts->topic }}</p>
                    <p>{{ $posts->description }}</p>

                    <div class="applied">
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($posts->comment as $com)
                            @if ($counter < 3)
                                @if ($com->student->pic)
                                    <figure class="image is-32x32 mhsPictContain">
                                        <img class="is-rounded mhsPict" src="{{ asset('storage/' . $com->student->pic) }}">
                                    </figure>
                                @else
                                    <figure class="image is-32x32 mhsPictContain">
                                        <img class="is-rounded mhsPict" src="/images/user.jpg">
                                    </figure>
                                @endif

                                @php
                                    $counter++;
                                @endphp
                            @else
                                @break
                            @endif
                        @endforeach
                        <p> ... {{ count($posts->comment) }} people applied</p>
                    </div>

                    <div class="buttons mt-4 mb-2">
                        <button class="button is-rounded is-small categoryBtn">{{ $posts->department->department_name }}</button>
                        <button class="button is-rounded is-small categoryBtn">{{ $posts->type->type_name }}</button>
                    </div>
                    <p>{{ date('h:i A - j F Y', strtotime($posts->post_date)) }}</p>
                </div>

                @auth('lecturer')
                    @if ($users->id === $posts->lecturer_id)
                        @if ($posts->status === 'Ongoing')
                            <div class="editForum">
                                <a href="/forum/{{ $posts->id }}/edit">
                                    <button class="reqBtn button is-rounded is-small" type="submit">Edit</button>
                                </a>
                            </div>
                        @endif
                    @endif
                @endauth
            </div>
        </div>

        @if($posts->status === 'Past')
            <div class="alert alert-danger alert-dismissible fade show closedForumAlert" role="alert">
                The Forum Has Been Closed
            </div>
        @endif

        @auth('student')
            @if ($comments)
                @if ($posts->status === 'Ongoing')
                    <div class="card bigC">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                <figure class="image is-96x96">
                                    @if ($users->pic)
                                        <img src="{{ asset('storage/' . $users->pic) }}" alt="Placeholder image">
                                    @else
                                        <img src="/images/user.jpg" alt="Placeholder image">
                                    @endif
                                </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4 lecturerName">{{ $users->name }}</p>
                                    <p id="contentToBeEdit">{{ $comments->comment }}</p>
                                    <form action="/updateComment" method="post" class="reqForm">
                                        @method('put')
                                        @csrf
                                        <textarea type="text" id="editField" name="editField" value="" style="display:none;"></textarea>
                                        <input type="text" name="comment_id" value="{{ $comments->id }}" style="display: none;">
                                        <div class="editForum">
                                            <button class="reqBtn button is-rounded is-small" id="editButton" type="button" onclick="editContent()">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="content">
                                <p>{{ date('h:i A - j F Y', strtotime($comments->comment_date)) }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    @if ($comments->status === 'Accepted')
                        <div class="card bigC">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                    <figure class="image is-96x96">
                                        @if ($users->pic)
                                            <img src="{{ asset('storage/' . $users->pic) }}" alt="Placeholder image">
                                        @else
                                            <img src="/images/user.jpg" alt="Placeholder image">
                                        @endif
                                    </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4 lecturerName">{{ $users->name }}</p>
                                        <p id="contentToBeEdit">{{ $comments->comment }}</p>
                                        <div class="editForum">
                                            <button class="is-light button is-rounded is-small" type="button">Accepted</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="content">
                                    <p>{{ date('h:i A - j F Y', strtotime($comments->comment_date)) }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="card bigC">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                <figure class="image is-96x96">
                                    @if ($users->pic)
                                        <img src="{{ asset('storage/' . $users->pic) }}" alt="Placeholder image">
                                    @else
                                        <img src="/images/user.jpg" alt="Placeholder image">
                                    @endif
                                </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4 lecturerName">{{ $users->name }}</p>
                                    <p id="contentToBeEdit">{{ $comments->comment }}</p>
                                    <div class="editForum">
                                        <button class="is-light button is-rounded is-small" type="button">Full Slot</button>
                                    </div>
                                </div>
                            </div>

                            <div class="content">
                                <p>{{ date('h:i A - j F Y', strtotime($comments->comment_date)) }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endif
            @else
                @if ($posts->status === 'Ongoing')
                    <div class="card bigC">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                <figure class="image is-96x96">
                                    @if ($users->pic)
                                        <img src="{{ asset('storage/' . $users->pic) }}" alt="Placeholder image">
                                    @else
                                        <img src="/images/user.jpg" alt="Placeholder image">
                                    @endif
                                </figure>
                                </div>
                                <div class="media-content">
                                    <form action="/comment" method="post" class="reqForm">
                                        @csrf
                                        <textarea name="reason" id="reason" placeholder="Express your interest" required></textarea>
                                        <input type="text" name="post_id" value="{{ $posts->id }}" style="display: none;">
                                        <div class="ket">
                                            <p class="ketVisible">Your post will only be visible to you and the lecturer</p>
                                            <button class="reqBtn button is-rounded is-small" type="submit">Request to Join</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @elseauth('lecturer')
            @if ($allcomments->isEmpty() && $posts->status === 'Ongoing')
                <div class="alert alert-danger alert-dismissible fade show closedForumAlert" role="alert">
                    No student has registered yet!
                </div>
            @else
                @if ($users->id === $posts->lecturer_id)
                    @foreach($allcomments as $ac)
                        @if ($ac->status != 'Accepted')
                            @if ($posts->status === 'Ongoing')
                                <div class="card bigC">
                                    <div class="card-content">
                                        <div class="media">
                                            <div class="media-left">
                                            <figure class="image is-96x96">
                                                @if ($ac->student->pic)
                                                    <img src="{{ asset('storage/' . $ac->student->pic) }}" alt="Placeholder image">
                                                @else
                                                    <img src="/images/user.jpg" alt="Placeholder image">
                                                @endif
                                            </figure>
                                            </div>
                                            <div class="media-content">
                                                <p class="title is-4 lecturerName">{{ $ac->student->name }}</p>
                                                <p>{{ $ac->comment }}</p>
                                                <form action="/accepted" method="post" class="reqForm">
                                                    @method('put')
                                                    @csrf
                                                    <input type="text" name="comment_id" value="{{ $ac->id }}" style="display: none;">
                                                    <input type="text" name="post_id" value="{{ $ac->post->id }}" style="display: none;">
                                                    <div class="editForum">
                                                        <button class="reqBtn button is-rounded is-small" type="submit">Accept</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="content">
                                            <p>{{ date('h:i A - j F Y', strtotime($ac->comment_date)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card bigC">
                                    <div class="card-content">
                                        <div class="media">
                                            <div class="media-left">
                                            <figure class="image is-96x96">
                                                @if ($ac->student->pic)
                                                    <img src="{{ asset('storage/' . $ac->student->pic) }}" alt="Placeholder image">
                                                @else
                                                    <img src="/images/user.jpg" alt="Placeholder image">
                                                @endif
                                            </figure>
                                            </div>
                                            <div class="media-content">
                                                <p class="title is-4 lecturerName">{{ $ac->student->name }}</p>
                                                <p>{{ $ac->comment }}</p>
                                            </div>
                                        </div>

                                        <div class="content">
                                            <p>{{ date('h:i A - j F Y', strtotime($ac->comment_date)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @elseif ($ac->status === 'Accepted')
                            <div class="card bigC">
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-left">
                                        <figure class="image is-96x96">
                                            @if ($ac->student->pic)
                                                <img src="{{ asset('storage/' . $ac->student->pic) }}" alt="Placeholder image">
                                            @else
                                                <img src="/images/user.jpg" alt="Placeholder image">
                                            @endif
                                        </figure>
                                        </div>
                                        <div class="media-content">
                                            <p class="title is-4 lecturerName">{{ $ac->student->name }}</p>
                                            <p>{{ $ac->comment }}</p>
                                            <div class="editForum">
                                                <button class="is-light button is-rounded is-small" type="button">Student Accepted</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <p>{{ date('h:i A - j F Y', strtotime($ac->comment_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach($allcomments as $ac)
                        @if ($ac->status != 'Accepted')
                            <div class="card bigC">
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-left">
                                        <figure class="image is-96x96">
                                            @if ($ac->student->pic)
                                                <img src="{{ asset('storage/' . $ac->student->pic) }}" alt="Placeholder image">
                                            @else
                                                <img src="/images/user.jpg" alt="Placeholder image">
                                            @endif
                                        </figure>
                                        </div>
                                        <div class="media-content">
                                            <p class="title is-4 lecturerName">{{ $ac->student->name }}</p>
                                            <p>{{ $ac->comment }}</p>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <p>{{ date('h:i A - j F Y', strtotime($ac->comment_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                        @elseif ($ac->status === 'Accepted')
                            <div class="card bigC">
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-left">
                                        <figure class="image is-96x96">
                                            @if ($ac->student->pic)
                                                <img src="{{ asset('storage/' . $ac->student->pic) }}" alt="Placeholder image">
                                            @else
                                                <img src="/images/user.jpg" alt="Placeholder image">
                                            @endif
                                        </figure>
                                        </div>
                                        <div class="media-content">
                                            <p class="title is-4 lecturerName">{{ $ac->student->name }}</p>
                                            <p>{{ $ac->comment }}</p>
                                            <div class="editForum">
                                                <button class="is-light button is-rounded is-small" type="button">Student Accepted</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <p>{{ date('h:i A - j F Y', strtotime($ac->comment_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endif
        @endauth
    </div>

@endsection
