<div class="container mt-3">
    <div class="row">
        <div class="col-sm-3">
            <div class="card mt-8 shadow form-group mb-3">
                <div class="card-header bg-dark text-warning ">
                    <h1 class="text-center mt-2">University Of Bohol</h1>
                </div>
            </div>
            <div class="card-body shadow">
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" wire:model="lname" required>
                    <label for="lname">Last Name</label>
                </div>
                @error('lname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" wire:model="fname" required>
                    <label for="fname">First Name</label>
                </div>
                @error('fname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" wire:model="email" required>
                    <label for="email">Email</label>
                </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" wire:model="address" required>
                    <label for="address">Address</label>
                </div>
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <select name="course" id="" class="form-control" wire:model="course" required>
                        <option hidden>Year Level</option>
                        <option disabled>Year Level</option>
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information
                            Technology</option>
                        <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                        <option value="Bachelor of Science Accountancy">Bachelor of Accountancy</option>
                        <option value="Bachelor of Secondary Education (BSEd)">Bachelor of Secondary Education (BSEd)
                        </option>
                        <option value="Bachelor of Science In Criminolgy">Bachelor of Science In Criminolgy</option>
                    </select>
                    <label for="course">Course</label>
                </div>
                @error('course')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <select name="year" id="" class="form-control" wire:model="year" required>
                        <option hidden>Year Level</option>
                        <option disabled>Year Level</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                    <label for="year">Year</label>
                </div>
                @error('year')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end float-end">
                    <button class="btn btn-success text-warning mt-3" wire:click="addStudent()">Add Student</button>
                </div>
            </div>
        </div>

        {{-- <hr class="mt-5"> --}}
        <div class="col-sm-9">
            @if (session('message'))
                <div class="alert alert-success text-center mt-5">{{ session('message') }}</div>
            @endif
            @if (session('deleted'))
                <div class="alert bg-danger text-white text-center mt-5">{{ session('deleted') }}</div>
            @endif
            <div class="filter">
            <div class="row">
                <div class="col">
                    <select name="course" id="" class="form-select" wire:model.lazy="course">
                        <option value="All">Course</option>
                        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information
                            Technology</option>
                        <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                        <option value="Bachelor of Science Accountancy">Bachelor of Accountancy</option>
                        <option value="Bachelor of Secondary Education (BSEd)">Bachelor of Secondary Education (BSEd)
                        </option>
                        <option value="Bachelor of Science In Criminolgy">Bachelor of Science In Criminolgy</option>
                    </select>
                </div>
                <div class="col">
                    <select name="year" id="" class="form-select" wire:model.lazy="year">
                        <option value="All">Year</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" id="" class="form-control" wire:model="search" placeholder="Search">
                </div>
            </div>
            </div>
            <div class="card mt-8 shadow form-group mb-3">
                <div class="card-header bg-dark text-warning text-center ">
                    <h1 class="mb-2">Student Lists</h1>
                    {{-- delete modal --}}
                    <div wire:ignore.self class="modal fade" id="delete-modal-student" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content bg-dark text-warning">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this
                                        student?</h5>
                                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-warning">
                                    <p class="text-center text-black ">This deletion cannot be undone</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger form-control"
                                        wire:click="deleteStudent()"><i class="fa fa-trash"></i></button>
                                    <button type="button" class="btn btn-outline-secondary text-warning form-control"
                                        id="closee" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- end delete modal --}}

            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered table table-striped table-striped bg-transparent text-warning ">
                        <thead>
                            <tr class="bg-black text-info">
                                <th>ID.</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Course</th>
                                <th class="text-end">Year</th>
                                <th class="text-center">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->course }}</td>
                                    <td>{{ $user->year }}</td>
                                    <td>
                                        <a href="{{ url('edit', ['user' => $user->id]) }}"
                                            class="btn btn-primary">&#128194</a>
                                        <a href="" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete-modal-student"
                                            wire:click="todelete({{ $user->id }})"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($users->count() == 0)
                                <td colspan="7" class="text-center text-dark">No user data found in this table.
                                </td>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@if (count($users))
{{$users->links('livewire-pagination-links')}}
@endif
</div>

<style>
    body {
        background-color: rgb(39, 140, 212);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        font-family: 'Nunito', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform: capitalize;
    }
</style>
