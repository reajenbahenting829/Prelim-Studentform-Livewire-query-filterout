<div>
    <div class="card mt-5 shadow bg-transparent">
        <div class="card-header">
            <h1 class="text-center bg-dark text-warning">Student Edit</h1>
        </div>
        {{-- update modal --}}
<div wire:ignore.self class="modal fade" id="update-modal-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
        <div class="modal-header bg-dark text-warning">
            <h5 class="modal-title" id="exampleModalLabel">Do you want to update this student information?</h5>
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body bg-warning">
            <p class="text-center text-black ">To proceed please click the update student button to save this work!</p>
        </div>
        <div class="modal-footer bg-dark text-warning">
            <button type="submit" class="btn btn- bg-success form-control" wire:click="updateStudent()">Update Student</button>
            <button type="button" class="btn btn-outline-info form-control" id="closee" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
{{-- end update modal --}}
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
                    <option hidden>Course</option>
                    <option disabled>Course</option>
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                    <option value="Bachelor of Science in Information Technology ">Bachelor of Science in Information Technology</option>
                    <option value="Bachelor of Science Accountancy">Bachelor of Science Accountancy</option>
                    <option value="Bachelor of Science Criminolgy">Bachelor of Science Criminolgy</option>
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
        <div class="card-footer">
            <div class="d-flex justify-content-end float-end">
                <button class="btn btn-success" data-toggle="modal" data-target="#update-modal-student"></i>Update Student</button>
            </div>
        </div>
    </div>
</div>
<style>

    body{
        background-image:url('https://i.ytimg.com/vi/3uAr3SoEQBE/maxresdefault.jpg') ;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        font-family: 'Nunito', sans-serif;
        margin:0; padding:0;
        box-sizing: border-box;
        outline: none; border:none;
        text-decoration: none;
        text-transform: capitalize;
   }


</style>
