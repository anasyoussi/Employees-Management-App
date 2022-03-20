@extends('Employees.layout') 
@section('content')  
<div class="flex items-center justify-center min-h-screen">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <h3 class="text-2xl font-bold text-center">Add New Employee</h3>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf 
            <div class="mt-4">
                <div>
                    <label class="block" for="Name">Fullname<label>
                    <input type="text" name="fullname" placeholder="Name"  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email<label>
                    <input type="text" name="email" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block">Phone<label>
                    <input type="phone" name="phone" placeholder="Phone"  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block">Birthday<label>
                    <input type="date" name="birthday" placeholder="Birthday" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div> 
                <div class="mt-4">
                    <label class="block">Role<label>
                    <input type="text" name="role" placeholder="Role" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div> 
                <div class="mt-4">
                    <label class="block">Assignment date<label>
                    <input type="date" name="assignment_date" placeholder="Assignment date" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div> 
                <div class="mt-4">
                    <label class="block">State<label>
                     <select id="state" name="state" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1">Active</option>
                        <option value="0">Terminate</option> 
                    </select>
                </div> 
                <div class="flex">
                    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Create Employee</button>
                </div> 
            </div>
        </form>
    </div>
</div>

@endsection