@extends('layout')

@section('title')
    Send item
@endsection

@section('content')
    <form action="{{ route('item.send') }}" method="POST">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Give item</h1>
        @csrf
        <label for="website-admin"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <div class="flex mb-2">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                           xmlns="http://www.w3.org/2000/svg"
                           fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                      </svg>
                    </span>
            <input type="text" id="website-admin" name="username" value="{{ $username }}"
                   class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Steve" required>
        </div>
        <label for="item" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
            item</label>
        <select id="item" name="item"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
            <option value="minecraft:diamond">Diamond</option>
            <option value="minecraft:gold_ingot">Gold</option>
            <option value="minecraft:poppy">Poppy</option>
            <option value="minecraft:apple">Apple</option>
        </select>
        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
            quantity:</label>
        <input type="number" id="amount" name="amount" aria-describedby="helper-text-explanation"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4"
               placeholder="1" value="1" required/>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Send
        </button>
    </form>
@endsection
