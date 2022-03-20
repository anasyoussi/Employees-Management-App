@extends('Employees.layout') 
@section('content')  
<div class="mt-40 flex">
    <div>
        <p class="text-2xl dark:text-white font-semibold">Employees</p> 
        <p class="text-sm text-gray-500">A list of all the users in your account including their name, title, email and role</p>
    </div>
    <div class="grow"></div>
    <div class="space-x-2">
         <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
            <a href="{{ route('employees.create') }}">Add Employee</a>
        </button>
    </div>
</div>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Full Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Email
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Phone
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Birth Day
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Role
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Assignment Date
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                State
                            </th> 
                            <th scope="col" class="relative py-3 px-6">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Product 1 -->
                        @foreach ($employees as $item) 
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->fullname }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $item->email }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $item->phone }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $item->birthday }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $item->role }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $item->assignment_date }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                @if($item->state == 1)
                                    Active
                                @else   
                                    Terminated
                                @endif
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <div class="flex">
                                    
                                    <form action="{{ route('employees.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- href="{{ route('employees.destroy', $item->id) }}" -->
                                        <button  class="text-red-600 dark:text-red-500 hover:underline"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path class="w-1" stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button> 
                                    </form>

                                    <div class="w-2"></div>
                                    <a href="{{ route('employees.edit', $item->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a> 
                                </div>                                
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
                {{ $employees->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div> 
@endsection